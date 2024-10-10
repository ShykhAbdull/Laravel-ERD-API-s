<?php

namespace App\Services;

use App\Models\Office;

class OfficeService{

    public function getOfficesByCountryPaginated($country, $perPage=5 ) {
        return Office::where('country', $country)->paginate($perPage);
            
    }



}