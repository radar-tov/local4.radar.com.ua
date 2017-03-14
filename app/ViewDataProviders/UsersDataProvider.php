<?php

namespace App\ViewDataProviders;

use App\Models\CustomerGroup;
use App\Models\User;

class UsersDataProvider {

	public function getCustomersList()
	{
		return User::pluck('name', 'id');
	}


	public function getAttachedCustomersList($groupId)
	{
		return User::whereHas('customerGroups', function($group) use($groupId){
			$group->where('id', $groupId);
		})->pluck('id', 'name')->all();
	}


	public function getCustomersGroupsList()
	{
		return CustomerGroup::pluck('title', 'id');
	}

	public function getAttachedGroupsList($saleId)
	{
		return CustomerGroup::whereHas('sales', function($sale) use($saleId){
			$sale->where('id', $saleId);
		})->pluck('id', 'title')->all();
	}


}