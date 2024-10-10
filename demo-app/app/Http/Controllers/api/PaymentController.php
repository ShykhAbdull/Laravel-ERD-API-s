<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Services\PaymentService;
use Illuminate\Http\Request;


class PaymentController extends Controller
{

    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->middleware('auth:api');
        $this->paymentService = $paymentService;
    }


    public function getTotalAmountPaidByCustomer($customerNumber) {

        $totalPayment = $this->paymentService->getTotalAmountPaidByCustomer($customerNumber);
        
        return response()->json(['totalPayment' => $totalPayment]);
    }

    public function getPaymentsWithinDateRange(Request $request ,$startDate, $endDate) {
        $perPage = $request->get('per_page', 5);  

        $payments = $this->paymentService->getPaymentsWithinDateRangePaginated($startDate, $endDate, $perPage);
        
        return jsonResponse($payments);

    }

}
