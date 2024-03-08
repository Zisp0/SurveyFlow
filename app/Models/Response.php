<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_id',
        'question_id',
        'option_id',
        'open_text_response',
        'token'
    ];

    public function survey(){
        return $this->belongsTo(Survey::class);
    }

    public function option(){
        return $this->belongsTo(Option::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
