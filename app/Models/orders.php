<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'phone',
        'address',
        'total',
        'user_id',
    ];

    public function relatedOrder_detail() {
        return $this->hasMany(order_details::class,'order_id','id');
    }

    public function relatedShipping_Order() {
        return $this->hasOne(shipping_orders::class,'order_id','id');
    }

    public function relatedUsers() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
