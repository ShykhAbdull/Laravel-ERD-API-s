<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Services\OrderDetailService;
use DB;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{

    protected $orderDetailService;

    public function __construct(OrderDetailService $orderDetailService )
    {
        $this->middleware('auth:api');
        $this->orderDetailService = $orderDetailService;
    }
    
    public function getOrderDetailsForOrder(Request $request, $orderNumber)
    {

        $perPage = $request->get('per_page', 5);  

        $orderDetails = $this->orderDetailService->getOrderDetailsForOrderPaginated($orderNumber, $perPage);

        return jsonResponse($orderDetails);
    }
    

    public function getTotalQuantityOrderedForProduct( $productCode) {

        
        $totalQuantity = $this->orderDetailService->getTotalQuantityOrderedForProduct($productCode);

        return response()->json(['totalQuantity' => $totalQuantity]);
    }

}
