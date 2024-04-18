<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    // Fetch all cars
    public function index()
    {
        $cars = Car::all();
        return response()->json($cars);
    }

    // Store a new car
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'colour' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'transmission' => 'required|string|max:255',
            'car_type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'photo' => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $car = new Car();
        $car->make = $request->make;
        $car->model = $request->model;
        $car->colour = $request->colour;
        $car->year = $request->year;
        $car->transmission = $request->transmission;
        $car->car_type = $request->car_type;
        $car->price = $request->price;
        $car->description = $request->description;

        if ($request->hasFile('photo')) {
            $filename = time() . '.' . $request->photo->getClientOriginalExtension();
            $path = $request->photo->storeAs('carsphoto', $filename, 'public');
            $car->photo = Storage::url($path);
        }

        $car->save();

        return response()->json(['message' => 'Car created successfully!', 'car' => $car], 201);
    }

    // Show a specific car
    public function show($id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json(['error' => 'Car not found'], 404);
        }
        return response()->json($car);
    }

    // Update a car
    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json(['error' => 'Car not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'make' => 'string|max:255',
            'model' => 'string|max:255',
            'colour' => 'string|max:255',
            'year' => 'string|max:255',
            'transmission' => 'string|max:255',
            'car_type' => 'string|max:255',
            'price' => 'numeric',
            'description' => 'string',
            'photo' => 'image',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $car->update($request->all());

        if ($request->hasFile('photo')) {
            $filename = time() . '.' . $request->photo->getClientOriginalExtension();
            $path = $request->photo->storeAs('carsphoto', $filename, 'public');
            $car->photo = Storage::url($path);
        }

        return response()->json(['message' => 'Car updated successfully!', 'car' => $car]);
    }

    // Delete a car
    public function destroy($id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json(['error' => 'Car not found'], 404);
        }

        $car->delete();
        return response()->json(['message' => 'Car deleted successfully']);
    }
}

