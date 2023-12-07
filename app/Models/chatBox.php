<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chatBox extends Model
{
    use HasFactory;

    protected $table = 'chat_boxes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
    ];

    public function relatedUsers(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function relatedChatBoxDetail(){
        return $this->hasMany(chatBoxDetail::class,'chat_id','id');
    }
}
