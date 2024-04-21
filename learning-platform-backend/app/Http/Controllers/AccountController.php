<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kpay;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
     public function accountLists($role =null){
        //  $url  = URL::current();
        // dd($url);
        if($role == 'user'){
            $users  = User::where('role','user')->paginate('7');
        }else{
            $users  = User::where('role','admin')->paginate('7');
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

        return redirect()->route('dashboard')->with([
            "message"=>"Account create successfullly"
        ]);
     }

     public function editPage($id){
        // dd($id);
        $user =User::where('id',$id)->first();
         $kpays = Kpay::where('user_id',$id)->get();
        // dd(count($kpays));
        // dd($kpays->toArray());
        return view('admin.profile.edit',compact('user','kpays'));
     }

     public function edit(Request $request){


        $oldAccocunt = User::where('id',$request->accountId)->first();
        $oldImgName = $oldAccocunt->image;



        if(File::exists(public_path().'/accountImage/'.$oldImgName)  ){

            File::delete(public_path().'/accountImage/'.$oldImgName);
        }

        if(  $request->accountImg != null && !empty($request->accountImg) ){
            $file = $request->file('accountImg');
            $fileName = uniqid()."_" .$file->getClientOriginalName();
            // dd($fileName);
            $file->move(public_path().'/accountImage',$fileName);


            $data = $this->getUpdateData($request,$fileName);

        }else{
            $data = $this->getUpdateData($request,NULL);
        }
        User::where('id',$request->accountId)->update($data);


        return redirect()->route('dashboard')->with([
            "message"=>"Account edit successfullly"
        ]);


     }
     public function changePasswordPage($id){
        // dd($id);
        $user = User::where('id',$id)->first();
        return view('admin.profile.changePassword',compact('user'));
     }
     public function changePassword(Request $request){
        // dd($request->toArray());
        $this->changePasswordValidation($request);
        $old = User::where('id',$request->accountId)->first();
        $oldHashPw = $old->password ;

        if(Hash::check($request->accountOldPassword, $oldHashPw)){
            $newHashPw = Hash::make($request->accountNewPassword);
            $data = [
                'password' =>$newHashPw
            ];
            User::where('id',$request->accountId)->update($data);
            return redirect()->route('dashboard')->with([
                "message"=>"Password change successfullly"
            ]);
        }else{
            return redirect()->route('account#changePasswordPage',$request->accountId)->with([
                "message"=>"Wrong Password"
            ]);
        }
     }
     public function delete($id){
        User::where('id',$id)->delete();
        return redirect()->route('dashboard')->with([
            "message"=>"Account delete successfullly"
        ]);
     }
     private function validationCheck($request){
        $validated = $request->validate([
            'accountName' => 'required',
            'accountEmail' => 'required|unique:users,email',
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
            'updated_at'=>Carbon::now(),
        ];
     }
     private function getUpdateData($request,$fileName){
        // dd($request->toArray() ,$fileName);
        return [
            "role"=>  $request->accountRole ,
            "gender"=>  $request->accountGender ,
            "name"=>  $request->accountName ,
            "email"=>  $request->accountEmail ,
            "phone"=>  $request->accountPhone,
            "money"=>  $request->accountMoney,
            "point"=>  $request->accountPoint,
            "address"=>  $request->accountAddress ,
            "image"=>  $fileName,
            'updated_at'=>Carbon::now(),
        ];
     }
     private function changePasswordValidation($request){
        return $request->validate([
            'accountOldPassword' => 'required',
            'accountNewPassword' => 'required',
            'accountConfirmPassword' => 'required|same:accountNewPassword',
        ]);
    }
}
