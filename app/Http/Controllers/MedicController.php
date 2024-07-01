<?php

namespace App\Http\Controllers;

use App\Mail\NewUserNotification;
use App\Models\ResponseModel;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MedicController extends Controller
{
    //

    public function medicdashboard(){
        $data['getMyEmergencies'] = ResponseModel::getMyUnassignedEmergencies();
        return view('admin.dashboard',$data);
    }
    public function addmedicroute(){
        return view('admin.medic.add');
    }

    //get list of medics
    public function mediclist(){
        $data['getRecord'] = User::getMedic();
        return view('admin.medic.list',$data);
    }


    public function addmedic(Request $request){
        $user = new User();
        $user->name = trim($request->name);
        $user->contact = trim($request->contact);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->blood_type = trim($request->blood_type);
        $user->user_type = 2;
        $user->save();

        event(new Registered($user));

        // Send email to admin
        Mail::to('admin@nexus.com')->send(new NewUserNotification($user));


        return redirect('admin/medic/list')->with('success', 'new user added successfully');

    }
}
