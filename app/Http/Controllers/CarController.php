<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function getCar($id) {
        if(Car::where('id', $id)->exists()) {
            // Ensure user is authorized to view the car
            Auth::check();
            $car = Car::where('id', $id)->get()[0];
            if($car->user_id != Auth::id()) {
                return response()->view('errors.404');
            }

            return view('car', ['car' => $car]);
        } else {
            return response()->view('errors.404');
        }
    }
}
