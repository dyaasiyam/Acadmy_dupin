<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(Request $request)  {
        $request->validate([
            'email'=> 'required',
            'password'=> 'required',
        ]);
        $user=User::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $token = $user->createToken('login');

                return ['token' => $token->plainTextToken];

            }else{
                return response(['error'=>["password is incorrect"]],401);

            }
        }else{
            return response(['message'=>"Isnvalid credintials"],401);
        }
    }
}
