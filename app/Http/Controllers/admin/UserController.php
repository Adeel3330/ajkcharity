<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function userindex(){
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }
}
