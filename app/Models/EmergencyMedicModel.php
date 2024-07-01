<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyMedicModel extends Model
{
    use HasFactory;
    protected $table = 'assigned_emergency';


    static public function getRecord(){
        return self::get();
    }
}
