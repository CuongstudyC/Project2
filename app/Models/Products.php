<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'price',
        'image',
        'decription',
        'category_id',
        'subPrice',
        'event_id',
    ];

    public function relatedCategory(){
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function relatedEvents(){
        return $this->belongsTo(Events::class, 'event_id');
    }
}
