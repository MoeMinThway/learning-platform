
@extends('admin.layouts.app')


@section('content')
<div class="col-12">


<div class="card">
    <div class="card-title">
        <ul class="d-flex m-1 p-1 list-unstyled justify-content-between" >
            {{-- <li class="m-3">All</li> --}}

         <div class="d-flex">
            <span href="#">
                <li class="m-3">
                   <h1> Category </h1>
                </li>
               </span>
                <a href="#">
                    <li class="m-3"></li>
                </a>
         </div>

@if (Session::has("message"))
<div class="alert alert-warning alert-dismissible fade show mt-2" role="alert" style="width: 600px">
    {{Session::get('message')}}

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif
       <a href="#" class="" style="text-decoration: none">

                  <div class="bg-success rounded p-1">

                        <li class="m-3">Create New Account</li>

                  </div>
                </a>



        </ul>

    </div>
    <div class="card-body">
        <div class="row ">
            <div class="col-6  p-4 ">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Category</th>
                        <th scope="col"></th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $c )
                            <tr>
                                <td> {{$c->category_id}} </td>
                                <td> {{$c->name}} </td>
                                <td>

                                    <a href="{{route("category#editPage",$c->category_id)}}">
                                        <i class="fa-solid fa-pen-to-square ml-3 fs-5"></i>
                                    </a>
                                    <a href="{{route('category#delete',$c->category_id)}}">
                                        <i class="fa-solid fa-trash ml-3 fs-5"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                  </table>
            </div>
            <div class="col-6  p-4 bg-dark " style="border-radius: 20px">
                <h4>Edit Category  </h4>

                <form action="{{route('category#update')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$category->category_id}}" name="categoryId">
                      <div class="form-group">
                        <label ">Name</label>
                        <input type="text" name="categoryName" value="{{old('categoryName',$category->name)}}"  class="form-control"  aria-describedby="emailHelp" placeholder="Enter the category">
                                  @error('categoryName')
                                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                   {{$message}}
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                  @enderror
                      </div>


                      <button type="submit" class="btn btn-primary">Update</button>

                </form>
            </div>
        </div>
    </div>
</div>

  </div>
@endsection
{{--  --}}
