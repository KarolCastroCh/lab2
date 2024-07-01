<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $posts =  Post::all(); // get all Post
        return view('post.index', compact('posts')); 

     /*   $posts = Post::all(); // get all Post
        return $posts;

        $posts = Post::select(
            'posts.id', 
            'posts.title', 
            'posts.content'
            )->get();

        return $posts; */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //        
        return view('post.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $title=$request->input('title');
        $content=$request->input('content');

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $title,
            'content'=> $content
        ]);

        return redirect()->route('post.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //       

        $post = Post::select(
            'posts.id',
            'posts.title',
            'posts.content')
            ->where('posts.id', $id)
        ->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, $content)
    {
        //
        $query = Post::find($id);
        if($query) {
            $query = $query->update([
                'content' => $content
            ]);
            return "Post updated!";
        }else {
            return "Post not found!";
        }
        
        $query->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $query = Post::find($id);
        if($query) {
            $query->delete();
             return "Post deleted!";
    }else{
        return "Post not found!";
    }
}

}
