<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Support\Facades\Auth;

class CarsController extends Controller
{
    public function getCar($id) {
        if(Car::where('id', $id)->exists()) {
            // Ensure user is authorized to view the car
            Auth::check();
            $car = Car::where('id', $id)->get()[0];
            if($car->user_id != Auth::id()) {
                return response()->json([
                    "message" => "Car not found"
                ], 404);
            }

            return view('car', ['car' => $car]);
        } else {
            return response()->json([
                "message" => "Car not found"
            ], 404);
        }
    }
}
