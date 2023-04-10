<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */


    public function index()
    {
        if (!Auth::user()) { // Check is user logged in
            return view('auth.login');
        } else {
            return Redirect('/');
        }

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        if (!Auth::user()) { // Check is user logged in
            return view('auth.registration');
        } else {
            return Redirect('/');
        }

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                ->withSuccess('You have Successfully loggedin');
        }


        return redirect('login')->withErrors(' Error Email/Password Invalid!');


    }

    public function ApipostLogin(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => "user ini tidak terdaftar"], 400);
        }


        $accessToken = auth()->user()->createToken('AuthToken')->plainTextToken;
        return response(["user" => auth()->user(), "access_token" => $accessToken]);
    }

    public function ApiLogOut(Request $request)
    {

        // Revoke the token that was used to authenticate the current request...
        $token = $request->user()->currentAccessToken()->delete();

        return response(["user" => auth()->user(), "access_token" => $token]);


    }

    public function getAllUser()
    {
        return response()->json([
            'message' => 'success',
            'data' => User::all()
        ], 200);
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("/")->withSuccess('Great! You have Successfully Register');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }



    public function profile()
    {

        return view('profile.profile');
    }

    public function profile_update()
    {

        return view('auth.registration');
    }


}