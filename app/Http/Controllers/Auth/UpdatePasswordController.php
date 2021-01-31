<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdate;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;


class UpdatePasswordController extends Controller
{
    public function changePassword(PasswordUpdate $request) {

        $user = \Auth::user();

        $password = $request->only([
            'current_password', 'new_password', 'new_password_confirmation'
        ]);

//        $validator = \Validator::make($password, [
//            'current_password' => 'required|current_password_match',
//            'new_password'     => 'required|min:6|confirmed',
//        ]);
//
//        if ( $validator->fails() )
//            return back()
//                ->withErrors($validator)
//                ->withInput();


        $updated = $user->update([ 'password' => bcrypt($password['new_password']) ]);

        if($updated)
            return redirect()->route('account')->with('success', 'пароль изменен');

        return redirect()->route('account')->with('error', 'пароль не изменен');
    }
}
