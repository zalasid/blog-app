<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Facades\ImageService;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $user = $this->userRepository->getUserProfile(Auth::user()->id);
            return view('user.profile', compact('user'));
        } catch (Exception $e) {
            return back()->withError('Something went wrong please try after sometime!');
        }
    }

    public function update(Request $request)
    {
        try {
            $userId = Auth::user()->id;
            $validator = Validator::make($request->all(), [
                'name' => ['required'],
                'email' => ['required_without:phone_number', 'nullable', 'unique:users,email,' . $userId],
                'phone_number' => ['required_without:email', 'nullable', 'unique:users,phone_number,' . $userId],
                'image' => ['mimes:jpg,jpeg,png,bmp', 'max:4096'],
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $this->userRepository->updateUser($userId, $request->except(['_token', '_method']));
            if ($request->hasFile('image')) {
                ImageService::uploadImage(Auth::user(), $request->file('image'), 'blog_images');
            }
            return redirect()->route('posts')->with('message', 'Profile updated successfully');
        } catch (Exception $e){
            return back()->withError('Something went wrong please try after sometime!')->withInput();
        }
    }
}
