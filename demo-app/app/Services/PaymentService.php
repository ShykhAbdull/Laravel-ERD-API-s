<?php

namespace App\Services;

use App\Models\Payment;

class PaymentService{

    public function getTotalAmountPaidByCustomer($customerNumber) {

        return Payment::where('customerNumber', $customerNumber)->sum('amount');

    }

    public function getPaymentsWithinDateRangePaginated($startDate, $endDate, $perPage=5) {
        
        return Payment::whereBetween('paymentDate', [$startDate, $endDate])->paginate($perPage);
    
    }



}