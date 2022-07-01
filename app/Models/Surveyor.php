<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveyor extends Model
{
    use HasFactory;
    protected $table='surveyor_master';
    protected $guarded=[];
    protected $primaryKey="surveyor_id";

    // public function user(){
    //     return $this->hasOne(User::class, 'emp_number', 'emp_number');
    // }
}
