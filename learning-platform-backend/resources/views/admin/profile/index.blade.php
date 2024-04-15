
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
                  <div class="bg-success ">
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
                  <tr>
                    <th >Id</th>
                    <th >Name</th>
                    <th >Email</th>


    @foreach ($users as $u)
    @if ($u->role == 'user')
    <th >Money</th>
    <th >Point</th>
    @else
                <th>Phone</th>
                <th>Address</th>
    @endif
    @endforeach

                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                        <tr>
                            <td>{{$u->id}} </td>
                            <td>{{$u->name}} </td>
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
                                <a href="">
                                    <i class="fa-solid fa-pen-to-square ml-3 fs-5"></i>
                                </a>
                                <a href="">
                                    <i class="fa-solid fa-trash ml-3 fs-5"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
        </div>
    </div>
</div>

  </div>
@endsection
{{--  --}}
