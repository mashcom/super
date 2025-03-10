<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ["*"];
    public function document(){
        return $this->hasOne(Document::class);
    }

    public function meeting(){
        return $this->hasOne(Meeting::class);
    }

    public function sender(){
        return $this->hasOne(User::class,"id","sender_id");
    }

    public function conversation(){
        return $this->hasOne(Conversation::class,"id","conversation_id");
    }
}
