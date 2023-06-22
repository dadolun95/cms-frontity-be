<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Validator;
use App\Models\User;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api
 */
class AuthController extends BaseController
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function signin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('LaravelAuthApp')->plainTextToken;
            $success['name'] =  $authUser->name;

            return $this->sendResponse($success, 'User signed in');
        } else {
            return $this->sendResponse(false, 'Unauthorised');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function checkStatus(Request $request) {
        if (auth()->check()){
            return $this->sendResponse(['success' => true, 'loggedIn' => true], 'User loggedIn');
        }
        return $this->sendResponse(['success' => true, 'loggedIn' => false], 'User LoggedOut');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function signout(Request $request)
    {
        if (auth()->check()) {
            auth()->user()->tokens()->delete();
            return $this->sendResponse(['success' => true], 'User logged out successfully.');
        }
        return $this->sendResponse(['success' => false], 'UnAuthenticated');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function signup(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Error validation', $validator->errors());
            }

            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $success['token'] = $user->createToken('LaravelAuthApp')->plainTextToken;
            $success['name'] = $user->name;

        } catch (\Exception $e) {
            return $this->sendError('RegistrationError', ['error' => 'An error occurred creating the new user']);
        }

        return $this->sendResponse($success, 'User created successfully.');
    }

}
