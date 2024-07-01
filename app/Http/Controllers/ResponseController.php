<?php

namespace App\Http\Controllers;

use App\Mail\NewEmergency;
use App\Mail\NewUserNotification;
use App\Models\ResponseModel;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ResponseController extends Controller
{
    //visit the emergencies page
    public function emergenciesroute(){
        $data['getRecord'] = ResponseModel::getUnassignedEmergencies();
        return view('admin.emergencies.list',$data);
    }
    public function assignedemergenciesroute(){
        $data['getRecord'] = ResponseModel::getAssignedEmergencies();
        return view('admin.emergencies.assignedlist',$data);
    }

    public function emergenciesList(){
        $data['getRecord'] = ResponseModel::getEmergencies();
        return view('admin.emergencies.list',$data);
    }
    public function sendEmergency(Request $request){
        // dd($request->all());
        $emergency = new ResponseModel();
        $emergency->userid = Auth::user()->id;
        $emergency->country = request('country');
        $emergency->longitude = request('longitude');
        $emergency->latitude = request('latitude');
        // $emergency->message = request('message');
        $emergency->type = request('type');
        $emergency->save();
        // event(new Registered($emergency));

        // Send email to admin
        Mail::to('admin@nexus.com')->send(new NewEmergency($emergency));

        return redirect('/requestemergency')->with('success','Response sent');
        
    }

    public function deleteemergency($id){
        $emergency = ResponseModel::getSingle($id);
        $emergency->is_delete = 0;
        $emergency->save();

        return redirect('admin/emergencies/list')->with('success','emergency Deleted successfully');

    }
}
