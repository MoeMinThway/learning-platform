
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
        <h1 > Fill the Bill  </h1>
    </div>
  </div>
    <br>
    <form class="p-2" action="{{route('kpay#edit')}}" method="POST" enctype="multipart/form-data">
        @csrf
       <div class="row">

           <div class="col-5 ">
            @if ($kpay->image == null)
            <img src="{{asset('logo/kpay.png')}}" width="430px" style="margin-left: 70px" alt=""> <br>
            @else
            <img src="{{asset('kpayImage/'.$kpay->image)}}" width="430px" style="margin-left: 70px" alt=""> <br>

            @endif


           </div>
           <div class="col-5 offset-1  ">


            <div class="form-group">
                <label ">User</label>
                <input type="hidden" name="kpayUserId" value="{{$user->id}}">
                <input type="hidden" name="kpayId" value="{{$kpay->kpay_id}}">
                          <select  class="form-control">

                            <option value="{{$user->id}}" disabled  selected> {{$user->name}} </option>

                          </select>


                          @error('kpayUserId')
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          {{$message}}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          @enderror
              </div>



                <div class="form-group">
                  <label ">Money</label>
                  <input type="number" name="kpayNewMoney" value="{{old('kpayNewMoney',$kpay->new_money)}}"   class="form-control"  aria-describedby="emailHelp" placeholder="Enter amount">
                            @error('kpayNewMoney')
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                             {{$message}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            @enderror
                </div>






                <div class="form-group">
                    <label >Description</label>
                    {{-- <input type="text"  name="courseDescription" class="form-control"  aria-describedby="emailHelp" placeholder="Enter point"> --}}
                    <textarea name="kpayDescription"  class="form-control" id="" cols="4" rows="3" placeholder="Enter Description">{{old('kpayDescription',$kpay->description)}}</textarea>
                </div>
                  @error('kpayDescription')
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   {{$message}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @enderror




                <div class="form-group">
                    <label ">Image</label>

                    <input type="file" class="form-control mb-2" name="kpayImage" id="">

                </div>
                  @error('kpayImage')
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   {{$message}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @enderror










    <br>







                    <button type="submit" class="btn btn-primary py-2 px-5  ">Add Bill</button>

            </div>
        </div>
    </div>
    </form>
@endsection
{{--  --}}
