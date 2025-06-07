<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BikeFormRequest;
use App\Models\Bike;
use Illuminate\Http\Request;

class BikeApiController extends Controller
{
    public function index(Request $request) {
        $search = $request->query('search');

        $bikes = $search
            ? Bike::where('name', 'like', "%{$search}%")->get()
            : Bike::all();

        return response()->json($bikes);
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

    // public function show(Bike $bike) { // 해당 ID가 없으면 자동으로 404 응답이 반환
    //     return response()->json($bike);
    // }

    public function show($id) {
        $bike = Bike::find($id);

        if (!$bike) {
            return response()->json([
                'result' => 'error',
                'message' => '해당 자전거를 찾을 수 없습니다.'
            ], 404);

            // abort(404, '해당 자전거를 찾을 수 없습니다.');
        }
        // return response()->json(Bike::findOrFail($id));
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
