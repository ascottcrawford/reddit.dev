<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        if (is_null($searchTerm)) {
            $posts = Post::orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $posts = Post::search($searchTerm)->orderBy('created_at', 'DESC')->paginate(10);
        }
        // with("title")->paginate(4);
        // $loggedInUser = Auth::user();
        // Post::("table")->orderBy('created_at')->get();
        // DB::table('posts')->orderBy('created_at')->get();
        return view("posts.index")->with("posts", $posts);
        // select * from posts WHERE id > 3 ORDER BY name 
        // $builder = App\User::where('id', '>', 3)->orderBy('name');
        // $builder = App\User::where('name', '=', 'luis')->orderBy('name');
        // $builder->first();
        // select * from useres wehre id between 3 and 20
        // $builder = APP\User::whereBetween('id', 3, 20)->get();
        // whereIn or whereNotIn 
        // DB::table('posts')->orderBy('created_at')->take(5)->skip(5)->get();
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
        $this->validate($request, Post::$rules);
        $post = new Post();
        $post->created_by = Auth::user()->id;
        // $post->title = $request->input('title');
        // $post->url = $request->url;
        // $post->content = $request->content;
        // $post->save();
        // $request->session()->flash('message', 'Your Post was Saved!');
        // return redirect()->action("PostsController@index");
        Log::info($request->all());
        return $this->validateAndSave($post, $request);
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
        $post = Post::findorFail($id);
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
        $post = Post::findorFail($id);
        if(!$post) {
            Log::info("Post with ID $id cannot be found");
            abort(404);
        }
        return $this->validateAndSave($post, $request);

        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->url = $request->url;
        // $post->save();
        // $request->session()->flash('message', 'Your Post was updated!');
        // return redirect()->action("PostsController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorFail($id);
        if(!$post) {
            Log::info("Post with ID $id cannot be found");
            abort(404);
        }
        session()->flash('message', 'Your Post was deleted!');
        $post->delete();
        return redirect()->action("PostsController@index");
    }

    private function validateAndSave(Post $post, Request $request){
        $request->session()->flash('ERROR_MESSAGE', 'Post was not saved successfully');
        $this->validate($request, Post::$rules);
        $request->session()->forget('ERROR_MESSAGE');
        // $post = new Post();
        // $post->created_by = 1;
        $post->title = $request->input('title');
        $post->url = $request->url;
        $post->content = $request->content;
        $post->save();
        Log::info($request->all());
        $request->session()->flash('message', 'Your Post was Saved!');

        return redirect()->action("PostsController@index");
    }


}
