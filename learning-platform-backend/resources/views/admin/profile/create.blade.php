
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
        <h1 > Create  New Account </h1>
    </div>
  </div>
    <br>
    <form class="p-2" action="{{route('account#create')}}" method="POST" enctype="multipart/form-data">
        @csrf
       <div class="row">

           <div class="col-5 ">
               <img src="{{asset('logo/img-removebg-preview.png')}}" width="450px" alt="">
               <label ">Image</label>

               <input type="file" class="form-control mb-2" name="accountImg" id="">

               <div class="form-group">
                <label ">Role</label>
                <select class="form-control" name="accountRole" id="">
                    <option value="">Choose Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
              </div>
            <div class="form-group">
                <label ">Gender</label>
                <select class="form-control" name="accountGender" id="">
                    <option value="">Choose Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
              </div>

           </div>
           <div class="col-5 offset-1  ">


                <div class="form-group">
                  <label ">Name</label>
                  <input type="text" name="accountName"   class="form-control"  aria-describedby="emailHelp" placeholder="Enter name">
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
                  <input type="email" name="accountEmail"  class="form-control"  aria-describedby="emailHelp" placeholder="Enter email">
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
                  <input type="number" name="accountPhone"   class="form-control"  aria-describedby="emailHelp" placeholder="Enter phone">
                </div>

                <div class="form-group">
                    <label ">Money</label>
                    <input type="number" name="accountMoney" class="form-control"  aria-describedby="emailHelp" placeholder="Enter money">
                  </div>
                  <div class="form-group">
                    <label ">Point</label>
                    <input type="number"  name="accountPoint" class="form-control"  aria-describedby="emailHelp" placeholder="Enter point">
                  </div>
                  <div class="form-group">
                    <label ">Password</label>
                    <input type="password"  name="accountPassword" class="form-control"  aria-describedby="emailHelp" placeholder="Enter password">
                    @error('accountPassword')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     {{$message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @enderror
                </div>


                <div class="form-group">
                  <label ">Address</label>
                  {{-- <input type="email" value="{{$user->address}}"  class="form-control"  aria-describedby="emailHelp" placeholder="Enter email"> --}}
                    <textarea  name="accountAddress"  cols="5" rows="3" class="form-control"  placeholder="Enter Address"></textarea>
                </div>




<br>







                <button type="submit" class="btn btn-primary py-2 px-5  ">Create</button>

           </div>
       </div>
   </div>
</form>
@endsection
{{--  --}}
