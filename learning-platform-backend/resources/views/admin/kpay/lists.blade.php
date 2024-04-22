
@extends('admin.layouts.app')


@section('content')
<div class="col-12">


<div class="card">
    <div class="card-title">
        <ul class="d-flex m-1 p-1 list-unstyled justify-content-between" >
            {{-- <li class="m-3">All</li> --}}
         <div>
            {{-- <select name="OpDesc" class="form-control" id="OpDesc">
                <option value="desc">Desc</option>
                <option value="asc">Asec</option>
            </select> --}}
         </div>
         <div  class="d-flex mt-3">

            <form action="{{route('kpay#search')}}" method="POST" class="d-flex">
                @csrf
               <div>
                <input type="text" class="form-control"  name="searchKey" id="">
               </div>
<div>                <button class="btn btn-secondary " type="submit">Search</button>
</div>           </form>
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
                    <div id="addTotheData">

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

                    </div>
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


{{-- @section('scriptSection')

    <script>

        $(document).ready(function(){




            $('#OpDesc').change(function(){

                $op = $('#OpDesc').val();
              $data = {
                'op' : $op
              }


                $.ajax ({

                type: 'get',
                url :  '/kpay/ajax/desc/',
                data :  $data,
                dataType: 'json',
                success : function(respnse){
                    console.log(respnse.kpays.length);
                    $list = '';
                        for( $i = 0 ; $i<respnse.kpays.length;$i++){
                             $list +=`
                             <tr>

                                <th>${respnse[$i].kpay_id} </th>

                                <a href="{{route('account#editPage',${respnse[$i].kpay_id})}}" class='text-decoration-none' >
                                        <span class='h6'>   {{$u->name}}</span>
                                        </a>
                                @foreach ($users as $u)
                                    @if ($u->id == $k->user_id)
                                        <th>
                                        <a href="{{route('account#editPage',${respnse[$i].kpay_id})}}" class='text-decoration-none' >
                                        <span class='h6'>   {{$u->name}}</span>
                                        </a>

                                        </th>
                                    @endif
                                @endforeach




                                        <th>${respnse[$i].old_money}</th>
                                        <th>${respnse[$i].new_money} </th>
                                        <th>${respnse[$i].current_money} </th>

                                        <th>${respnse[$i].updated_at} </th>
                                        <th>
                                            <a href="{{route('kpay#editPage',${respnse[$i].kpay_id})}}" style="list-style: none;">
                                                <i class="fa-solid fa-pen-to-square ml-3 fs-5"></i>
                                            </a>
                                            <a href="{{route('kpay#delete',${respnse[$i].kpay_id})}}">
                                                <i class="fa-solid fa-trash ml-3 fs-5"></i>
                                            </a>

                                        </th>
                                        </tr>
                                                                `;
                        }
                        $('#addTotheData').html= $list;

                }


            })
            // location.reload();
        });





    })
    </script>


@endsection --}}
