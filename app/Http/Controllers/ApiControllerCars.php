<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class ApiControllerCars extends Controller
{

    public function getAllCars() {
        $cars = Car::get()->toJson(JSON_PRETTY_PRINT);
        return response($cars, 200);
    }

    public function createCar(Request $request) {
        $car = new Car;
        $car->description = isset($request->description) ? $request->description : null;
        $car->year = isset($request->year) ? $request->year : null;
        $car->make = isset($request->make) ? $request->make : null;
        $car->model = isset($request->model) ? $request->model : null;
        $car->sub_model = isset($request->sub_model) ? $request->sub_model : null;
        $car->engine = isset($request->engine) ? $request->engine : null;
        $car->mileage = isset($request->mileage) ? $request->mileage : null;
        $car->save();

        return response()->json([
            "message" => "car created"
        ], 201);
    }

    public function getCar($id) {
        if(Car::where('id', $id)->exists()) {
            $car = Car::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($car, 200);
        } else {
            return response()->json([
                "message" => "Car not found"
            ], 404);
        }
    }

    public function updateCar(Request $request, $id) {
        if(Car::where('id', $id)->exists()) {
            $car = Car::find($id);
            $car->description = isset($request->description) ? $request->description : $car->description;
            $car->year = isset($request->year) ? $request->year : $car->year;
            $car->make = isset($request->make) ? $request->make : $car->make;
            $car->model = isset($request->model) ? $request->model : $car->model;
            $car->sub_model = isset($request->sub_model) ? $request->sub_model : $car->sub_model;
            $car->engine = isset($request->engine) ? $request->engine : $car->engine;
            $car->mileage = isset($request->mileage) ? $request->mileage : $car->mileage;
            $car->save();

            return response()->json([
                "message" => "Car updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Car not found"
            ], 404);
        }
    }

    public function deleteCar($id) {
        if(Car::where('id', $id)->exists()) {
            $car = Car::find($id);
            $car->delete();

            return response()->json([
                "message" => "Car deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Car not found"
            ], 404);
        }
    }

}
