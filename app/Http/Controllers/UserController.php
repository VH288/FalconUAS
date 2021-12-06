<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use App\Mail\VerifyMail;


class UserController extends Controller
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
        return view('register');
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
        $request->validate([
            'first_name' => 'required|alpha|min:2',
            'last_name' => 'required|alpha|min:2',
            'username' => 'required|unique:users,username|alpha_num|min:6',
            'password' => 'required|alpha_num|min:6',
            'email' => 'required|unique:users,email|email:rfc,dns',
            'phone' => 'required|numeric|min:10',
        ]);
        do {
            $verif_code = Str::random(32);;
        } while (User::where("verif_code", "=", $verif_code)->first() instanceof User);
        $request['verif_code'] = $verif_code;
        $request['is_verified'] = false;
        $user = User::create($request->all());
        try{
            $detail = [
                'body' => $user->verif_code,
            ];
            Mail::to($user->email)->send(new VerifyMail($detail));
            return view('login')->with('errorarray',null);
        }catch(Exception $e){
            return view('login')->with('errorarray',null);
        }
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
        $user = User::find($id);
        return view('profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('editProfile',compact('user'));
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
        $request->validate([
            'first_name' => 'required|alpha|min:2',
            'last_name' => 'required|alpha|min:2',
            'password' => 'required|alpha_num|min:6',
            'phone' => 'required|numeric|min:10',
        ]);
        
        User::find($id)->update($request->all());
        return redirect()->route('users.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        User::find($id)->delete();
        $request->session()->put('user_id',null);
        return view('login')->with('errorarray',null);
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('username',$request['username'])->first();
        $errorarray = array();
        if($user == null){
            array_push($errorarray,'User not found');
            return view('login')->with('errorarray',$errorarray);
        }
        else if($request['password'] != $user['password']){
            array_push($errorarray,'Wrong password');
            return view('login')->with('errorarray',$errorarray);
        }
        else if($user['is_verified'] == false){
            array_push($errorarray,'Account have not verified yet');
            return view('login')->with('errorarray',$errorarray);
        }
        else{
            $request->session()->put('user_id',$user->id);
            return redirect()->route('posts.index');
        }
    }
    public function logout(Request $request){
        $request->session()->put('user_id',null);
        return view('login')->with('errorarray',null);
    }
    public function verify($code){
        $user = User::where('verif_code',$code)->first();
        if($user != null){
            if($user['is_verified'] == 0){
                User::where('id',$user['id'])->update(['is_verified' => true]);
                return view('login')->with('errorarray',null);
            }
        }
    }
    public function register(){
        return view('register');
    }
    public function tologin(){
        return view('login')->with('errorarray',null);
    }
}
