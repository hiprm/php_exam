<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $fillable = [ 'customerId', 'orderDate', 'status', 'comment'];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customerId', 'id');
    }

    public function order_details()
    {
        return $this->belongsTo('App\Models\OrderDetails', 'id', 'id');
    }

}
