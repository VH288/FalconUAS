<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,$id)
    {
        //
        $user_id = $request->session()->get('user_id');
        Like::insert([
            'user_id' => $user_id,
            'post_id' => $id,
        ]);
        $likes = DB::table('posts')->where('id',$id)->first('posts.likes');
        $likes = $likes + 1;
        DB::table('posts')->where('id',$id)->update(['likes'=>$likes]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $user_id = $request->session()->get('user_id');
        Like::where('user_id',$user_id)->where('post_id',$id)->delete();
        $likes = DB::table('posts')->where('id',$id)->first('posts.likes');
        $likes = $likes - 1;
        DB::table('posts')->where('id',$id)->update(['likes'=>$likes]);
        return redirect()->route('posts.index');
    }

    public function like(Request $request, $id){
        $user_id = $request->session()->get('user_id');
        $like = Like::where('user_id',$user_id)->where('post_id',$id)->first();
        if($like == null){
            Like::insert([
                'user_id' => $user_id,
                'post_id' => $id,
            ]);
            DB::table('posts')->where('id',$id)->increment('likes');
            return redirect()->route('posts.index');
        }else{
            Like::where('user_id',$user_id)->where('post_id',$id)->delete();
            DB::table('posts')->where('id',$id)->decrement('likes');
            return redirect()->route('posts.index');
        }
    }
}
