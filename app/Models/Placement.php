<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }

    public function work_supervisor()
    {
        return $this->hasOne(WorkSupervisor::class, "placement_id", "id");
    }

    public function placement_supervisor()
    {
        return $this->hasOne(PlacementSupervisor::class);
    }

    public function project()
    {
        return $this->hasOne(PlacementProject::class, 'placement_id', 'id');
    }

}
