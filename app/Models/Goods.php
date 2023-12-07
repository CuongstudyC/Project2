<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;

    protected $table = 'goods';

    protected $primaryKey = 'id';

    protected $fillable = [
        'admin_id',
        'goods_from',
        'image',
    ];


    public function relatedCategories() {
        return $this->hasMany(Categories::class,'goods_id','id');
    }
}
