<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Page\CreateRequest;
use App\Http\Requests\Page\UpdateRequest;
use App\Models\Page;

/**
 * Class PagesController
 * @package App\Http\Controllers\Admin
 */
class PagesController extends AdminController
{
	/**
	 * @param Page $page
	 * @return \Illuminate\View\View
	 */
	public function index(Page $page)
	{
		$pages = $page->all();

		return view('admin.pages.index',compact('pages'));
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		return view('admin.pages.create')->withPage(new Page);
	}

	/**
	 * @param CreateRequest $request
	 * @param Page $page
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(CreateRequest $request,Page $page)
	{
		$page = $page->create($request->all());

		if((int)$request->get('button')) {
			return redirect()->route('dashboard.pages.index');
		}

		return redirect()->route('dashboard.pages.edit',[$page->id])->withMessage('');
	}

	/**
	 * @param Page $page
	 * @param $id
	 * @return \Illuminate\View\View
	 */
	public function edit(Page $page, $id)
	{
		$page = $page->findOrFail($id);

		return view('admin.pages.edit',compact('page'));
	}

	/**
	 * @param UpdateRequest $request
	 * @param Page $page
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(UpdateRequest $request, Page $page, $id)
	{
		$page = $page->findOrFail($id)->update($request->all());

		if((int)$request->get('button')) {
			return redirect()->route('dashboard.pages.index');
		}

		return redirect()->route('dashboard.pages.edit',[$page->id])->withMessage('');

	}

	/**
	 * @param Page $page
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy(Page $page, $id)
	{
		$page->findOrFail($id)->delete();

		return redirect()->route('dashboard.pages.index');
	}

}
