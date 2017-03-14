<?php
namespace App\ViewDataProviders;

use App\Models\Country;

class CountryDataProvider {


    public function getList()
    {
        return Country::orderBy('name')->pluck('name', 'id');
    }
}