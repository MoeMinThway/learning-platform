<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Learning Platform</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> --}}

</head> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">

      <div class="h3">
        Welcome to Admin Dashboard , <span class="text-danger " style="text-transform: uppercase">{{Auth::user()->name}}</span>
      </div>

      <div class="text-end rounded img-thumbnail" style="margin-left: 600px; " >
        {{-- <img src="{{asset('defaultImage/default.jpg')}}" width="50px" alt=""> --}}
        <a href="{{route('account#details',Auth::user()->id)}}">
            @if (Auth::user()->image == NULL)
            <img src="{{asset('defaultImage/default.jpg')}}" width="50px" alt="">
            @else
            <img src="{{asset('accountImage/'.Auth::user()->image)}}" width="50px" alt="">
            @endif
        </a>



      </div>

    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">

      <span class="brand-text font-weight-light">
        <img class="text-white" src="{{asset('logo/img-removebg-preview.png')}}" width="50px" alt="">

        Learning Platform </span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="mr-2 fas fa-user-circle"></i>
              <p>
              Account
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('category#lists')}}" class="nav-link">
                <i class="mr-2 fa-solid fa-list"></i>
              <p>
              Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('course#lists')}}" class="nav-link">
                <i class="mr-2 fa-solid fa-folder"></i>              <p>
              Course
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
                <i class="mr-2 fa-solid fa-clock-rotate-left"></i>
                              <p>
                History
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('kpay#lists')}}" class="nav-link">
                <i class="mr-2 fa-solid fa-money-bill"></i>              <p>
                Kpay
              </p>
            </a>
          </li>










          <form action="{{route('logout')}}" method="POST">
            @csrf
            <li class="nav-item">
                <button type="submit"  class="nav-link bg-danger text-white">
                  <i class="mr-2 fas fa-sign-out-alt"></i>
                  <p>
                    Logout
                  </p>
                </button>
              </li>
          </form>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row  mt-4">
         @yield('content')
        </div>
      </div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
{{-- <script src="{{asset('dist/js/demo.js')}}"></script> --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script></body> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}


@yield('scriptSection')

</html>
