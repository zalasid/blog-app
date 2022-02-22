<?php

namespace App\Http\Controllers\Admin;

use App\Facades\ImageService;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
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
            $users = $this->userRepository->getUsers();
            return view('admin.user.index', compact('users'));
        } catch (Exception $e) {
            return back()->withError('Something went wrong please try after sometime!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        try {
            return view('admin.user.view', compact('user'));
        } catch (Exception $e) {
            return back()->withError('Something went wrong please try after sometime!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        try {
            return view('admin.user.edit', compact('user'));
        } catch (Exception $e) {
            return back()->withError('Something went wrong please try after sometime!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required'],
                'email' => ['required_without:phone_number', 'nullable', 'unique:users,email,' . $user->id],
                'phone_number' => ['required_without:email', 'nullable', 'unique:users,phone_number,' . $user->id],
                'image' => ['mimes:jpg,jpeg,png,bmp', 'max:4096'],
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $request->request->add(['activated'=> $request->has('activated')]);
            $this->userRepository->updateUser($user->id, $request->except(['_token', '_method']));
            if ($request->hasFile('image')) {
                ImageService::uploadImage($user, $request->file('image'), 'avatars');
            }
            return redirect()->route('admin.users')->with('message', 'User updated successfully');
        } catch (Exception $e) {
            echo '<pre>'; print_r($e->getMessage()); exit;
            return back()->withError('Something went wrong please try after sometime!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $this->userRepository->deleteUser($user->id);
            return redirect()->route('admin.users')->with('message', 'User deleted successfully');
        } catch (Exception $e){
            return back()->withError('Something went wrong please try after sometime!');
        }
    }
}
