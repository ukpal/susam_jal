<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTemplate extends Model
{
    use HasFactory;
    protected $table='templates';
    protected $fillable=[
        'name',
        'survey_type'
    ];
    public $timestamps=false;
}
