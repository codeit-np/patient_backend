<?php

namespace App\Http\Controllers\Records;

use App\Http\Controllers\Controller;

use App\Models\Record\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Record\Hospital;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $data = User::orderBy('updated_at','DESC')->get();
        return view('users.index')->with('users',$data);
    }

    public function edit($id)
    { 
        if (auth()->user()->user_type == 0 || auth()->user()->user_type == 1) {
            return redirect(route('users.index'))->with(['error' => __('You are not allowed to change data for a user.')]);
        }       
        return view('users.edit')->with(['user'=>User::where('id',$id)->first(),'hospitals'=>Hospital::get()]);
    }

    public function update(UserRequest $request)
    {
        if (auth()->user()->user_type == 0 || auth()->user()->user_type == 1) {
            return redirect(route('users.index'))->with(['error' => __('You are not allowed to change data for a user.')]);
        }

        $input = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'user_type' => $request->input('user_type'),
            'phone' => $request->input('phone'),
            'hospital_id' => $request->input('hospital_id'),
            ];

        if ($request->input('password') !=null):
        $request->validate([
            'password' => 'min:6|confirmed',
            'password_confirmation' => 'min:6',
            ]);    
        $password = ['password' =>Hash::make($request->input('password'))];
        $data = array_merge($input, $password);
        else:
        $data = $input;
        endif;
        $id = $request->input('id');
        User::where('id',$id)->update($data);
        return redirect(route('users.index'))->with('status',__('User successfully updated.'));
    }

}