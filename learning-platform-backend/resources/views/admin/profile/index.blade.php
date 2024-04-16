
@extends('admin.layouts.app')


@section('content')
<div class="col-12">


<div class="card">
    <div class="card-title">
        <ul class="d-flex m-1 p-1 list-unstyled justify-content-between" >
            {{-- <li class="m-3">All</li> --}}

         <div class="d-flex">
            <a href="{{route('dashboard')}}">
                <li class="m-3">Admin</li>
               </a>
                <a href="{{route('dashboard','user')}}">
                    <li class="m-3">User</li>
                </a>
         </div>

@if (Session::has("message"))
<div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 600px">
    {{Session::get('message')}}

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif

                  <div class="bg-success rounded ">
                    <a href="{{route('account#createPage')}}" style="text-decoration: none">
                        <li class="m-3">Create New Account</li>
                    </a>
                  </div>



        </ul>

    </div>
    <div class="card-body">
        <div class="row ">
            <table class="table table-hover">
                <thead>

                @if(Request::url() == 'http://127.0.0.1:8000/dashboard')
                    <tr>
                        <th colspan="2" >Id</th>
                        <th  colspan="2">Name</th>
                        <th >Email</th>
                        <th>Phone</th>
                          <th>Address</th>
                          <th></th>
                    </tr>
                    @elseif(Request::url() == 'http://127.0.0.1:8000/dashboard/user')
                            <th colspan="2" >Id</th>
                            <th  colspan="2">Name</th>
                            <th >Email</th>
                            <th >Money</th>
                            <th >Point</th>
                            <th></th>
                    @endif






                </thead>
                <tbody>
                    @foreach ($users as $u)
                    @if ($u->id == Auth::user()->id)
                    <tr class="bg-dark">
                        <td>{{$u->id}} </td>
                        <td></td>
                        <td>{{$u->name}} </td>
                        <td></td>
                        <td>{{$u->email}} </td>

                        @if ($u->role == "user")
                        <td>{{$u->money}} </td>
                        <td>{{$u->point}} </td>
                        @else
                        <td>{{$u->phone}} </td>
                        <td>{{$u->address}} </td>
                        @endif
                        <td>

                            <a href="{{route("account#details",$u->id)}}">
                                <i class="fa-solid fa-circle-info ml-3 fs-5"></i>
                            </a>
                            <a href="{{route("account#edit",$u->id)}}">
                                <i class="fa-solid fa-pen-to-square ml-3 fs-5"></i>
                            </a>


                        </td>
                    </tr>
                    @else
                    <tr>
                        <td>{{$u->id}} </td>
                        <td></td>
                        <td>{{$u->name}} </td>
                        <td></td>
                        <td>{{$u->email}} </td>

                        @if ($u->role == "user")
                        <td>{{$u->money}} </td>
                        <td>{{$u->point}} </td>
                        @else
                        <td>{{$u->phone}} </td>
                        <td>{{$u->address}} </td>
                        @endif
                        <td>

                            <a href="{{route("account#details",$u->id)}}">
                                <i class="fa-solid fa-circle-info ml-3 fs-5"></i>
                            </a>
                            <a href="{{route("account#edit",$u->id)}}">
                                <i class="fa-solid fa-pen-to-square ml-3 fs-5"></i>
                            </a>
                            <a href="">
                                <i class="fa-solid fa-trash ml-3 fs-5"></i>
                            </a>

                        </td>
                    </tr>
                    @endif

                    @endforeach

                </tbody>
              </table>
              <div>
                {{$users->links()}}
              </div>
        </div>
    </div>
</div>

  </div>
@endsection
{{--  --}}
