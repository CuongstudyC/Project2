<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    use HasFactory;


  protected $table = 'order_details';

  protected $primaryKey = 'id';

  protected $fillable = [
      'product_name',
      'product_price',
      'product_qty',
      'product_id',
      'order_id',
  ];

  public function relatedOrder(){
    return $this->belongsTo(orders::class, 'order_id');
}

}
