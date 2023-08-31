<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Review\StoreReviewRequest;
use App\Models\Review;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            switch (ucwords($request->reviewable_type)) {
                case 'Restaurant':
                    $model = '\Restaurant';
                    break;
                case 'Food':
                    $model = '\Food';
                    break;
                case 'Category':
                    $model = '\Category';
                    break;
                default:
                    break;
            }

            $model = 'App\Models' . $model;
            $model = $model::findOrFail($request->reviewable_id);

            $model = $model->load('reviews');

            $reviews = $model->reviews;

            return response()->json($reviews);
        } catch (Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {
        try {
            switch (ucwords($request->reviewable_type)) {
                case 'Restaurant':
                    $model = '\Restaurant';
                    break;
                case 'Category':
                    $model = '\Category';
                    break;
                case 'Food':
                    $model = '\Food';
                    break;
                default:
                    break;
            }

            $model = "App\Models" . $model;
            $model = $model::findOrFail($request->reviewable_id);

            $review = Review::create($request->all());

            $review->user()->associate(Auth::user());

            $model->reviews()->save($review);

            return response()->json(['message' => 'Review successfully created']);
        } catch (Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
