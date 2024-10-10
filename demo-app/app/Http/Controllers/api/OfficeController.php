<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Services\OfficeService;
use DB;
use Illuminate\Http\Request;

class OfficeController extends Controller
{

    protected $officeService;

    public function __construct(OfficeService $officeService)
    {
        $this->middleware('auth:api');
        $this->officeService = $officeService;
    }

    
    public function getOfficesByCountry(Request $request ,$country) {
        $perPage = $request->get('per_page', 5);  

        $offices = $this->officeService->getOfficesByCountryPaginated($country, $perPage);
    
    return jsonResponse($offices);
    }
}
