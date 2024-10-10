<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Pipeline\Pipeline;

class ProductService
{
    public function getProductsWithProductLine()
    {
        return Product::with(['productLine' => function ($query) {
            $query->select('productLine', 'textDescription'); 
        }]);
            
    }

    public function getProductsInStockPaginated()
    {
        return Product::with(['productLine' => function ($query) {
            $query->select('productLine', 'textDescription'); // Select only the relevant columns from productlines
        }])
        ->where('quantityInStock', '>', 0) // Filter products with stock greater than 0
        ->paginate(5);
    }

    public function getProductsByProductLinePaginated($productLine)
    {
        return Product::with(['productLine' => function ($query) {
            $query->select('productLine', 'textDescription'); 
        }])
        ->where('productLine', $productLine) 
        ->paginate(5);

    }



}
