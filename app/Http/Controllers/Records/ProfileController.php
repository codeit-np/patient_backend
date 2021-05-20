<?php

namespace App\Http\Controllers\Records;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\Hash;
use App\Models\Record\Hospital;
use App\Models\Record\User;

class ProfileController extends Controller
{

    public function add()
    {
        return view('profile.add')->with('hospitals',Hospital::get());
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * store the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        if (auth()->user()->user_type == 0) {
            return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
        }
        
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        User::create($input);
        return redirect(route('users.index'))->with('status',__('New profile successfully added.'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        // if (auth()->user()->id == 1) {
        //     return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
        // }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            ]);
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        // if (auth()->user()->id == 1) {
        //     return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        // }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}