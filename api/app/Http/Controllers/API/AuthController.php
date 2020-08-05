<?php


namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ResponseController as ResponseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

class AuthController
{
    //create user
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|',
            'email' => 'required|string|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $input = $request->all();
        /*$input['password'] = bcrypt($input['password']);
        $user = User::create($input);*/echo bcrypt($request->password);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        print_r(json_encode($user));
        $user->save();
        if($user){
            $success['token'] =  $user->createToken('token')->accessToken;
            $success['message'] = "Registration successfull..";
            return $this->sendResponse($success);
        }
        else{
            $error = "Sorry! Registration is not successfull.";
            return $this->sendError($error, 401);
        }

    }

    //login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)){
            $error = "Unauthorized";
            return $this->sendError($error, 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('token');
        $token = $tokenResult->accessToken;
        $success['user'] = $user;
        $success['access_token'] =  $token;
        $sender = new ResponseController;
        return $sender->sendResponse($success);
    }

    public function token_login(Request $request){

    }

    //logout
    public function logout(Request $request)
    {

        $isUser = $request->user()->token()->revoke();
        $sender = new ResponseController;
        if($isUser){
            $success['message'] = "Successfully logged out.";
            return $sender->sendResponse($success);
        }
        else{
            $error = "Something went wrong.";
            return $sender->sendResponse($error);
        }


    }

    //getuser
    public function getUser(Request $request)
    {
        //$id = $request->user()->id;
        $user = Auth::user();
        $sender = new ResponseController;

        if($user){
            $tokenResult = $user->createToken('token');
            $token = $tokenResult->accessToken;
            $success['user'] = $user;
            $success['access_token'] =  $token;
            return $sender->sendResponse($success);
        }
        else{
            $error = "user not found";
            return $sender->sendResponse($error);
        }
    }
}