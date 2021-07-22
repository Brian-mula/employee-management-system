<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    //
    public function change_password(Request $request,User $user)
    {
        $request->validate([
            'password'=>['required'],
            'password_confirmation'=>['required','same:password']
        ]);
        $user->update([
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->route('users.index')->with('message','User password updated successfully');
    }
}