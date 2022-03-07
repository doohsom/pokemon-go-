<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ResponseTrait;

    public function login(Request $request) : JsonResponse
    {
        try {
            $credentials = request(['email', 'password']);
            if (auth()->attempt($credentials)) {
                $token = auth('web')->user()->createToken('Pokemon')->accessToken;
                return $this->success('Login Successful', 200, $token);
            } else {
                return $this->failed('Invalid/User Password');
            }
        } catch (\Exception $e) {
            return $this->failed('Invalid/User Password');
        }
    }
}
