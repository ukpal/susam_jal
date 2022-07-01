<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDivision extends Model
{
    use HasFactory;
    protected $table='sub_divisions';
    protected $fillable=[
        'name',
        'district_id',
    ];
    public $timestamps=false;
}
