<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    //
    public function home(){
        $ip = '8.8.8.8';
        $data = Location::get($ip);
        // dd($data);
        return view('welcome',compact('data'));
        
    }

    public function requestemergency(){
        
        // dd($data);
        if(!empty(Auth::check())){
            $ip = '8.8.8.8';
            $data = Location::get($ip);
            return view('requestemergency',compact('data'));
        }
        return view('auth.login');
        
        
    }


}
