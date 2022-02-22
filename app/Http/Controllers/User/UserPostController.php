<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Facades\ImageService;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PostRequestValidate;

class UserPostController extends Controller
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
            $posts = $this->postRepository->getUserPosts();
            return view('user.post.index', compact('posts'));
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
        return view('user.post.createOrUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequestValidate $request)
    {
        try {
            $post = $this->postRepository->savePost($request->user(), $request->except(['_token']));
            if ($request->hasFile('image')) {
                ImageService::uploadImage($post, $request->file('image'), 'blog_images');
            }
            return redirect()->route('posts')->with('message', 'Post added successfully!');
        } catch (Exception $e) {
            echo '<pre>'; print_r($e->getMessage()); exit;
            return back()->withError('Something went wrong please try after sometime!')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        try {
            $this->authorize('view', $post);
            return view('user.post.view', compact('post'));
        } catch (Exception $e) {
            return back()->withError('Something went wrong please try after sometime!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        try {
            $this->authorize('update', $post);
            return view('user.post.createOrUpdate', compact('post'));
        } catch (Exception $e) {
            return back()->withError('Something went wrong please try after sometime!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post): \Illuminate\Http\RedirectResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => ['required', 'unique:posts,title,' . $post->id],
                'content' => 'required',
                'image' => ['mimes:jpg,jpeg,png,bmp', 'max:4096'],
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $this->authorize('update', $post);
            $request->request->add(['show_publicly'=> $request->has('show_publicly')]);
            $this->postRepository->updatePost($post->id, $request->except(['_token', '_method']));
            if ($request->hasFile('image')) {
                ImageService::uploadImage($post, $request->file('image'), 'blog_images');
            }
            return redirect()->route('posts')->with('message', 'Post updated successfully');
        } catch (Exception $e){
            return back()->withError('Something went wrong please try after sometime!')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post): \Illuminate\Http\RedirectResponse
    {
        try {
            $this->authorize('delete', $post);
            $this->postRepository->deletePost($post->id);
            return redirect()->route('posts')->with('message', 'Post updated successfully');
        } catch (Exception $e){
            return back()->withError('Something went wrong please try after sometime!');
        }
    }
}
