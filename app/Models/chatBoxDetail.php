<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chatBoxDetail extends Model
{
    use HasFactory;

    protected $table = 'chat_box_details';

    protected $primaryKey = 'id';

    protected $fillable = [
        'content',
        'admin_id',
        'chat_id',
    ];

    public function relatedAdmin(){
        return $this->belongsTo(admin::class,'admin_id');
    }

    public function relatedChatBox(){
        return $this->belongsTo(chatBox::class,'chat_id');
    }

}
