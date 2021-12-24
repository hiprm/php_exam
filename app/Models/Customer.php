<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $primaryKey = 'id';
    //  public $timestamps = false;
    protected $fillable = [ 'id', 'name', 'phone', 'address1', 'address2', 'city'];

}
