<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Questionnaire extends Model
{
    protected $guarded = [];
    use HasFactory;

     public function path(){

       return url('/questionnaires/'.$this->id);


     }

     public function publicpath(){

        return url('/survays/'.$this->id. '-'. Str::slug ($this->title));
     }

    public function user(){
        return $this->belongsTo(User::class);
    }

       public function questions(){

        return $this->hasMany(Question::class);
       }
     
       public function survays(){

        return $this->hasMany(Survay::class);
       }
  


}
