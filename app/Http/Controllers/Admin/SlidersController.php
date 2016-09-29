<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Http\Requests\Slider\CreateRequest;
use App\Http\Requests\Slider\UpdateRequest;

/**
 * Class ArticlesController
 * @package App\Http\Controllers\Admin
 */
class SlidersController extends AdminController
{
	/**
	 * @param Slider $slider
	 * @return \Illuminate\View\View
	 */
	public function index(Slider $slider)
	{
		$sliders = $slider->orderBy('show','desc')->orderBy('order','desc')->get();

		return view('admin.sliders.index',compact('sliders'));
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		return view('admin.sliders.create')->withSlider(new Slider);
	}

	/**
	 * @param Request|CreateRequest $request
	 * @param Slider $slider
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(CreateRequest $request, Slider $slider)
	{
		$slider = $slider->create($request->all());

		if((int)$request->get('button')) {
			return redirect()->route('dashboard.sliders.index')->withMessage('');
		}
		return redirect()->route('dashboard.sliders.edit', $slider->id);
	}

	/**
	 * @param Slider $slider
	 * @param $id
	 * @return \Illuminate\View\View
	 */
	public function edit(Slider $slider, $id)
	{
		$slider = $slider->findOrFail($id);

		return view('admin.sliders.edit',compact('slider'));
	}

	/**
	 * @param UpdateRequest $request
	 * @param Slider $slider
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(UpdateRequest $request, Slider $slider, $id)
	{
		$slider->findOrFail($id)->update($request->all());

		if((int)$request->get('button')) {
			return redirect()->route('dashboard.sliders.index')->withMessage('');
		}
		return redirect()->route('dashboard.sliders.edit',$id);
	}

	/**
	 * @param Slider $slider
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy(Slider $slider, $id)
	{
		$slider->findOrFail($id)->delete();

		return redirect()->route('dashboard.sliders.index');
	}

}
