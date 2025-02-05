<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $fillable = [
        'orderNumber',
        'customerNumber',
        'orderDate',
        'requiredDate',
        'shippedDate',
        'status',
        'comments',
    ];


    public function orderDetail(){

        return $this ->hasMany(OrderDetail::class, "orderNumber", "orderNumber"); 
    }

    public function customer(){

        return $this ->belongsTo(Customer::class, "customerNumber", "customerNumber"); 
    }
}
