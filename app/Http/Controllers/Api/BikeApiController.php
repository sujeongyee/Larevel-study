<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BikeFormRequest;
use App\Models\Bike;

class BikeApiController extends Controller
{
    public function index() {
        return response()->json(Bike::all());
    }

    public function store(BikeFormRequest $request) {
        $data = $request->validated();

        $bike = Bike::create([
            'name' => $data['bike-name'],
            'price' => $data['bike-price'],
            'brand' => $data['bike-brand'],
        ]);

        return response()->json(['result' => 'success', 'bike' => $bike]);
    }

    public function show(Bike $bike) {
        return response()->json($bike);
    }

    public function update(BikeFormRequest $request, Bike $bike) {
        $data = $request->validated();
        $bike->update([
            'name' => $data['bike-name'],
            'price' => $data['bike-price'],
            'brand' => $data['bike-brand'],
        ]);

        return response()->json(['result' => 'success', 'bike' => $bike]);
    }

    public function destroy(Bike $bike) {
        $bike->delete();
        return response()->json(['result' => 'success']);
    }
}
