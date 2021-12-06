<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        if($user_id==null){
            return view('login')->with('errorarray',null);
        }
        $posts = Post::orderBy('posts.id','DESC')->where('user_id','<>',$user_id)->join('users','users.id','posts.user_id')->get('posts.*');
        $userposts = Post::orderBy('posts.id','DESC')->where('user_id',$user_id)->join('users','users.id','posts.user_id')->get('posts.*');
        return view('home')->with('posts',$posts)->with('userposts',$userposts);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user_id = $request->session()->get('user_id');
        if($user_id==null){
            return view('login')->with('errorarray',null);
        }
        $request->validate([
            'content' => 'required'
        ]);
        $date = Carbon::now()->format('Y-m-d H:i:s');
        Post::insert([
            'content' => $request->content,
            'user_id' => $user_id,
            'likes' => 0,
            'post_time' => $date,
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        return view('editPost')->with('post',$post);
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
        //
        $request->validate([
            'content' => 'required'
        ]);
        Post::find($id)->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::find($id)->delete();
        return redirect()->route('posts.index');
    }
}
