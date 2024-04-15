<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
     public function accountLists($role =null){
        // dd($role);
        if($role == 'user'){
            $users  = User::where('role','user')->get();
        }else{
            $users  = User::where('role','admin')->get();
        }

        // dd($users->toArray());
        return view('admin.profile.index',compact('users'));
     }
     public function accountDetails($id){
        // dd($id);
        $user  = User::where('id',$id)->first();
        return view('admin.profile.details',compact('user'));
     }
     public function createPage(){
        return view('admin.profile.create');
     }
     public function create(Request $request){
        // dd($request->toArray());
        $this->validationCheck($request);

        return redirect()->route('account#createPage');
     }
     private function validationCheck($request){
        $validated = $request->validate([
            'accountName' => 'required',
            'accountEmail' => 'required',
            'accountPassword' => 'required',
        ]);
        return $validated;
     }
}
