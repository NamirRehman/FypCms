<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
class AdminController extends Controller
{
    public function show(){
        $admin = Admin::with('User')->get();
        return view('UserComponent.AdminComponent.admin-list',compact('admin'));
    }

    public function add_admin(){
        $user = User::all();
        return view('UserComponent.AdminComponent.add-admin',compact('user'));
    }

    public function store_admin(Request $request){

        $admin = new Admin();
        $admin->special_key = $request->post('special_key');
        $admin->user_id = $request->post('user_id');
        $admin->save();
        return redirect()->route('admin-list');
    }
}
