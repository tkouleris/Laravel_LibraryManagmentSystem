<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class UserController extends Controller
{
    use AuthenticatesUsers;

    public function password_change(Request $request)
    {
        $old_password = $request['old_password'];
        $new_password = $request['new_password'];
        $vld_new_password = $request['vld_new_password'];

        if( $new_password !== $vld_new_password ) return "1";
        $user = auth()->user();
        if (!Hash::check($old_password, $user->password)) return "2";

        $user->password = bcrypt($new_password);
        $user->save();

        Auth::logout();

        return $user;
    }
}
