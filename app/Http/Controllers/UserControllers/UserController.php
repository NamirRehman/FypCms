<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function add_user(){

        return view('UserComponent.add-user');
    }

    public function store_user(Request $request){

        $user = new User();
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->password = Hash::make($request->post('password'));

        $user->save();
        return view('Dashboard');
    }
}
