<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'orderdetails'; // Ensure this matches your table name

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'orderNumber',
        'productCode',
        'quantityOrdered',
        'priceEach',
        'orderLineNumber',
    ];


    public function product(){

        return $this ->belongsTo(Product::class, "productCode", "productCode");
    }


    public function order(){
        
        return $this ->belongsTo(Order::class, 'orderNumber', 'orderNumber');
    }
}
