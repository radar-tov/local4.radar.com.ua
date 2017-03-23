<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Review;
use App\Http\Requests\Review\UpdateRequest;
use Auth;
use App\Models\Product;

class ReviewsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.reviews.index')
            ->withReviews(Review::with('product','user')
                ->orderBy('active')
                    ->orderBy('created_at','desc')->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $messages = [
            'required' => "Поле :attribute обязательно к заполнению.",
            'max' => "Поле :attribute ",
            'min' => "Поле :attribute "
        ];

        $rules = [
            'name' 	=> 'required|max:60|min:3',
            'body' => 'required'
        ];

        $this->validate($request, $rules, $messages);

        $data = array_map('strip_tags', $request->only(['product_id', 'body']));

        if(Auth::check())
        {
            $data = array_merge($data, ['user_id' => Auth::user()->id, 'active' => 0]);
        }else{
            $data = array_merge($data, ['user_id' => '292', 'active' => 0]);
        }

        Review::create($data);

        return response('<h3 align="center">Ваш отзыв будет опубликован после модерации</h3>');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $review = Review::with('user','product')->findOrFail($id);

        return view('admin.reviews.edit',compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param  int $id
     * @return Response
     */
    public function update(UpdateRequest $request, Product $product, $id)
    {
        //dd($request->all());
        Review::findOrFail($id)->update($request->all());

        if((int)$request->get('button')) {
            return redirect()->route('reviews.index');
        }

        $date = new \DateTime('NOW');
        $product->where('id', $request->product_id)->update(['updated_at' => $date->format("Y-m-d H:i:s")]);

        return redirect()->route('reviews.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Review::findOrFail($id)->delete();

        return redirect()->route('reviews.index')->withMessage("Review with id {$id} successfully deleted!");
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        try{
            $query   = $this->prepareSearchQuery($request->get('q'));

            $reviews = Review::where('body', 'like', $query)->with('user','product')->paginate();

            return view('admin.reviews.index')->withReviews($reviews)->withQ($request->get('q'));

        } catch(\Exception $e) {
            return redirect()->route('reviews.index')->withMessage($e->getMessage());
        }
    }
}
