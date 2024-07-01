<?php

namespace App\Http\Controllers;

use App\Models\EmergencyMedicModel;
use App\Models\ResponseModel;
use App\Models\User;
use Illuminate\Http\Request;

class EmergencyMedicController extends Controller
{
    //
    public function emergencylist(){
        $data['getRecord'] = EmergencyMedicModel::getRecord();
        return view('admin.assignemergencies.list',$data);
    }

    public function assignmedic($id){
        $data['getRecord'] = ResponseModel::getSingle($id);
        $data['getMedics'] = User::getMedic();
        // $data['getEmergencyData'] = ResponseModel::getEmergencies();

        return view('admin.emergencies.assignmedic',$data);
    }

    public function add(Request $request){
        return view('admin.assignemergencies.add');
    }

    public function setassigned($id, Request $request){
        
        // dd($request->all());
        $emergency = ResponseModel::getSingle($id);
        $emergency->medic = trim($request->medic);
        $emergency->status = 0;
        $emergency->save();

        return redirect('admin/emergencies/assignedlist')->with('success','medic assigned successfully');
    }
}
