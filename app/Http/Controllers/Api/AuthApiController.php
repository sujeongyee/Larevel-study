<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;
use App\Models\Bike;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function register(UserFormRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'id' => $data['id'],
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
        ]);
        return response()->json(['message' => '회원가입 성공'], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('id', $request->id)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['result'=>'error' , 'message' => '아이디 또는 비밀번호가 틀렸습니다.'], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json(['result'=>'success' ,'token' => $token]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => '로그아웃 되었습니다.']);
    }
}