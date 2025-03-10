<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ["student_id","supervisor_id"];

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function student(){
        return $this->hasOne(Student::class,'id','student_id');
    }

    public function supervisor(){
        return $this->hasOne(User::class,'id','supervisor_id');
    }
}
