<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\User;
use App\Models\UserDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request) 
    {
        if (isset($request->search)) {
            $users = UserDetail::with(['user'])
                ->where('firstname', 'like', "%".$request->search."%")
                ->orWhere('middlename', 'like', "%".$request->search."%")
                ->orWhere('lastname', 'like', "%".$request->search."%")
                ->get();
        } else {
            $users = UserDetail::with('user')->get();
        }
        if (isset($request->category)) {
            $users = $users->filter(function($user) use ($request) {
                return $user->user->category == $request->category;
            });
        }
        // return view('admin.userpage', ['users' => $users]);
        return view('develop.userpage', ['users' => $users]);
    }

    public function create() 
    {
        return view('admin.user-add');
    }
}
