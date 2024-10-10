<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService{


    public function getEmployeesInOfficePaginated($officeCode, $perPage=5) {
        
        return Employee::where('officeCode', $officeCode) ->paginate($perPage);

    }

}