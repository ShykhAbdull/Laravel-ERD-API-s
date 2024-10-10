<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Services\EmployeeService;
use DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->middleware('auth:api');
        $this->employeeService = $employeeService;
    }


    public function getEmployeesInOffice(Request $request , $officeCode) {
        $perPage = $request->get('per_page', 5);  

        $employees = $this->employeeService->getEmployeesInOfficePaginated($officeCode, $perPage);
    
    return jsonResponse($employees);
    }
}
