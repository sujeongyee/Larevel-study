<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Bike;
use Illuminate\Http\Request;
use App\Http\Requests\BikeFormRequest;

class BikePageController extends Controller
{

    public function index() {
        return view('bikes.index');
    }

    public function create() {
        return view('bikes.create');
    }

    public function show(Bike $bike) {
        return view('bikes.show', ['bike' => $bike]);
    }

    public function edit(Bike $bike) {
        return view('bikes.edit', ['bike' => $bike]);
    }


    // private static function getData() {
    //     return [
    //     //    ['id' => 1, 'name' => "삐용삐용잘나가요1단", 'brand' => "삼천리자전거", 'price' => "17,001원"],
    //     //    ['id' => 2, 'name' => "삐용삐용잘나가요2단", 'brand' => "사천리자전거", 'price' => "17,002원"], 
    //     //    ['id' => 3, 'name' => "삐용삐용잘나가요3단", 'brand' => "오천리자전거", 'price' => "17,003원"], 
    //     //    ['id' => 4, 'name' => "삐용삐용잘나가요4단", 'brand' => "육천리자전거", 'price' => "17,004원"]
    //     ];
    // }
    // public function index()
    // {
    //     //
    //     return view('bikes.index', [
    //         // 'bikes' => self::getData(),
    //         // 'userInput' => '<script>alert("목록 조회 성공")</script>'
    //         'bikes' => Bike::all(),
    //         'userInput' => '목록 조회 성공'
    //     ]);
    // }

    // public function create()
    // {
    //     return view('bikes.create');
    // }

    // public function store(BikeFormRequest $request)
    // {
    //     $data = $request->validated();
    //     $bike = new Bike(); // Bike 모델을 이용해서, db연결하고 그 결과를 객체로 저장
    //     $bike->name = $data['bike-name'];
    //     $bike->price = $data['bike-price'];
    //     $bike->brand = $data['bike-brand'];
    //     $bike->save();
    //     return redirect()->route('bikes.index');
    // }

    // public function show(Bike $bike)
    // {
    //     // $bikes = self::getData();
    //     // $data = $bikes[array_search($bike,array_column($bikes,'id'))];
    //     return view('bikes.show',['bike'=>$bike]); // Bike::findOrFail($bike)
    // }

    // public function edit(Bike $bike)
    // {
    //     return view('bikes.edit',[
    //         'bike' => $bike
    //     ]);
    // }

    // public function update(BikeFormRequest $request, Bike $bike)
    // {
    //     $data = $request->validated();
    //     // $bike = Bike::findOrFail($id); // Bike 모델을 이용해서, db연결하고 그 결과를 객체로 저장
    //     $bike->name = $data['bike-name'];
    //     $bike->price = $data['bike-price'];
    //     $bike->brand = $data['bike-brand'];
    //     $bike->save();
    //     return redirect()->route('bikes.show',$bike->id);
    // }

    // public function destroy(Bike $bike)
    // {
    //     $bike->delete();
    //     return redirect()->route('bikes.index')->with('success', '상품이 삭제되었습니다.');
    // }
}
