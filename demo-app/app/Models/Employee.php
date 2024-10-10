<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";

    protected $fillable = [
        'employeeNumber',
        'firstName',
        'lastName',
        'extension',
        'email',
        'officeCode',
        'reportsTo',
        'jobTitle'
    ];

    public function customer(){

        return $this ->hasMany(Customer::class, "salesRepEmployeeNumber", "employeeNumber"); 
    }

    public function office(){

        return $this ->belongsTo(Office::class, "offceCode", "officeCode");
    }

    
}
