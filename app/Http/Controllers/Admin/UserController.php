<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function userIndex()
    {
        $users = User::all();
        return view('admin.user.userIndex', compact('users'));
    }

    public function userEdit($user_id)
    {
        $user = User::find($user_id);
        return view('admin.user.userEdit', compact('user'));
    }

    public function userUpdate(Request $request, $user_id)
    {
        $user = User::find($user_id);

        $user->role_as = $request->role_as;
        $user->update();

        return redirect('admin/user')->with('message', 'User Role Updated');
    }
}
