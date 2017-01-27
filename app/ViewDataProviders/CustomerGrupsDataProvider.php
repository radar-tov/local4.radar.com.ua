<?php

namespace App\ViewDataProviders;

use App\Models\CustomerGroup;

class CustomerGrupsDataProvider {

    public function getList()
    {
        return CustomerGroup::orderBy('title')->lists('title', 'id');
    }
}