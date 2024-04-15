
@extends('admin.layouts.app')


@section('content')
<div class="col-12">
    <div class="">
      <div class="card">
        <div class="card-header p-2">
          <legend class="text-center">User Profile


          </legend>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">

                @if (Session::has('message'))
                <div class="alert alert-success bg-success alert-dismissible fade show" role="alert">
                    <strong>

                        {{Session('message')}}
                    </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                @endif




              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  {{-- <a href="{{route('admin#changePassword')}}">Change Password</a> --}}
                </div>
              </div>

            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
{{--  --}}
