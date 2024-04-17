<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //

    public function lists($category_id = null){
        $categories =Category::get();
        if($category_id != null){
            $courses = Course::orWhere("category_id",$category_id)-> get();

        }else{
            $courses = Course:: get();

        }

        return view('admin.course.list',compact('categories','courses'));
    }
    public function createPage(){
        $categories = Category::get();
        return view('admin.course.create',compact('categories'));
    }
    public function create(Request $request){
        dd($request->toArray());
    }
}
// "courseTitle" => "title"
//   "coursePrice" => "12300"
//   "coursePoint" => "10"
//   "courseTime" => "5 to 7"
//   "courseDay" => "Weekday"
//   "courseCategoryId" => "3"
//   "courseImage" =>

