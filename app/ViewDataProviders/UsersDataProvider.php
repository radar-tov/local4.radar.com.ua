<?php

namespace App\ViewDataProviders;

use App\Models\CustomerGroup;
use App\Models\User;

class UsersDataProvider {

	public function getCustomersList()
	{
		return User::lists('name', 'id');
	}


	public function getAttachedCustomersList($groupId)
	{
		return User::whereHas('customerGroups', function($group) use($groupId){
			$group->where('id', $groupId);
		})->lists('id', 'name')->all();
	}


	public function getCustomersGroupsList()
	{
		return CustomerGroup::lists('title', 'id');
	}

	public function getAttachedGroupsList($saleId)
	{
		return CustomerGroup::whereHas('sales', function($sale) use($saleId){
			$sale->where('id', $saleId);
		})->lists('id', 'title')->all();
	}


}