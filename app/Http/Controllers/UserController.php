<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'email_verified_at' => 'required',
            'password	'=>'required',
        ]);

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'Flag' => 1,
            'message' => 'User successfully registered',
            'data' => $user
        ], 201);
    }
    public function login(Request $request)
    {
        $user= User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response(['Flag' => 1,
                'message' => 'credentials do not match',
                'data' => ''
            ], 200);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }

}
