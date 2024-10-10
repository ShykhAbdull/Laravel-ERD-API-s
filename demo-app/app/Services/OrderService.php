<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderService{


    public function getOrdersForCustomerPaginated($customerNumber, $perPage=5) {

        return Order::where('customerNumber', $customerNumber)->paginate($perPage);

    }

    public function getPendingOrdersPaginated($perPage=5) {

        return  Order::where('status', 'Pending')->paginate($perPage);
    
    }

    public function getOrderCountByCustomerPaginated($perPage=5) {
        return  Order::select('customerNumber', DB::raw('count(*) as totalOrders')) 
        ->groupBy('customerNumber')
        ->paginate($perPage);        
    }


}