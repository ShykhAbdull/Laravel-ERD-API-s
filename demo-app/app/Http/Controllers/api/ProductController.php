<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Pipelines\searchProductsByName;
use App\Pipelines\searchProductsByPrice;
use App\Services\ProductService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class ProductController extends Controller
{


    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->middleware('auth:api');

        $this->productService = $productService;
        
    }

    public function getProductsWithProductLine(Request $request)
    {

        try{
     
        $products = $this->productService->getProductsWithProductLine();

    
        $products = app(Pipeline::class)
        ->send($products)
        ->through([searchProductsByName::class, searchProductsByPrice::class])
        ->thenReturn()
        ->paginate(5);

        return jsonResponse($products);

        } 
        catch(Exception $e){

            return errorResponse($e->getMessage());

        } 
    }



    

    public function getProductsInStock(Request $request)
    {

        $productsInStock = $this->productService->getProductsInStockPaginated();
    
        return jsonResponse($productsInStock);
    }
    

    public function getProductsByProductLine(Request $request, $productLine)
    {

        $products = $this->productService->getProductsByProductLinePaginated($productLine);
    
        return jsonResponse($products);
    }
    

}
