<?php

namespace App\Services;

use App\Models\OrderDetail;

class OrderDetailService{

    public function getOrderDetailsForOrderPaginated($orderNumber, $perPage=5)
    {
        return OrderDetail::where('orderNumber', $orderNumber)->paginate($perPage);

    }

    public function getTotalQuantityOrderedForProduct($productCode) {

        return OrderDetail::where('productCode', $productCode )->sum('quantityOrdered');
        
    }




}