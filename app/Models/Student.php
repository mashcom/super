<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function programme_details(){
        return $this->hasOne(Programme::class,'id','programme');
    }

    public function placement(){
        return $this->hasOne(Placement::class);
    }
}
