<?php

namespace App\Http\Controllers;

use App\Models\Kpay;
use App\Models\User;
use App\Models\Lesson;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function lessonCreate(Request $request){
        // dd($request->toArray());
        // 'courseId' => '1',
        // 'lessonName' => 'wq',
        // logger($request->toArray());

        $createData =[
                'name'=>$request->lessonName,
                'course_id'=>$request->courseId,
        ];

        Lesson::create($createData);

        $data = [
            "succes" => 'ok',
            'response' =>$request,
        ];
        return response()->json($data);
    }

    public function lessonDelete(Request $request){
        logger($request->toArray());

        Lesson::where('lesson_id',$request->id)->delete();
        return response()->json([
            "message"=>'ok'
        ]);
    }
    public function desc(Request $request){
        logger($request->toArray());

            if($request->op == 'desc'){
              $kpays =   Kpay::orderBy('updated_at','desc')->get();
            }else if($request->op == 'asc'){
                $kpays =   Kpay::orderBy('updated_at','asc')->get();

            }
            $users =User::get();




        return response()->json( [

            "kpays"=> $kpays,
            'users' =>$users,
        ] ,200);
    }
}
