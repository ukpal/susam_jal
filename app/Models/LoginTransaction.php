<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginTransaction extends Model
{
    use HasFactory;
    protected $table='login_transaction';
    protected $fillable=[
        'user_id',
        'user_type',
        'login_time',
        'login_latitude',
        'login_longitude',
        'logout_time',
        'logout_latitude',
        'logout_longitude'
    ];
    public $timestamps=false;
}
