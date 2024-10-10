<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;



    protected $table = "products";

    protected $fillable = [
        "productCode",
        "productName",
        "productLine",
        "productScale",
        "productVendor",
        "productDescription",
        "quantityInStock",
        "buyPrice",
        "MSRP"
    ];

    public function productLine()
    {                                         
        return $this->belongsTo(Productline::class, 'productLine', 'productLine');
//  where Productline::class is the related model class, 'producLline' being the 2nd parameter 
//  is the foreign key of the current model, 3rd parameter is again the primary key of Related Model Class  
    }

    public function orderDetail(){
        return $this ->hasMany(OrderDetail::class, "productCode", "productCode");
// Its's the Inverse of belongsTo
//  where OderDetail::class is the related model class, 'productCode' being the 2nd parameter 
//  is the foreign key of the related model, 3rd parameter is the primary key of Current Model Class 
    }


}
