<?php

namespace App\Http\Controllers\Guest;

use Exception;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Http\Requests\PostRequestValidate;

class GuestController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
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
            $posts = $this->postRepository->getPublicPosts();
            return view('welcome', compact('posts'));
        } catch (Exception $e) {
            return back()->withError('Something went wrong please try after sometime!');
        }
    }

    public function show(PostRequestValidate $request, Post $post)
    {
        try {
            return view('guest.post-view', compact('post'));
        } catch (Exception $e) {
            return back()->withError('Something went wrong please try after sometime!');
        }
    }
}
