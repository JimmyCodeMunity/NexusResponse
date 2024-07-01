<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ResponseModel extends Model
{
    use HasFactory;
    protected $table = 'emergencies';


    //get emergencies of one person
    public static function getMyUnassignedEmergencies(){
    $userid = Auth::user()->id;
    $return = ResponseModel::select('emergencies.*','users.name as created_by_name','users.contact as contact')
    ->join('users','users.id','emergencies.userid');
    $return = $return
    ->where('emergencies.status','=',0)
    ->where('emergencies.is_delete','=',1)
    ->where('emergencies.medic','=',$userid)
    // ->where('emergencies.served','=',0)
        ->orderBy('emergencies.id', 'desc')
        ->paginate(5);

        return $return;
    }


    //get my completed ASSIGNMENTS
    public static function getMyAssignedEmergencies(){
        $userid = Auth::user()->id;
        $return = ResponseModel::select('emergencies.*','users.name as created_by_name','users.contact as contact')
        ->join('users','users.id','emergencies.userid');
        $return = $return
        ->where('emergencies.status','=',0)
        ->where('emergencies.is_delete','=',1)
        ->where('emergencies.medic','=',$userid)
        ->where('emergencies.served','=',1)
            ->orderBy('emergencies.id', 'desc')
            ->paginate(5);
    
            return $return;
        }


        //GET USER EMERGENCY HISTORY
    public static function getEmergencyHistory(){
        $userid = Auth::user()->id;
        $return = ResponseModel::select('emergencies.*','users.name as created_by_name','users.contact as contact')
        ->join('users','users.id','emergencies.userid');
        $return = $return
        ->where('emergencies.status','=',0)
        ->where('emergencies.is_delete','=',1)
        ->where('emergencies.userid','=',$userid)
        // ->where('emergencies.served','=',1)
            ->orderBy('emergencies.id', 'desc')
            ->paginate(5);
    
            return $return;
        }
    public static function getUnassignedEmergencies(){
        


    $return = ResponseModel::select('emergencies.*','users.name as created_by_name','users.contact as contact')
    ->join('users','users.id','emergencies.userid');
    $return = $return
    ->where('emergencies.status','=',1)
    ->where('emergencies.is_delete','=',1)
        ->orderBy('emergencies.id', 'desc')
        ->paginate(5);

        return $return;
    }
    public static function getEmergencies(){
        


    $return = ResponseModel::select('emergencies.*','users.name as created_by_name','users.contact as contact')
    ->join('users','users.id','emergencies.userid');
    $return = $return
    ->where('emergencies.is_delete','=',1)
        ->orderBy('emergencies.id', 'desc')
        ->paginate(5);

        return $return;
    }


    //get all solved emergencies
    public static function getSolvedEmergencies(){
        


    $return = ResponseModel::select('emergencies.*','users.name as created_by_name','users.contact as contact')
    ->join('users','users.id','emergencies.userid');
    $return = $return
    ->where('emergencies.is_delete','=',1)
    ->where('emergencies.served','=',1)
        ->orderBy('emergencies.id', 'desc')
        ->paginate(5);

        return $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }
    public static function getAssignedEmergencies(){
        


    $return = ResponseModel::select('emergencies.*','users.name as created_by_name','users.contact as contact')
    ->join('users','users.id','emergencies.userid');
    $return = $return
    ->where('emergencies.status','=',0)
    ->where('emergencies.is_delete','=',1)
        ->orderBy('emergencies.id', 'desc')
        ->paginate(5);

        return $return;
    }
}
