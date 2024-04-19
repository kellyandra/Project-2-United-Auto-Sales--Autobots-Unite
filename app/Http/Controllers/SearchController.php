<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $make = $request->input('make');
        $model = $request->input('model');

        // Query cars based on make or model
        $query = Car::query();

        if ($make) {
            $query->where('make', 'LIKE', "%$make%");
        }

        if ($model) {
            $query->where('model', 'LIKE', "%$model%");
        }

        $result = $query->get();

        return response()->json(['cars' => $result]);
    }
}