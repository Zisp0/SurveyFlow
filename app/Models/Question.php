<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function questionType(){
        return $this->belongsTo(QuestionType::class);
    }

    public function options(){
        return $this->hasMany(Option::class);
    }

    public function responses(){
        return $this->hasMany(Response::class);
    }
}
