<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected $orderService;

    public function __construct( OrderService $orderService)
    {
        $this->middleware('auth:api');
        $this->orderService = $orderService;
    }


    public function getOrdersForCustomer(Request $request, $customerNumber) {
        $perPage = $request->get('per_page', 5);  // Default items per page to 5

        $orders = $this->orderService->getOrdersForCustomerPaginated($customerNumber, $perPage);

        return jsonResponse($orders);
    }

    public function getPendingOrders(Request $request) {
        
        $perPage = $request->get('per_page', 5);

        $pendingOrders = $this->orderService->getPendingOrdersPaginated($perPage);
        
        return jsonResponse($pendingOrders);
    }

        public function getOrderCountByCustomer(Request $request) {
            $perPage = $request->get('per_page', 5);
            
            $orderCounts = $this->orderService->getOrderCountByCustomerPaginated($perPage);
            
        return jsonResponse($orderCounts);
    }


}
