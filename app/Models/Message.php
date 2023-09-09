<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $tableName = "chat_messages";

    protected $fillable = [
        'content',
        'chat_id',
        'user_id',
    ];
    
    public function getTable()
    {
        return "chat_messages";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

}
