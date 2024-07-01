<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(){
        if(!empty(Auth::check())){
            return redirect('admin/dashboard');
        }
        return view('auth.login');
    }


    public function Authlogin(Request $request){
        if(!empty(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))){
           if(Auth::user()->user_type == 1){
            return redirect('admin/dashboard');
            // dd($request->all());
           }
           else if(Auth::user()->user_type == 2){
            return redirect('medic/dashboard');
           }
           else if(Auth::user()->user_type == 3){
            return redirect('/');
           }
        }
        else{
            return redirect()->back()->with('error','Incorrect Credentials');
        }
    }

    

    public function forgotpassword(){
        return view('auth.forgot');
    }

    public function PostForgotPassword(Request $request){
        // dd($request->all());
        
        $user = User::getEmailSingle($request->email);
        // dd($getEmailSingle);
        if(!empty($user)){
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success','Please check you email and reset your password');
        }else{
            return redirect()->back()->with('error',"Email not found");
        }

    }


    public function reset($remember_token){
        $user = User::getTokenSingle($remember_token);
        // dd($remember_token);

        if(!empty($user)){
            $data['user'] = $user;
            return view('auth.reset',$data);

        }else{
            abort(404);
        }
    }


    public function PostReset($remember_token, Request $request){
        if($request->password == $request->cpassword){
            $user = User::getTokenSingle($remember_token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect('')->with('success','passwordreset successfully');


        }else{
            return redirect()->back()->with('error','Password not match');
        }

    }

    public function register(){
        return view('auth.register');
    }


    //handle Logout
    public function logout(){
        Auth::logout();
        return redirect(url('/'));  //Redirect to login page with success message
    }
}
