<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\OnlineClass;

class RatingController extends Controller
{
    public function store(Request $request, $classId)
        {
        // Pastikan bahwa $classId memiliki nilai yang benar
        $class = OnlineClass::findOrFail($classId);

        $request->validate([
            'rating' => 'required|integer|between:1,5',
        ], [
            'rating.required' => 'Rating is required',
        ]);

        $rating = $class->ratings()->create([
            'rating_value' => $request->rating,
        ]);

        return redirect()->route('myclass.show', ['classId' => $class]);
    }


}
