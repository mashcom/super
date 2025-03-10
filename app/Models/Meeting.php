<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $fillable = ["*"];

    public function message(){
        return $this->hasOne(Message::class,'id','message_id');
    }
}
