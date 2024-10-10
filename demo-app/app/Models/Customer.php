<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customers" ;



    protected $fillable = [
        'customerName',
        'contactLastName',
        'contactFirstName',
        'phone',
        'addressLine1',
        'addressLine2',
        'city',
        'state',
        'postalCode',
        'country',
        'salesRepEmployeeNumber',
        'creditLimit',
    ];

    public function order(){

        return $this ->hasMany(Order::class, "customerNumber", "customerNumber"); 
    }

    public function payment(){

        return $this ->hasMany(Payment::class, "customerNumber", "customerNumber"); 
    }

    public function employee(){

        return $this ->belongsTo(Employee::class, "salesRepEmployeeNumber", "employeeNumber"); 
    }




}
