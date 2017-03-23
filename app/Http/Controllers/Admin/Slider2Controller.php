<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider2;
use App\Http\Requests\Slider\CreateRequest;
use App\Http\Requests\Slider\UpdateRequest;

/**
 * Class ArticlesController
 * @package App\Http\Controllers\Admin
 */
class Slider2Controller extends AdminController
{
	/**
	 * @param Slider2 $slider
	 * @return \Illuminate\View\View
	 */
	public function index(Slider2 $slider)
	{
		$sliders = $slider->orderBy('show','desc')->orderBy('order','desc')->get();

		return view('admin.slider2.index',compact('sliders'));
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		return view('admin.slider2.create')->withSlider(new Slider2);
	}

	/**
	 * @param Request|CreateRequest $request
	 * @param Slider2 $slider
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(CreateRequest $request, Slider2 $slider)
	{
		$slider = $slider->create($request->all());

		if((int)$request->get('button')) {
			return redirect()->route('slider2.index')->withMessage('');
		}
		return redirect()->route('slider2.edit', $slider->id);
	}

	/**
	 * @param Slider2 $slider
	 * @param $id
	 * @return \Illuminate\View\View
	 */
	public function edit(Slider2 $slider, $id)
	{
		$slider = $slider->findOrFail($id);

		return view('admin.slider2.edit',compact('slider'));
	}

	/**
	 * @param UpdateRequest $request
	 * @param Slider2 $slider
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(UpdateRequest $request, Slider2 $slider, $id)
	{
		$slider->findOrFail($id)->update($request->all());

		if((int)$request->get('button')) {
			return redirect()->route('slider2.index')->withMessage('');
		}
		return redirect()->route('slider2.edit',$id);
	}

	/**
	 * @param Slider2 $slider
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy(Slider2 $slider, $id)
	{
		$slider->findOrFail($id)->delete();

		return redirect()->route('slider2.index');
	}

}
