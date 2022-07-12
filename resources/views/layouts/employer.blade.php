<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel = "icon" href =
        "{{asset('images/careermove-icon.png')}}"
          type = "image/x-icon">
          <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title') | Careermove</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/awesome/css/all.css')}}" rel="stylesheet">
    @yield('styles')

</head>
<body class="admin">
<header class="p-5">
    <div class="row">
        <div class="col-4">

           <h3><span class="d-none d-sm-block fw-bold fs-6"> Careermove CMS</span></h3>


        </div>
        <div class="col-12 col-lg-8">
            <ul class="nav justify-content-lg-end admin-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('employers.index')}}">Dashboard</a>
                </li>


                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle text-uppercase text-decoration-none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{route('profile.index')}}">My Profile</a></li>
                            <li><hr class="dropdown-divider"> </li>
                            <li><a class="dropdown-item" href="#">Messages</a></li>
                            <li><hr class="dropdown-divider"> </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>

        </div>
    </div>


</header>
<main>
@include('includes.employer_nav')
@if (Auth::user()->companies->count()<1)
<div class="alert alert-success mb-3 mt-3 p-2 m-3">
    <h5 class="fs-6 d-inline-block">Please link at least one company to your profile</h5>
    <a href="{{route('organizations.index')}}" class="d-inline-block">Link</a>
</div>

@endif
<section>
   @yield('content')
</section>
</main>

<div class="copy">
    <p class="p-3">&copy; 2022 Careermove is a Cerve Ltd Company. All rights reserved.</p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@yield('scripts')

</body>
</html>
