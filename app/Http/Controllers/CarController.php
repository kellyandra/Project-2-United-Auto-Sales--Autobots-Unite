<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Auth;
class CarController extends Controller
{
    public function create()
   {
    return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required|string|max:255',
            'make'=>'required|string|max:255',
            'model'=>'required|string|max:255',
            'colour'=>'required|string|max:255',
            'year'=>'required|string|max:4',
            'transmission'=>'required|string|max:100',
            'car_type'=>'required|string|max:255',
            'price'=>'required|numeric',
            'photo'=>'required|image|mimes:jpeg,png,jpg',
   
        ]);
        $fileName = null;
         // Upload the file
         if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/cars', $fileName); // Store the uploaded file
            $filePath  = 'cars/' . $fileName;

        }

        //Save car data to database
        $car = new Car();
        $car->description = $request->description;
        $car->make = $request->make;
        $car->model= $request->model;
        $car->colour = $request->colour;
        $car->year = $request->year;
        $car->transmission = $request->transmission;
        $car->car_type = $request->car_type;
        $car->price = $request->price;
        $car->photo = $filePath;
        $car->save();

    }

}
