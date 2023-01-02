<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'User List';
        $data['users'] = User::where(['role_id' => 2, 'status' => 'active'])->get();
        $data['usercount'] = User::count();

        return view('user', $data);
    }
    public function inactive()
    {
        $data['title'] = 'User Inactive';
        $data['users'] = User::where(['role_id' => 2, 'status' => 'inactive'])->get();
        $data['usercount'] = User::count();

        return view('users.inactive-user', $data);
    }

    public function active($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();

        return redirect('users')->with('status', 'User active.');
    }

    public function inactived($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'inactive';
        $user->save();

        return redirect('users-inactive')->with('status', 'User not active.');
    }

    public function destroy(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete($request->all());
        return redirect('users')->with('status', 'User deleted successfully.');
    }

    public function profile()
    {

        return view('profile');
    }
}
