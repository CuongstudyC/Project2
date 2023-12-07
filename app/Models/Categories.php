<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'goods_id',
    ];

    public function relatedGoods(){
        return $this->belongsTo(Goods::class, 'goods_id');
    }

    public function relatedProducts(){
        return $this->hasMany(Products::class,'category_id','id');
    }
}
