<?php

namespace App\Http\Controllers;

use App\Models\ResponseModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function dashboard(){
        $data['getUsers'] = User::getUsers();
        $data['getMedics'] = User::getMedic();
        $data['getEmergencies'] = ResponseModel::getUnassignedEmergencies();
        return view('admin.dashboard',$data);
    }
    public function adminadd(){
        return view('admin.admin.add');
    }

    ///view all admins
    public function adminlist(){
        $data['getRecord'] = User::getAdmin();
        return view('admin.admin.list',$data);
    }

    //admin edit route visit
    public function adminedit($id){
        $data['getRecord'] = User::getSingle($id);
        return view('admin.admin.edit',$data);
    }

    public function addadmin(Request $request){
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);
        // dd($request->all());
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();


        return redirect('admin/admin/list')->with('success','admin added successfully');


    }
}
