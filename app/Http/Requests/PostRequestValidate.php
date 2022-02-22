<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class PostRequestValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!empty($this->route('post'))) {
            $post = Post::where('slug', $this->route('post')->slug)->first();
            return (!empty(Auth::user()) || $post->show_publicly == 1);
        }
        return true;
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (!empty($this->route('post'))) {
            return [];
        }
        return [
            'title' => ['required', 'unique:posts'],
            'content' => 'required',
            'image' => ['mimes:jpg,jpeg,png,bmp', 'max:4096'],
        ];
    }
}
