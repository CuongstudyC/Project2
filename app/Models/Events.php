<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'code',
        'discount',
        'time_end',
    ];

    public function relatedProducts(){
        return $this->hasMany(Products::class,'event_id','id');
    }
}
