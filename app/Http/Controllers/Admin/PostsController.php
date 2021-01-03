<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostsController extends Controller
{
    public function getAllPosts(Post $post) {
        return view('admin.pages.Blog.list', ['posts' => $post->latest()->get()]);
    }

    public function getSinglePost(Post $post)
    {
        return view('admin.pages.Blog.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $post->update($this->validateData());

        return redirect('/admin/posts-list');
    }

    public function create()
    {
        return view('admin.pages.Blog.create');
    }

    public function store()
    {
        Post::create($this->validateData());

        return redirect('/admin/posts-list');
    }

    public function destroy(Post $post)
    {
        $deletedPost = Post::find($post->id);
        $deletedPost->delete();

        return redirect('/admin/posts-list');
    }

    protected function validateData()
    {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:30'],
            'description' => ['required', 'min:10'],
            'author' => ['required', 'min:3', 'max:30'],
        ]);
    }
}
