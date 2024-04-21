<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kpay;
use App\Models\User;
use Illuminate\Http\Request;

class KpayController extends Controller
{

    public function createPage(){
        $users = User::get();
        return view('admin.kpay.create',compact('users'));
    }
    public function create(Request $request){
        // dd($request->toArray());
        $this->validationCheck($request);
         $user = User::where('id',$request->kpayUserId)->first();
         $oldUserMoney = $user->money;
        //  dd($oldUserMoney);

         $CurrentUserMoney =$oldUserMoney + $request->kpayNewMoney ;
        //  dd($CurrentUserMoney);
        $file = $request->file('kpayImage');
        $filename =  uniqid()."_".$file->getClientOriginalName();
        $file->move(public_path()."/kpayImage",$filename);


        // dd($filename);

        $data = [
            'user_id'=>$request->kpayUserId,
            "new_money" => $request-> kpayNewMoney,
            "description" => $request->kpayDescription,
            "old_money" =>$oldUserMoney,
            "current_money" => $CurrentUserMoney ,
            'image'=>$filename,
            'updated_at'=>Carbon::now(),

        ];
        Kpay::create($data);


        User::where ('id',$request->kpayUserId)->update([
            'money'=>$CurrentUserMoney
        ]);
        dd('success');
        return redirect()->route('kpay#lists');


    }

    public function lists(){
        $kpays = Kpay::get();
        $users= User::get();

        return view('admin.kpay.lists',compact('kpays','users'));

    }
    private function validationCheck($request){
        $request->validate([
            'kpayImage'=>'required|mimes:jpg,png,jpeg,svg',
            'kpayUserId'=>'required',
            'kpayNewMoney'=>'required',
        ]);
    }

}

// "kpayUserId" => "1"
//   "kpayNewMoney" => "100"
//   "courseDescription" => "Pocket"
//   "kpayImage" =>

