<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PlacementSupervisor extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class,"id","user_id");
    }

    public function coordinator(){
        return $this->hasOne(User::class,"id","coordinator_id");
    }

    public function chairperson(){
        return $this->hasOne(User::class,"id","chairperson_id");
    }
}
