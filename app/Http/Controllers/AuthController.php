<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view("auth.home");
    }


    public function login_view()
    {
        return view('auth.login');
    }


    public function login(LoginRequest $request)
    {
        $user_data = $request->only(['email', 'password']);

        if (Auth::attempt($user_data)) {
            if(auth()->user()->role == 1){
                return redirect()->route('admin_home');
            }elseif (\auth()->user()->role == 0){
                if (\auth()->user()->registerStatus == 0){
                    return redirect()->route('logout');
                }elseif (\auth()->user()->registerStatus == 1) {
                    return redirect()->route('home');
                }
            }
        }else {
            return redirect()->back()->withErrors(['validation' => 'We need to know your email address and password!']);
        }
    }

    public function register_view()
    {
        return view("auth.register");
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        $check = $this->create_user($data);
        if ($check) {
            $user_data = $request->only(['email', 'password']);
            if (Auth::attempt($user_data)) {
                return redirect()->route('login-view');
            }
            return redirect()->route('home');
        }
    }

    public function create_user(array $data)
    {

        return User::query()->create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email'   => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('dashboard');
    }

    public function home()
    {
        return view('welcome');
    }
//    public function RegisterTru(Request  $request){
//
//        User::create([
//            'name'=> $request->name,
//            'surname' => $request['surname'],
//            'email'   => $request['email'],
//            'password' => Hash::make($request['password'])
//        ]);
//
//        return response()->json([
//           'status' => true,
//           'message' => 'Hello' ,
//            'data' => $request->all()
//        ],200);
//    }
}
