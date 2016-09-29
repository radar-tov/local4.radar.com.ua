<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Review;
use App\Http\Requests\Review\UpdateRequest;
use Auth;

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
        try{
            $data = array_map('strip_tags', $request->only(['product_id', 'body']));

            $data = array_merge($data, ['user_id' => Auth::user()->id, 'active' => 0]);

            Review::create($data);

            return redirect()->back()->with('message', 'Ваш отзыв будет опубликован после модерации');

        } catch (\Exception $e) {
            dd($e->getMessage());
        }


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
    public function update(UpdateRequest $request, $id)
    {
        Review::findOrFail($id)->update($request->all());

        if((int)$request->get('button')) {
            return redirect()->route('dashboard.reviews.index');
        }

        return redirect()->route('dashboard.reviews.edit',$id);
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

        return redirect()->route('dashboard.reviews.index')->withMessage("Review with id {$id} successfully deleted!");
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
            return redirect()->route('dashboard.reviews.index')->withMessage($e->getMessage());
        }
    }
}
