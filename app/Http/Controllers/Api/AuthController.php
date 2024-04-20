<?php

namespace App\Http\Controllers\Api;

// use Rules\Password;
use App\Models\User;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Spatie\FlareClient\Api;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ], [], [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ]);
        if ($validator->fails()) {
            return ApiResponse::success(422, 'register validation errors', $validator->messages()->all());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $data['token'] = $user->createToken('Apicource')->plainTextToken;
        $data['name'] = $user->name;
        $data['email'] = $user->email;

        return ApiResponse::success(201, 'User Created Successfully', $data);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required'],
        ], [], [
            'email' => 'Email',
            'password' => 'Password',
        ]);
        if ($validator->fails()) {
            return ApiResponse::success(422, 'Login Validation Errors', $validator->messages()->all());
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $data['token'] = $request->user()->createToken('Apicource-'.$user->name)->plainTextToken;
            $data['name']  = $user->name;
            $data['email'] = $user->email;
            return ApiResponse::success(200, 'User Loggin Successfully', $data);
        }


        return ApiResponse::success(422, 'Ooop email or password invalid', []);
    }


    public function  logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();


        return ApiResponse::success(200, 'Logged Out Successfully', []);
    }
}
