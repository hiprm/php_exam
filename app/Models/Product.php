<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $primaryKey = 'id';
    //  public $timestamps = false;
    protected $fillable = [ 'code', 'name', 'description', 'stockQty'];

}
