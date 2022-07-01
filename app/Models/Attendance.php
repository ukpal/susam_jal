<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table='attendance';
    // protected $primaryKey = 'emp_id';
    protected $fillable=[
        'user_id',
        'time_in',
        'time_out',
        'claimed'
    ];

    // public function user(){
    //     return $this->hasOne(User::class, 'emp_number', 'emp_number');
    // }
    
    public $timestamps=false;
}
