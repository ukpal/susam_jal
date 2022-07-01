<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table='employee_master';
    protected $primaryKey = 'emp_id';
    protected $fillable=[
        'emp_number',
        'name',
        'mobile',
        'email',
        'address',
        'gender',
        'department',
        'designation',
        'date_of_joining'
    ];

    public function user(){
        return $this->hasOne(User::class, 'emp_number', 'emp_number');
    }
    public $timestamps=false;
}
