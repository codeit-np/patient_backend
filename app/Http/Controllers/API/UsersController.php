<?php

namespace App\Http\Controllers\API;

use Session;
use App\Models\Record\User;
use Illuminate\Http\Request;
// use Illuminate\Http\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Record\Hospital;

class UsersController extends Controller
{
    /**
     * Register
     */
    public function register(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $success = true;
            $message = 'User register successfully';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $success = true;
            $message = 'User login successfully';
            // Session::save();
        } else {
            $success = false;
            $message = 'Unauthorised';
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        
        return response()->json($response);
    }
    public function logout()
    {
        try {
            Session::flush();
            // Session::save();
            $success = true;
            $message = 'Successfully logged out';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }
    public function index()
    {
        $users = User::all()->toArray();
        return array_reverse($users);
    }

    // add user
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'min:7|max:13',
            'user_type' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
            ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_type' => $request->user_type,
            'hospital_id' => $request->hospital_id,
            'password' => Hash::make($request->password)
        ]);
        // dd($user);
        $user->save();

        return response()->json('The user successfully added');
    }

    // edit user
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    // update user
    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->update($request->all());

        return response()->json('The user successfully updated');
    }

    // delete user
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json('The user successfully deleted');
    }

    public function getHospital()
    {
        return Hospital::all();
    }
}