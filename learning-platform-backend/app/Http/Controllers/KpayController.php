<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kpay;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KpayController extends Controller
{

    public function createPage(){
        $users = User::get();
        return view('admin.kpay.create',compact('users'));
    }
    public function create(Request $request){

        $this->validationCheck($request);
         $user = User::where('id',$request->kpayUserId)->first();
         $oldUserMoney = $user->money;

         $CurrentUserMoney =$oldUserMoney + $request->kpayNewMoney ;

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

        return redirect()->route('kpay#lists');


    }

    public function editPage($id){
        $kpay = Kpay::where('kpay_id',$id)->first(); //6 1
        // dd($kpay->toArray());
        $user = User::where('id',$kpay->user_id)->first();

        // dd($user->id); // 1
        return view('admin.kpay.edit',compact('user','kpay'));
    }
    public function edit(Request $request){
        // dd($request->toArray());
        $kpay =  Kpay::where('kpay_id',$request->kpayId)->first();
        $this->validationCheck($request);

         $oldUserMoney = $kpay->old_money; //10

         $CurrentUserMoney =$oldUserMoney + $request->kpayNewMoney ; //10+80

        File::delete(public_path().'/kpayImage/'.$kpay->image);
        $file = $request->file('kpayImage');
        $filename =  uniqid()."_".$file->getClientOriginalName();
        $file->move(public_path()."/kpayImage",$filename);



        $data = [

            "new_money" => $request->kpayNewMoney,
            "description" => $request->kpayDescription,
            "current_money" => $CurrentUserMoney ,
            'image'=>$filename,
            'updated_at'=>Carbon::now(),

        ];
        Kpay::where('kpay_id',$request->kpayId)->update($data);


        User::where ('id',$request->kpayUserId)->update([
            'money'=>$CurrentUserMoney
        ]);

        return redirect()->route('kpay#lists');
    }
    public function delete($id){

        $kpays= Kpay::get();
        $users= User::get();

        $kpay =  Kpay::where('kpay_id',$id)->first();

        // dd($kpay->toArray());
        $user = User::where('id',$kpay->user_id)->first();
        $updateMoney = $user->money - $kpay->new_money;
        User::where('id',$kpay->user_id)->update([
                'money'=>$updateMoney,
            ]);

        Kpay::where('kpay_id',$id)->delete();

        $kpays= Kpay::get();
        $users= User::get();
        return view('admin.kpay.lists',compact('kpays','users'));
    }
    public function search(Request $request){
         //user

         $userSearchId = User::orWhere('name',$request->searchKey)->first(); //null or id

        if($userSearchId != null){



            $kpays = Kpay::
                where('user_id',$userSearchId->id)
                ->get();
            ;
            

        }else{
            // dd('no');
            $kpays = Kpay::
            orWhere('user_id',$request->searchKey)->
            orWhere('kpay_id',$request->searchKey)->
            orWhere('description',$request->searchKey)


            ->get();
        }

        $users= User::get();
        // dd($request->toArray());
        return view("admin.kpay.lists",compact('users','kpays'));
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
// "kpayNewMoney" => "1000"
// "kpayDescription" => "Abc"
// "kpayImage" =>

