<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyUsers extends Model
{
    use HasFactory;

    protected $table = 'survey_users';

    protected $fillable = [
        'survey_id',
        'user_id'
    ];

    public $timestamps = false;

    public function survey()
    {
        return $this->belongsTo(SurveySchedule::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
