<?php
namespace App\Http\Controllers\Admin;
use App\Models\Setting;
use App\Http\Requests\Setting\UpdateRequest;
use Cache;
/**
 * Created by Igor Mazur
 * Date: 06.06.15 15:16
 */
class DashboardController extends  AdminController
{
	public function getIndex()
	{
		$settings = Setting::firstOrCreate([]);
		return view('admin.settings-improve',compact('settings'));

	}

	public function putIndex(UpdateRequest $request, $id)
	{
		Cache::forget('Settings');

		Setting::findOrFail($id)->update($request->all());

		return redirect('dashboard');
	}

}
