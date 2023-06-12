<?php

namespace App\Http\Controllers\RoleController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RoleController extends Controller
{
    public function add_role(){
        $user = User::all();
        return view('RoleComponent.assign-role',compact('user'));
    }

    public function store_role(Request $request){

        $user = User::where('id',$request->post('name'))->where('email',$request->post('email'))->first();
        if($user){
        
            if($request->post('role')=='admin'){
                $user->assignRole('admin');
            }elseif($request->post('role')=='teacher'){
                $user->assignRole('teacher');
            }
        }else{
            return view('dashboard');
        }
        return view('dashboard');
    }
}
