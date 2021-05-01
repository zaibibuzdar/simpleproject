<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survay extends Model
{
    protected $guarded =[];
    use HasFactory;

    public function questionnaire(){
        return $this->bleongsTo(Questionnaire::class);
    }
    public function responses(){


        return $this->hasMany(SurvayResponse::class);
    }
}
