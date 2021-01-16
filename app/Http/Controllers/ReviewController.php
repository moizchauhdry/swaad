<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::orderBy('id','DESC')->get();
        return view ('admin.reviews.index',compact('reviews'));    
    }

    public function approveReview($id)
    {
        $review = Review::find($id);
        $review->update(['is_approved' => 1 ]);

        return redirect()->back()->with('success','Status update successfully');
    }
}
