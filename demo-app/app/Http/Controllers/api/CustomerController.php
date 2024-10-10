<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Pipelines\searchCustomersByState;
use App\Services\CustomerService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;


class CustomerController extends Controller
{

    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->middleware('auth:api');

        $this->customerService = $customerService;

    }


    public function getCustomersWithSalesRep(Request $request) {
        try {

        $query = $this->customerService->getCustomersWithSalesRep();        

        $customers = app(Pipeline::class)

        ->send($query)
        ->through([searchCustomersByState::class])
        ->thenReturn()
        ->paginate(5);

        return jsonResponse($customers);


        } catch (Exception $e) {
            return errorResponse('Failed to retrieve customers with sales Rep', 500, ['exception' => $e->getMessage()]);
        }
    }

    public function getHighestCreditLimit() {

        $highestCreditLimit = $this->customerService->getHighestCreditLimit();
        return response()->json(['Highest Credit Limit' => $highestCreditLimit]);
        
    }

        public function getCustomersWithOrderCount(Request $request) {
            $customersOrderCount = $this->customerService->getCustomersWithOrderCountPaginated();
            return jsonResponse($customersOrderCount);

    }


}
