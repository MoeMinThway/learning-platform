<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function lists(){
        $categories = Category::get();
        // dd($categories->toArray());
        return view('admin.category.index',compact('categories'));
    }
    public function create(Request $request){
        $request->validate([
            "categoryName" =>'required'
        ]);
        $data = [
            "name" =>$request->categoryName
        ];
        Category::create($data);
        return redirect()->route('category#lists')->with([
            "message"=>"Category create successfully"
        ]);


    }
    public function delete($id){
        Category::where('category_id',$id)->delete();
        return redirect()->route('category#lists')->with([
            "message"=>"Category delete successfully"
        ]);

    }
    public function editPage($id){
        $category =Category::where('category_id',$id)->first();
        $categories = Category::get();

        return view('admin.category.edit',compact('category','categories'));
    }
    public function update(Request $request){

        $old =  Category::where('category_id',$request->categoryId)->first();
        if($old->name != $request->categoryName){
            $data =[
                'name'=>$request->categoryName
            ];
            Category::where('category_id',$request->categoryId)->update($data);
            return redirect()->route('category#lists')->with([
                "message"=>"Category Update successfully"
            ]);
        }else{
            return redirect()->route('category#editPage',$request->categoryId)->with([
                "message"=>"Category old vale is same as new value !!!"
            ]);
        }



    }
}
