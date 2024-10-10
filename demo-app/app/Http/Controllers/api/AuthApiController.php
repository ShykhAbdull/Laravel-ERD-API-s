<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthApiController extends Controller
{


    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login','register']]);
    // }


    public function register(Request $request){
        

        $validator = Validator::make($request ->all(), 
        [
            "name" => "required|string|min:2|max:100",
            "email" => "required|string|email|max:255|unique:users",
            "password" => "required|string|min:6|confirmed", 

        ]);

        if($validator ->fails()){

            return response()->json($validator->errors(), 400);
        }


        //Adding data in the columns of the User table using it's model
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if(!$user){

            return response()->json("Data Couldn't registered");
        }
        return response()->json("Data Registered in the DB sucessfully");

    }







    public function login(Request $request){

        $validator = Validator::make($request ->all(), 
        [
            "email" => "required|string|email|max:255",
            "password" => "required|string|min:6", 

        ]);

        $token = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        dd($token);

        if(!$token){

            return response()->json(['error' => 'Unauthorized'], 400);
        }

        return response()->json([
            'status' => "success",
            'message' => 'Successfully Logged In',
            'token' => $token,
            'token-type' => "Bearer"

        ],200);
    }

    public function logout()
    {
 
            // Try to invalidate the token even if it has expired
            Auth::logout();
            return response()->json(['message' => 'Successfully logged out'], 200);

    }

    public function profile(){



            // Try to invalidate the token even if it has expired
            return response()->json(['message' => 'Here are the profiles of users' , "User details: "=>Auth::user()
], 200);

        
    }

    public function refresh()   {
        try {
            $newToken = Auth::refresh();
            return response()->json(['token' => $newToken], 200);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not refresh token'], 400);
        }
    }
    


}
