<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(4);
        return view("posts.index")->with("posts", $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $rules = [
            'title' => 'required|max:100',
            'content' => 'required',
            'url' => 'required|url'
        ];
        $this->validate($request, $rules);


        $post = new Post();
        $post->created_by = 1;
        $post->title = $request->input('title');
        $post->url = $request->url;
        $post->content = $request->content;
        $post->save();
        Log::info($request->all());
        $request->session()->flash('message', 'Your Post was Saved!');

        return redirect()->action("PostsController@create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if(!$post) {
            Log::info("Post with ID $id cannot be found");
            abort(404);
        }
        return view("posts.show")->with('post', $post);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(!$post) {
            Log::info("Post with ID $id cannot be found");
            abort(404);
        }
        return view("posts.edit")->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $post = Post::find($id);
        if(!$post) {
            Log::info("Post with ID $id cannot be found");
            abort(404);
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->url = $request->url;
        $post->save();
        $request->session()->flash('message', 'Your Post was updated!');
        return redirect()->action("PostsController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(!$post) {
            Log::info("Post with ID $id cannot be found");
            abort(404);
        }
        session()->flash('message', 'Your Post was deleted!');
        $post->delete();
        return redirect()->action("PostsController@index");
    }
}
