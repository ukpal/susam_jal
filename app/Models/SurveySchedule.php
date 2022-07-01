<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveySchedule extends Model
{
    use HasFactory;
    protected $table='survey_schedule';
    protected $fillable=[
        'survey_type_id',
        'district_id',
        'sub_division_id',
        'ulb_id',
        'start_time',
        'end_time',
        'no_of_survey'
    ];
    public $timestamps=false;

    public function type(){
        return $this->belongsTo(SurveyTypes::class, 'survey_type_id');
    }

    public function district(){
        return $this->belongsTo(District::class, 'district_id');
    }

    public function has_users(){
        return $this->hasMany(SurveyUsers::class, 'survey_id');
    }
}
