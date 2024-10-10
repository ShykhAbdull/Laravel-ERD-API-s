<?php

namespace App\Pipelines;
use Closure;

class searchCustomersByState{

public function handle($query, Closure $closure ){

    if(request()->has('state')){

        $state = request('state');

        $query = $query->where('state', $state );
    }
    
    return $closure($query);
}

}