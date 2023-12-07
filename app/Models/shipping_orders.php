<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping_orders extends Model
{
    use HasFactory;

    protected $table = 'shipping_orders';

    protected $primaryKey = 'id';

    protected $fillable = [
        'date',
        'fee',
        'type',
        'status',
        'order_id',
    ];

    public function relatedOrder(){
        return $this->belongsTo(orders::class, 'order_id');
    }
}
