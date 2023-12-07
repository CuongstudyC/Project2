<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin;
class admin_remember extends Model
{
    use HasFactory;

    protected $table = 'admin_remembers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'admin_id',
    ];

    public function relationAdmin(){
        return $this->belongsTo(admin::class, 'admin_id');
    }

}
