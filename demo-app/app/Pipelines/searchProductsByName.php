<?php

namespace App\Pipelines;
use Closure;

class searchProductsByName{
    
    public function handle($query, Closure $closure ){

        if(request()->has('productName')){

            $productName = request('productName');

            $query = $query->where('productName', $productName );
            
        }

        return $closure($query);
    }

}