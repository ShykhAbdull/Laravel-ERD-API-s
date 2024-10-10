<?php

namespace App\Pipelines;
use Closure;

class searchProductsByPrice{

    public function handle($query, Closure $closure )
    {
        if(request()->has('minPrice')&& request()->has('maxPrice')){

            $minPrice = request('minPrice');
            $maxPrice = request('maxPrice');

            // Apply the price range filter to the query
            $query = $query->whereBetween('buyPrice', [$minPrice, $maxPrice]);
            
        }

        return $closure($query);

    }

}