<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyArea extends Model
{
    use HasFactory;
    protected $table='survey_areas';
    protected $fillable=[
        'name',
        'district_id',
        'area_type'
    ];
    public $timestamps=false;
}
