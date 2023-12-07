<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin_remember;
class admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    protected $primaryKey = 'id';

    protected $fillable = [
        'full_name',
        'position',
        'user_name',
        'email',
        'password',
        'image',
    ];

    protected $hidden = [
        'password',
    ];

    protected $carts = [
        'password' =>'hashed',
    ];

    public function rememberAdmin1() {
        return $this->hasOne(admin_remember::class,'admin_id','id');
    }

    public function realatedReport(){
        return $this->hasMany(report::class,'admin_id'.'id');
    }

    public function relatedChatBoxDetail(){
        return $this->hasMany(chatBoxDetail::class,'admin_id','id');
    }
}
