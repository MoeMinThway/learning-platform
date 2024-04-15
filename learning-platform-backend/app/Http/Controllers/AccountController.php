<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
     public function accountLists($role =null){
        //  $url  = URL::current();
        // dd($url);
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

        // $this->validationCheck($request);
        if(  $request->accountImg != null && !empty($request->accountImg) ){
            $file = $request->file('accountImg');
            $fileName = uniqid()."_" .$file->getClientOriginalName();
            // dd($fileName);
            $file->move(public_path().'/accountImage',$fileName);


            $data = $this->getCreateData($request,$fileName);

        }else{
            $data = $this->getCreateData($request,NULL);
        }
        User::create($data);

        return redirect()->route('account#createPage');
     }

     public function editPage($id){
        dd($id);
     }
     private function validationCheck($request){
        $validated = $request->validate([
            'accountName' => 'required',
            'accountEmail' => 'required',
            'accountPassword' => 'required',

            'accountImg' => "mimes:png,jpg,jpeg",
        ]);
        return $validated;
     }
     private function getCreateData($request,$fileName){
        // dd($request->toArray() ,$fileName);
        return [
            "role"=>  $request->accountRole ,
            "gender"=>  $request->accountGender ,
            "name"=>  $request->accountName ,
            "email"=>  $request->accountEmail ,
            "phone"=>  $request->accountPhone,
            "money"=>  $request->accountMoney,
            "point"=>  $request->accountPoint,
            "password"=>Hash::make($request->accountPassword)  ,
            "address"=>  $request->accountAddress ,
            "image"=>  $fileName,
        ];
     }
}
