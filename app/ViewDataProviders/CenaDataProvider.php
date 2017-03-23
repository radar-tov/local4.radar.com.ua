<?php

namespace App\ViewDataProviders;

use App\Models\Cena;

class CenaDataProvider {


    public function getList()
    {
        return Cena::orderBy('name')->pluck('name', 'id');
    }
}