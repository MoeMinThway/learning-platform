
@extends('admin.layouts.app')


@section('content')
<div class="col-12">


<div class="card">
    <div class="card-title">
        <ul class="d-flex m-1 p-1 list-unstyled justify-content-between" >
            {{-- <li class="m-3">All</li> --}}

         <div class="d-flex">
            <ul class="d-flex list-unstyled" >
               <a href="{{route('course#lists')}}">
                <li class="p-2 m-2">All</li>
               </a>
               @foreach ($categories as $c)
                    <a href="{{route('course#lists',$c->category_id)}}">
                        <li class="p-2 m-2">{{$c->name}} </li>
                    </a>
               @endforeach

            </ul>
         </div>

@if (Session::has("message"))
<div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 600px">
    {{Session::get('message')}}

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif
       <a href="{{route('course#createPage')}}" class="" style="text-decoration: none">

                  <div class="bg-success rounded p-1">

                        <li class="m-3">Create New Course</li>

                  </div>
                </a>



        </ul>

    </div>
    <div class="card-body">
        <div class="row ">
            <table class="table table-hover">
                <thead>

                            <th >Id</th>
                            <th >Image</th>
                            <th >Name</th>
                            <th >Price</th>

                            <th >Point</th>
                            <th >Category</th>
                            <th></th>
                </thead>
                <tbody>
                    @foreach ($courses as $c )
                  <tr>
                    <td >{{$c->course_id}}</td>
                    <td >
                        @if ($c->image == NULL)
                        <img src="{{asset('logo/img-removebg-preview.png')}}" width="100px" alt="">
                        @else
                        <img src="{{asset('accountImage/'.$c->image)}}" width="100px" alt="">
                        @endif
                    </td>

                    <td > {{$c->title}} </td>
                    <td >{{$c->price}} </td>

                    <td > {{$c->point}} </td>
                    <td >
                        {{-- {{$c->category_id}} --}}
                        @foreach ($categories as $ca)
                            @if($c->category_id == $ca->category_id)
                                {{$ca->name}}
                            @endif
                        @endforeach
                    </td>
                    <td>



                            <a href="#">
                                <i class="fa-solid fa-pen-to-square ml-3 fs-5"></i>
                            </a>
                            <a href="#">
                                <i class="fa-solid fa-trash ml-3 fs-5"></i>
                            </a>


                    </td>



                  </tr>
                    @endforeach



                </tbody>
              </table>
              <div>
                {{-- {{$users->links()}} --}}
              </div>
        </div>
    </div>
</div>

  </div>
@endsection
{{--  --}}
