<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function registration(){
        return view("auth.registration");
    }
    public function registerUser(Request $request){
        //$data = $request->input();
       $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique: user',
        'password'=>'required|min:4|max:8'
       ]);
       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $res=$user->save();
       if($res){
        return back()->with('success','You Have Registered Successfully');
        // $request->session()->put('LoggedUser',$user->id);
        // return redirect('login');
       }else{
        return back()->with('failed','Something Wrong');
       }
    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:4|max:8'
        ]);
        $user = User::where('email','=',$request->email)->first();
        // if(!$user || !Hash::check($request->password,$user->password)){
        //     return back()->with('fail','Invalid Credentials');
        // }else{
        //     $request->session()->put('LoggedUser',$user->id);
        //     return redirect('index');
        if($user){
            if(hash::check($request->password,$user->password)){
                $request->session()->put('LoginId',$user->id);
                return redirect('dashboard');
                
        }
        else if(!Hash::check($request->password,$user->password)){
            return back()->with('fail','Password is incorrect');
        }
        else{
            return back()->with('fail','No account found for this email');
        }
    }

}
}