
@extends('admin.layouts.app')

@section('content')
   <div class="col">
  <div class="row mt-3">
    <div class="col">
        <a href="#" onclick="history.back()">
            <button  class="btn bg-danger">Back</button>
        </a>
    </div>
    <div class="col">
        <h1 > Edit <span class="text-danger"> {{$course->title}} </span>   </h1>
    </div>
  </div>
    <br>
    <form class="p-2" action="{{route('course#update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{$course->course_id}}" name="courseId" id="courseId">
       <div class="row">

           <div class="col-5 ">
               {{-- <img src="{{asset('logo/img-removebg-preview.png')}}" width="430px" style="margin-left: 70px" alt=""> <br> --}}
               @if ($course->image == NULL)
               <img src="{{asset('logo/img-removebg-preview.png')}}" width="430px"  style="margin-left: 70px" alt="">
               @else
               <img src="{{asset('courseImage/'.$course->image)}}" width="430px"  style="margin-left: 70px" alt="">
               @endif


               <label ">Image</label>

               <input type="file" class="form-control mb-2" name="courseImage" id="">
               <div class="d-flex my-4">

                <input placeholder="Lessons" type="text" id="lesson" class="form-control lesson">
                <button id="addBtn"  class="btn btn-dark text-white">Add</button>
               </div>




                <table class="table table-hover">

                    @foreach ($lessons as $l)
                        <tr class="">
                            <input type="hidden"  id="deleteLessonId" value="{{$l->lesson_id}}">
                            <td>{{$l->name}}</td>
                            <td>
                                <button class="deleteLessonBtn btn btn-success bg-danger" id="deleteLessonBtn">
                                   delete
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </table>

           </div>
           <div class="col-5 offset-1  ">


                <div class="form-group">
                  <label ">Title</label>
                  <input type="text" name="courseTitle" value="{{old('courseTitle',$course->title)}}"   class="form-control"  aria-describedby="emailHelp" placeholder="Enter title">
                            @error('courseTitle')
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                             {{$message}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            @enderror
                </div>


                <div class="form-group">
                  <label ">Price</label>
                  <input type="number" name="coursePrice" value="{{old('coursePrice',$course->price)}}"  class="form-control"  aria-describedby="emailHelp" placeholder="Enter price">
                  @error('coursePrice')
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   {{$message}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                    <label >Point</label>
                    <input type="number"  name="coursePoint" value="{{old('coursePoint',$course->point)}}" class="form-control"  aria-describedby="emailHelp" placeholder="Enter point">
                  </div>
                  @error('coursePoint')
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   {{$message}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @enderror
                <div class="form-group">
                    <label >Description</label>
                    {{-- <input type="text"  name="courseDescription" class="form-control"  aria-describedby="emailHelp" placeholder="Enter point"> --}}
                    <textarea name="courseDescription"  class="form-control" id="" cols="4" rows="3" placeholder="Enter Description">{{old('courseDescription',$course->description)}}</textarea>
                </div>
                  @error('courseDescription')
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   {{$message}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @enderror



                <div class="form-group">
                  <label ">Time</label>
                <select name="courseTime" class="form-control">

                    <option value="">Choose Time</option>

                  @if ($course->time == "2 to 4")
                            <option value="2 to 4" selected>2 to 4</option>
                            <option value="5 to 7">5 to 7</option>
                            <option value="8 to 10">8 to 10</option>
                            <option value="free">Free to study</option>
                @elseif ($course->time == "5 to 7")
                        <option value="2 to 4" >2 to 4</option>
                        <option value="5 to 7" selected>5 to 7</option>
                        <option value="8 to 10">8 to 10</option>
                        <option value="free">Free to study</option>
                @elseif ($course->time == "8 to 10")
                    <option value="2 to 4" >2 to 4</option>
                    <option value="5 to 7">5 to 7</option>
                    <option value="8 to 10" selected>8 to 10</option>
                    <option value="free">Free to study</option>
                @elseif ($course->time == "free")
                        <option value="2 to 4" >2 to 4</option>
                        <option value="5 to 7">5 to 7</option>
                        <option value="8 to 10">8 to 10</option>
                        <option value="free" selected>Free to study</option>
                  @endif



                </select>
                @error('courseTime')
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 {{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @enderror
                </div>

                <div class="form-group">
                  <label ">Day</label>
                <select name="courseDay" class="form-control">

                    <option value="">Choose Day</option>



                    @if ($course->day == "Weekday")
                            <option value="Weekday" selected>Weekday</option>
                            <option value="Weekend">Weekend</option>
                            <option value="free">Free to study</option>
                    @elseif ($course->day == "Weekend")

                    <option value="Weekday">Weekday</option>
                    <option value="Weekend" selected>Weekend</option>
                    <option value="free">Free to study</option>
                    @elseif ($course->day == "free")
                    <option value="Weekday">Weekday</option>
                    <option value="Weekend">Weekend</option>
                    <option value="free" selected>Free to study</option>



                    @endif
                </select>

                @error('courseDay')
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 {{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @enderror
                </div>






                  <div class="form-group">
                    <label ">Category</label>
                    <select class="form-control" name="courseCategoryId" id="">
                        <option value="">Choose Category</option>
                        @foreach ($categories as $c)
                            @if ($course->category_id == $c->category_id)
                            <option value="{{$c->category_id}}" selected>{{$c->name}} </option>
                            @else
                            <option value="{{$c->category_id}}">{{$c->name}} </option>


                            @endif

                        @endforeach
                    </select>
                    @error('courseCategoryId')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     {{$message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @enderror
                  </div>




<br>







                <button type="submit" class="btn btn-primary py-2 px-5  ">Update</button>

           </div>
       </div>
   </div>
</form>



@endsection

@section('scriptSection')

    <script>

        $(document).ready(function(){


            $('#addBtn').click(function(){
                $lessonName = $('.lesson').val();
                $courseId = $('#courseId').val();
                    console.log( $lessonName + "    " + $courseId );


                $data ={
                    "courseId" : $courseId,
                    "lessonName" : $lessonName,
                };
                console.log("stat");

                $.ajax ({

                type: 'get',
                url :  '/course/ajax/lesson/create',
                data :  $data,
                dataType: 'json',
                success : function(respnse){
                    console.log(respnse);
                    // if(respnse.status== 'success'){
                    //     window.location.href= "/user/homePage";
                    // }
                }


            })
        });
            $('#deleteLessonBtn').click(function(){
                $id = $('#deleteLessonId').val();
                alert('ok')
                $data ={
                    "id" : $id,
                };


                $.ajax ({

                type: 'get',
                url :  '/course/ajax/lesson/delete',
                data :  $data,
                dataType: 'json',
                success : function(respnse){
                    console.log(respnse);

                }


            })
        });





    })
    </script>


@endsection

{{--  --}}
