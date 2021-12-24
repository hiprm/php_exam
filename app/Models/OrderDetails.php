<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [ 'orderId','customerId', 'productId', 'orderQty', 'unitPrice'];


//    public function customer()
//    {
//        return $this->belongsTo('App\Models\Customer', 'customerId', 'id');
//    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'productId', 'id');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'orderId', 'id');
    }

}
