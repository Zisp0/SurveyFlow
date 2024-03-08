<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyState extends Model
{
    use HasFactory;

    public function surveys(){
        return $this->hasMany(Survey::class);
    }
}
