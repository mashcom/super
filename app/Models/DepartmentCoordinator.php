<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentCoordinator extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function department(){
        return $this->hasOne(Department::class,'id','department_id');
    }
}
