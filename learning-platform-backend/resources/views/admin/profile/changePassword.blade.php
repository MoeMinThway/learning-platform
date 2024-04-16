
@extends('admin.layouts.app')

@section('content')
   <div class="col">
  <div class="row mt-3">
    <div class="col-1">
        <a href="#" onclick="history.back()">
            <button  class="btn bg-danger">Back</button>
        </a>

    </div>
<div class="col-5">
    @if (Session::has("message"))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{Session::get('message')}}

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif
</div>

    <div class="col">
        <h1 > Change Password <span class="text-danger"> {{$user->name}}</span>  </h1>
    </div>
  </div>
    <br>
    <form class="p-2" action="{{route('account#changePassword')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="accountId" value="{{$user->id}}">
       <div class="row">

           <div class="col-5 ">
               {{-- <img src="{{asset('logo/img-removebg-preview.png')}}" width="450px" alt=""> --}}
               @if ($user->image == NULL)
               <img src="{{asset('defaultImage/default.jpg')}}" width="450px" alt="">
               @else
               <img src="{{asset('accountImage/'.$user->image)}}" width="450px" alt="">
               @endif






           </div>
           <div class="col-5 offset-1  ">



                <div class="form-group">
                    <label ">Current Password</label>
                    <input type="text" name="accountOldPassword" value="{{old('accountOldPassword')}}" class="form-control"  aria-describedby="emailHelp" placeholder="Enter current password">
                    @error('accountOldPassword')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     {{$message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label ">New Password</label>
                    <input type="password" name="accountNewPassword" value="{{old('accountNewPassword')}}" class="form-control"  aria-describedby="emailHelp" placeholder="Enter new password">
                    @error('accountNewPassword')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     {{$message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label ">Confirm Password</label>
                    <input type="password" name="accountConfirmPassword" value="{{old('accountComfirmPassword')}}" class="form-control"  aria-describedby="emailHelp" placeholder="Enter confirm password">
                    @error('accountConfirmPassword')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     {{$message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @enderror
                </div>





<br>
                <button type="submit" class="btn btn-primary py-2 px-5  ">Change Password</button>
               <a href="{{route('dashboard')}}">
                <span  class="btn btn-success py-2 px-5  ">Cannel</span>
               </a>

           </div>
       </div>
   </div>
</form>
@endsection
{{--  --}}
