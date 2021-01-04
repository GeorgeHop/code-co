<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostsController extends Controller
{
    public function index() {
        return view('admin.pages.posts.list', ['posts' => Post::latest()->paginate()]);
    }

    public function create() {
        return view('admin.pages.posts.edit', ['post' => new Post(), 'edit' => false]);
    }

    public function store() {
        Post::create($this->validateData());
        return redirect(route('admin.posts.index'));
    }

    public function edit(Post $post) {
        return view('admin.pages.posts.edit', ['post' => $post, 'edit' => true]);
    }

    public function update(Post $post) {
        $post->update($this->validateData());
        return redirect(route('admin.posts.index'));
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect(route('admin.posts.index'));
    }

    protected function validateData() {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:30'],
            'description' => ['required', 'min:10'],
            'author' => ['required', 'min:3', 'max:30'],
        ]);
    }
}
