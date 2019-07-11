<?php

namespace App\Http\Controllers\Api\v1;

use App\Post;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $posts = Post::all();
        return $this->showAll($posts);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return $this->showOne($post);
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2|max:191|unique:posts,title',
            'body' => 'required|min:10'
        ]);

        $data = $request->all();
        $post = Post::create($data);

        return $this->showOne($post);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => "required|min:2|max:191|unique:posts,title,$id", // Double Quotation sign for ignoring this unique id
            'body' => 'required|min:10'
        ]);

        $data = $request->all();
        $post = Post::findOrFail($id);
        $post->update($data);

        return $this->showMessage('Update successfully');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return $this->showMessage('Delete successfully');
    }
}
