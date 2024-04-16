
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
        <h1 > {{$user->name }} 's Details </h1>
    </div>
  </div>
    <br>
       <div class="row">
           <div class="col-5 ">
              @if ($user->image == NULL)
              <img src="{{asset('defaultImage/default.jpg')}}" width="500px" alt="">
              @else
              <img src="{{asset('accountImage/'.$user->image)}}" width="500px" alt="">
              @endif
           </div>
           <div class="col-5 offset-1  ">
            <form class="p-2">

                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" value="{{$user->name}}" disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" value="{{$user->email}}" disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Role</label>
                  <input type="text" value="{{$user->role}}" disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Phone</label>
                  <input type="text" value="{{$user->phone}}" disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  {{-- <input type="email" value="{{$user->address}}" disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> --}}
                    <textarea disabled  cols="5" rows="3" class="form-control">{{$user->address}} </textarea>
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Gender</label>
                  <input type="email" value="{{$user->gender}}" disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    {{-- <select name="" class="form-control"  id="">


                            @if ($user->gender == "female")
                                <option value="">Female</option>
                            @else
                            <option value="">Male</option>

                            @endif
                    </select> --}}
                </div>

                @if ($user->role == 'user')

                <div class="form-group">
                    <label for="exampleInputEmail1">Money</label>
                    <input type="email" value="{{$user->money}}" disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Point</label>
                    <input type="email" value="{{$user->point}}" disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>

                @endif


                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
           </div>
       </div>
   </div>
@endsection
{{--  --}}
