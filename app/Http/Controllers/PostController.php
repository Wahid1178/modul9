<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function index()
    {
        return post::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'article' => 'required',
        ]);

        return post::create($request->all());
    }
    public function show($id)
    {
        return post::find($id);
    }

    public function update(Request $request, $id)
    {
        $post = post::find($id);
        $request->validate([
            'title' => 'string|max:255',
            'author' => 'string|max:255',
            'article' => 'nullable',
        ]);
        $post->update($request->all());
        return $post;
    }
    public function destroy($id)
    {
        return post::destroy($id);
    }
}
