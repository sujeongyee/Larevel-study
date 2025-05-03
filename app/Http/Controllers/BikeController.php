<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;

class BikeController extends Controller
{
    private static function getData() {
        return [
        //    ['id' => 1, 'name' => "삐용삐용잘나가요1단", 'brand' => "삼천리자전거", 'price' => "17,001원"],
        //    ['id' => 2, 'name' => "삐용삐용잘나가요2단", 'brand' => "사천리자전거", 'price' => "17,002원"], 
        //    ['id' => 3, 'name' => "삐용삐용잘나가요3단", 'brand' => "오천리자전거", 'price' => "17,003원"], 
        //    ['id' => 4, 'name' => "삐용삐용잘나가요4단", 'brand' => "육천리자전거", 'price' => "17,004원"]
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('bikes.index', [
            // 'bikes' => self::getData(),
            'bikes' => Bike::all(),
            'userInput' => '<script>alert("목록 조회 성공")</script>'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bikes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bike-name' => 'required',
            'bike-brand' => 'required',
            'bike-price' => ['required','integer'],
        ]);
        //
        $bike = new Bike(); // Bike 모델을 이용해서, db연결하고 그 결과를 객체로 저장
        $bike->name = strip_tags($request->input('bike-name'));
        $bike->brand = strip_tags($request->input('bike-brand'));
        $bike->price = strip_tags($request->input('bike-price'));
        $bike->save();
        return redirect()->route('bikes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bike)
    {
        $bikes = self::getData();
        $data = $bikes[array_search($bike,array_column($bikes,'id'))];
        return view('bikes.show',['bike'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
