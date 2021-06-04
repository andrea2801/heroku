<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{

     /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        if(Auth::attempt(['dni' => $request->dni, 'password' => $request->password])){

            $user = Auth::user();
            $success['token'] =  $user->createToken('DeltaSAD')->accessToken;
            $success['user'] =  $user->dni;

            return $this->sendResponse($success, 'User login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

}
