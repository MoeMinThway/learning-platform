
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
        <h1 > Edit <span class="text-danger">{{$user->name}}</span>  's Account
            <a class="ml-5" href="{{route("account#delete",$user->id)}}">
                <span  class="btn btn-danger">

                        <i class="fa-solid fa-trash fs-5"></i>

                    </span>
            </a>
        </h1>
    </div>
  </div>
    <br>
    <form class="p-2" action="{{route('account#update')}}" method="POST" enctype="multipart/form-data">
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

               <label ">Image</label>

               <input type="file" class="form-control mb-2" name="accountImg" id="">

               <div class="form-group">
                <label ">Role</label>
                <select class="form-control" name="accountRole" id="">
                    <option value="">Choose Role</option>
                    @if ($user->role == 'admin')
                            <option value="admin" selected>Admin</option>
                            <option value="user">User</option>
                    @else
                    <option value="admin" >Admin</option>
                    <option value="user" selected>User</option>
                    @endif
                </select>
              </div>
            <div class="form-group">
                <label ">Gender</label>
                <select class="form-control" name="accountGender" id="">
                    <option value="">Choose Gender</option>
                   @if ($user->gender = 'male')
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                   @else
                            <option value="male">Male</option>
                            <option value="female" selected>Female</option>
                   @endif
                </select>
              </div>

           </div>
           <div class="col-5 offset-1  ">


                <div class="form-group">
                  <label ">Name</label>
                  <input type="text" name="accountName" value="{{old('accountName',$user->name)}}"  class="form-control"  aria-describedby="emailHelp" placeholder="Enter name">
                            @error('accountName')
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                             {{$message}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            @enderror
                </div>


                <div class="form-group">
                  <label ">Email</label>
                  <input type="email" name="accountEmail" value="{{old('accountEmail',$user->email)}}"  class="form-control"  aria-describedby="emailHelp" placeholder="Enter email">
                  @error('accountEmail')
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   {{$message}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @enderror
                </div>





                <div class="form-group">
                  <label ">Phone</label>
                  <input type="number" name="accountPhone"  value="{{old('accountPhone',$user->phone)}}"  class="form-control"  aria-describedby="emailHelp" placeholder="Enter phone">
                </div>

                <div class="form-group">
                    <label ">Money</label>
                    <input type="number" name="accountMoney" value="{{old('accountMoney',$user->money)}}" @if (count($kpays) != 0) disabled   @endif class="form-control"  aria-describedby="emailHelp" placeholder="Enter money">
                  </div>
                  <div class="form-group">
                    <label ">Point</label>
                    <input type="number"  name="accountPoint" class="form-control"  value="{{old('accountPoint',$user->point)}}" aria-describedby="emailHelp" placeholder="Enter point">
                  </div>



                <div class="form-group">
                  <label ">Address</label>
                  {{-- <input type="email" value="{{$user->address}}"  class="form-control"  aria-describedby="emailHelp" placeholder="Enter email"> --}}
                    <textarea  name="accountAddress"  cols="5" rows="3" class="form-control"  placeholder="Enter Address">{{old('accountAddress',$user->address)}}</textarea>
                </div>
<br>
                <button type="submit" class="btn btn-primary py-2 px-5  ">Update</button>
               <a href="{{route('account#changePasswordPage',$user->id)}}">
                <span  class="btn btn-success py-2 px-5  ">Change Password</span>
               </a>

           </div>
       </div>
   </div>
</form>

@endsection
{{--  --}}
