<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getAllPosts(Post $post) {
        return view('user.pages.Blog.blog_list', ['posts' => $post->latest()->get()]);
    }

    public function getSinglePost(Post $post)
    {
        return view('user.pages.Blog.blog_single', ['post' => $post]);
    }
}
