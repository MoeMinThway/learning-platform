
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
        <h1 > Create New Course </h1>
    </div>
  </div>
    <br>
    <form class="p-2" action="{{route('course#create')}}" method="POST" enctype="multipart/form-data">
        @csrf
       <div class="row">

           <div class="col-5 ">
               <img src="{{asset('logo/img-removebg-preview.png')}}" width="430px" style="margin-left: 70px" alt=""> <br>
               <label ">Image</label>

               <input type="file" class="form-control mb-2" name="courseImage" id="">



           </div>
           <div class="col-5 offset-1  ">


                <div class="form-group">
                  <label ">Title</label>
                  <input type="text" name="courseTitle"   class="form-control"  aria-describedby="emailHelp" placeholder="Enter title">
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
                  <input type="number" name="coursePrice"  class="form-control"  aria-describedby="emailHelp" placeholder="Enter price">
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
                    <input type="number"  name="coursePoint" class="form-control"  aria-describedby="emailHelp" placeholder="Enter point">
                  </div>




                <div class="form-group">
                  <label ">Time</label>
                <select name="courseTime" class="form-control">

                    <option value="">Choose Time</option>
                    <option value="2 to 4">2 to 4</option>
                    <option value="5 to 7">5 to 7</option>
                    <option value="8 to 10">8 to 10</option>
                    <option value="free">Free to study</option>
                </select>

                </div>

                <div class="form-group">
                  <label ">Day</label>
                <select name="courseDay" class="form-control">

                    <option value="">Choose Day</option>
                    <option value="Weekday">Weekday</option>
                    <option value="Weekend">Weekend</option>
                    <option value="free">Free to study</option>
                </select>

                </div>






                  <div class="form-group">
                    <label ">Category</label>
                    <select class="form-control" name="courseCategoryId" id="">
                        <option value="">Choose Category</option>
                        @foreach ($categories as $c)
                            <option value="{{$c->category_id}}">{{$c->name}} </option>
                        @endforeach
                    </select>
                  </div>




<br>







                <button type="submit" class="btn btn-primary py-2 px-5  ">Create</button>

           </div>
       </div>
   </div>
</form>
@endsection
{{--  --}}
