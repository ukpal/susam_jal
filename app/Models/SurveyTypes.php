<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTypes extends Model
{
    use HasFactory;
    protected $table='survey_types';
    protected $fillable=[
        'name',
    ];
    public $timestamps=false;
}
