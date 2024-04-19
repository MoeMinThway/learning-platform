<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    //

    public function lists($category_id = null){

        $categories =Category::get();

        if($category_id != null){
            $courses = Course::where("category_id",$category_id)-> get();






        }else if($category_id == null){
            $courses = Course::get();




        }


        return view('admin.course.list',compact('categories','courses'));
    }
    public function createPage(){
        $categories = Category::get();
        return view('admin.course.create',compact('categories'));
    }
    public function create(Request $request){
        // dd($request->toArray());
        $this->validationCheckCourse($request);

        if($request->courseImage != null && !empty($request->courseImage)){
            // dd(' image');
            $file = $request->file('courseImage');
            $filename = uniqid()."_".$file->getClientOriginalName(); // "website-shopping-cart-page.png
            // dd($filename);
                $file->move(public_path()."/courseImage",$filename);
            $data = $this->createCourse($request,$filename);
        }else{
            // dd('no image');
            $data = $this->createCourse($request,NULL);
        }
        Course::create($data);

        return redirect()->route('course#lists')->with([
            "message"=>"Course create success"
        ]);

    }

    public function editPage($id){
        $lessons = Lesson::where('course_id',$id)->get();
        $course  =Course :: where('course_id',$id)->first();
        $categories =Category::get();

        return view('admin.course.edit',compact('course','categories','lessons'));
    }
    public function update(Request $request){
        // dd($request->toArray());
        $oldData = Course::where('course_id',$request->courseId)->first();
        // dd($oldData->toArray());
       $check =  $this->oldDataIsSameAsNew($oldData,$request);
        // dd($check);
        if(!$check || !empty($request->courseImage)  ){
            if(!empty($oldData->image) && File::exists(public_path().'/courseImage/'.$oldData->image)){

                File::delete(public_path().'/courseImage/'.$oldData->image);

            }
            // $this->$val idationCheckCourse($request);
            $this->validationCheckCourse($request);

            if(!empty($request->courseImage)  && $request->courseImage != null){
                $file = $request->file('courseImage');
                $filename = uniqid()."_".$file->getClientOriginalName();
                $file->move(public_path()."/courseImage",$filename);
                $data = $this->createCourse($request,$filename);

            }else{

                $data = $this->createCourse($request,NULL);
            }

            Course::where('course_id',$request->courseId)->update($data);
            return redirect()->route('course#lists')->with([
                "message"=>"Course Update success"
            ]);

        }else{
            return back();
        }


    }

    private function validationCheckCourse($request){
        $request->validate([
            "courseTitle" => "required",
              "coursePrice" => "required",
              "coursePoint" => "required",
              "courseTime" => "required",
              "courseDay" => "required",
              "courseCategoryId" => "required",
              "courseImage" =>'mimes:jpg,png,jpeg'

        ]);
    }
    private function createCourse($request,$filename){
        return [
            "title" => $request->courseTitle,
            "price" => $request->coursePrice,
            "point" => $request->coursePoint,
            "time" => $request->courseTime,
            "day" => $request->courseDay,
            "category_id" => $request->courseCategoryId,
            'description'=>$request->courseDescription,
            "image" => $filename,
            'updated_at' =>Carbon::now(),
        ];
    }
    private function oldDataIsSameAsNew($oldData,$request){
        $checkTitle =    $oldData->title == $request->courseTitle ? true : false ;
     $checkPrice=    $oldData->price == $request->coursePrice ? true : false ;
    $checkPoint =      $oldData->point == $request->coursePoint ? true : false ;
    $checkDescription =     $oldData->description == $request->courseDescription ? true : false ;
    $checkTime =     $oldData->time == $request->courseTime ? true : false ;
     $checkDay  =  $oldData->day == $request->courseDay ? true : false ;
      $checkCategory =   $oldData->category_id == $request->courseCategoryId ? true : false ;
      $checkImge =   $oldData->image == $request->courseImage ? true : false ;

      if($checkTitle  && $checkPrice && $checkPoint && $checkDescription && $checkTime && $checkDay && $checkCategory){
        return true;
      }else{
        return false;
      }

    }
}


//courseId
// "courseTitle" => "az"
//   "coursePrice" => "15000"
//   "coursePoint" => "30"
//   "courseDescription" => "123123"
//   "courseTime" => "8 to 10"
//   "courseDay" => "free"
//   "courseCategoryId" => "2"
//   "courseImage" =>

