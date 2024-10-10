<?php


namespace App\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerService{
    
    public function getCustomersWithSalesRep(){
        return DB::table('customers')
            ->join('employees', 'customers.salesRepEmployeeNumber', '=', 'employees.employeeNumber')
            ->select('customers.*', 'employees.firstName as salesRepFirstName', 'employees.lastName as salesRepLastName')
            ->orderBy('customers.id');
    }

    public function getHighestCreditLimit() {
        return Customer::max('creditLimit');
    }

    public function getCustomersWithOrderCountPaginated() {
       return DB::table('customers')
            ->join('orders', 'customers.customerNumber', '=', 'orders.customerNumber')
            ->select('customers.customerNumber', 'customers.customerName', DB::raw('count(orders.orderNumber) as totalOrders'))
            ->groupBy('customers.customerNumber', 'customers.customerName' )
            ->paginate(5);
            
    }

}