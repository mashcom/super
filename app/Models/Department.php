<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function chairperson(){
        return $this->hasOne(DepartmentChairperson::class);
    }

    public function coordinator(){
        return $this->hasOne(DepartmentCoordinator::class);
    }
}
