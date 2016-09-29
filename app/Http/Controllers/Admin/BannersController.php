<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Http\Requests\Banner\CreateRequest;
use App\Http\Requests\Banner\UpdateRequest;

/**
 * Class ArticlesController
 * @package App\Http\Controllers\Admin
 */
class BannersController extends AdminController
{
	/**
	 * @param Banner $banner
	 * @return \Illuminate\View\View
	 */
	public function index(Banner $banner)
	{
		$banners = $banner->orderBy('show','desc')->orderBy('order','desc')->get();

		return view('admin.banners.index',compact('banners'));
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		return view('admin.banners.create')->withBanner(new Banner);
	}

	/**
	 * @param Request|CreateRequest $request
	 * @param Banner $banner
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(CreateRequest $request, Banner $banner)
	{
		$banner = $banner->create($request->all());

		if((int)$request->get('button')) {
			return redirect()->route('dashboard.banners.index')->withMessage('');
		}
		return redirect()->route('dashboard.banners.edit',[$banner->id]);
	}

	/**
	 * @param Banner $banner
	 * @param $id
	 * @return \Illuminate\View\View
	 */
	public function edit(Banner $banner, $id)
	{
		$banner = $banner->findOrFail($id);

		return view('admin.banners.edit',compact('banner'));
	}

	/**
	 * @param UpdateRequest $request
	 * @param Banner $banner
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(UpdateRequest $request, Banner $banner, $id)
	{
		$banner->findOrFail($id)->update($request->all());

		if((int)$request->get('button')) {
			return redirect()->route('dashboard.banners.index')->withMessage('');
		}
		return redirect()->route('dashboard.banners.edit',[$id]);
	}

	/**
	 * @param Banner $banner
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy(Banner $banner, $id)
	{
		$banner->findOrFail($id)->delete();

		return redirect()->route('dashboard.banners.index');
	}

}
