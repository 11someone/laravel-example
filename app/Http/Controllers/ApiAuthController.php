<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends BaseApiController
{
    public function login(Request $request){
        $body = $request->json();
        $credentials = ['email' => $body->get('email'),'password' => $body->get('password')];
        if(Auth::attempt($credentials)){
            $user =  Auth::getUser();
            return $this->sendResponse(['token' => $user->createToken('browser')->plainTextToken],'Success');
        }
        return $this->sendError('Error',['message'=>'credenciales invalidas']);

    }

    public function register(Request $request){
        $validateData = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users',
           'password' => 'required|string|min:8'
        ]);
        if($validateData->fails()){
            return $this->sendError('Validation Error.', $validateData->errors());
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User register successfully.');

    }

    public function pruebaApi(Request $request){
        $user = $request->user();
       return new JsonResponse(["name" => $user->name])  ;
    }


}
