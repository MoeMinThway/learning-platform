
@extends('admin.layouts.app')


@section('content')
<div class="col-12">


<div class="card">
    <div class="card-title">
        <ul class="d-flex m-1 p-1 list-unstyled justify-content-between" >
            {{-- <li class="m-3">All</li> --}}

         <div class="d-flex">
            <ul class="d-flex list-unstyled" >
               <a href="#">
                <li class="p-2 m-2">All</li>
               </a>


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
       <a href="{{route('kpay#createPage')}}" class="" style="text-decoration: none">

                  <div class="bg-success rounded p-1">

                        <li class="m-3">Add money</li>

                  </div>
                </a>



        </ul>

    </div>
    <div class="card-body">
        <div class="row ">
            <table class="table table-hover">
                <thead>

                            <th >Id</th>
                            <th >Username</th>

                            <th>Old Amount</th>
                            <th>New Amount</th>
                            <th>Current Amount</th>

                            <th >updated at</th>

                            <th></th>
                </thead>

                <tbody>

                    @foreach ($kpays as $k)
                        <tr>

                            <th>{{$k->kpay_id}} </th>

                              @foreach ($users as $u)
                                @if ($u->id == $k->user_id)
                                    <th>
                                       <a href="{{route('account#editPage',$k->user_id)}}" class="text-decoration-none" >
                                     <span class="h6">   {{$u->name}}</span>
                                       </a>

                                    </th>
                                @endif
                            @endforeach




                            <th>{{$k->old_money}} </th>
                            <th>{{$k->new_money}} </th>
                            <th>{{$k->current_money}} </th>

                            <th>{{$k->updated_at}} </th>
                            <th>
                                <a href="{{route('kpay#editPage',$k->kpay_id)}}" style="list-style: none;">
                                    <i class="fa-solid fa-pen-to-square ml-3 fs-5"></i>
                                </a>
                                <a href="{{route('kpay#delete',$k->kpay_id)}}">
                                    <i class="fa-solid fa-trash ml-3 fs-5"></i>
                                </a>

                            </th>
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


@section('scriptSection')

    <script>

        $(document).ready(function(){




            $('#deleteLessonBtn').click(function(){

                $id = $('#deleteLessonId').val();

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
                    location.reload();
                }


            })
            location.reload();
        });





    })
    </script>


@endsection
