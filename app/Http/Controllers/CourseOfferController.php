<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseOfferController extends Controller
{
    public function store(Course $course, Request $request)
    {
        $course->offers()->save(
            Offer::make(
                $request->validate([
                    'amount' => 'required|integer|min:1|max:20000000'
                ])
            )->bidder()->associate($request->user())
        );

        return redirect()->back()->with(
            'success',
            'Offer was made!'
        );
    }
}
