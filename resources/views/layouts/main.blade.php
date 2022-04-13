<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "icon" href =
        "{{asset('images/careermove-icon.png')}}"
          type = "image/x-icon">
    <title>Careermove:@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('css/awesome/css/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
    @yield('styles')
</head>
<body class="d-flex flex-column min-vh-100">
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Job Saved Successfully
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>

    </div>
</div>
<header>
    <!--Big menu-->
    <section class="big-menu">
        <nav class="navbar navbar-expand-sm navbar-light">
            <div class="container-fluid mt-2">
                <a class="navbar-brand me-5" href="/">
                    <!--<img src="images/excel-logo.png" class="img-fluid" alt="careermove-logo"
                    style="width: 200px">-->
                    <h2 class="nav-logo">Careermove</h2>
                </a>

                <div class="navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('listings.index')}}">Discover Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('hiring.index')}}">Companies</a>
                        </li>

                    </ul>
                </div>
                <ul class="nav justify-content-end me-4">
                    @auth()
                        <li class="nav-item pe-5">
                            <div class="dropdown">
                                <button class="btn btn-link dropdown-toggle fw-bold text-uppercase  text-decoration-none"
                                        type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-regular fa-user"></i> {{Auth::user()->name}}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        @role('User')
                                        <a class="dropdown-item" href="{{route('dashboard.index')}}">Dashboard</a>
                                       @endrole
                                        @role('Employer')
                                        <a class="dropdown-item" href="{{route('employers.index')}}">Dashboard</a>
                                        @endrole
                                        @role('Manager|super-admin')
                                        <a class="dropdown-item" href="{{route('admin.index')}}">Dashboard</a>
                                        @endrole

                                    </li>
                                    <li><hr class="dropdown-divider"> </li>
                                    <li>
                                        @role('User')
                                        <a class="dropdown-item" href="{{route('accounts.index')}}">My Profile</a>
                                        @endrole
                                        @role('Manager')
                                        <a class="dropdown-item" href="{{route('profile.index')}}">My Profile</a>
                                        @endrole
                                        @role('Manager|super-admin')
                                        <a class="dropdown-item" href="{{route('users.index')}}">My Profile</a>
                                        @endrole

                                    </li>
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
                    @endauth
                    @guest()
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('careers.create')}}">Post a Job</a>
                    </li>
                        @endguest
                </ul>
            </div>
        </nav>

    </section>
    <!--End of big menu-->
    <section class="small-screen pt-4 ps-2 pb-2">
        <div class="row">
            <div class="col-6">
                <div class="navbar-brand">
                    <h2 class="ms-3">Careermove</h2>
                </div>
            </div>
            <div class="col-6 text-end pe-4">

                <ul class="nav justify-content-end">

                    <li class="nav-item">
                        <button class="btn btn-link fs-4" type="button" data-bs-toggle="modal"
                                data-bs-target="#smallMenu">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </li>

                </ul>
            </div>
        </div>
        <!--Small Menu Modal-->
        <div class="modal fade" id="smallMenu" tabindex="-1" aria-labelledby="smallMenuLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title navbar-brand">
                            <h2>Careermove</h2>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body smaller">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('listings.index')}}">DiscoverJobs
                                    <i class="fa-solid fa-chevron-right float-end"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('hiring.index')}}">Companies Hiring
                                    <i class="fa-solid fa-chevron-right float-end"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('careers.create')}}">Post
                                    a Job   <i class="fa-solid fa-chevron-right float-end"></i></a>
                            </li>

                            <li class="dropdown-divider"><hr></li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('newsletter.index')}}"><i class="fa-solid
                                fa-envelope-open-text
                                me-3"></i>SUBSCRIBE</a>
                            </li>
                            @guest()
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}"><i class="fa-solid fa-user me-3"></i>LOGIN
                                </a>
                            </li>
                            @endguest
                            @auth()
                                <li class="nav-item">
                                    @role('User')
                                    <a class="nav-link" href="{{route('dashboard.index')}}"><i class="fa-solid
                                    fa-user me-3"></i> DASHBOARD</a>
                                    @endrole
                                    @role('Employer')
                                    <a class="nav-link" href="{{route('employers.index')}}"><i class="fa-solid fa-user me-3"></i>DASHBOARD</a>
                                    @endrole
                                    @role('Manager|super-admin')
                                    <a class="nav-link" href="{{route('admin.index')}}"><i class="fa-solid fa-user me-3"></i>DASHBOARD</a>
                                    @endrole

                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-view" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-lock me-2"></i>LOGOUT
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endauth

                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!--End of Small Menu Modal-->


    </section>


</header>



<main class="d-flex flex-column min-vh-100">@yield('content')</main>

<footer class="pt-5">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('listings.index')}}" title="Find Jobs">Browse Jobs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('hiring.index')}}" title="Companies Hiring">Find Companies</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('contact.index')}}" title="Contact Us">Contact us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('newsletter.index')}}" title="Subscribe to our Newsletter">Subscribe</a>
        </li>
        @guest()
        <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        @endguest
        <li class="nav-item">
            <a class="nav-link" href="#">Privacy Policy</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Terms</a>
        </li>

    </ul>
    <p class="p-3">&copy; 2022 Careermove is a Cerve Ltd Company</p>

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@yield('scripts')
<script>

    window.addEventListener('name-updated', event => {
        var toastLiveExample = document.getElementById('liveToast')
        var toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
    })
</script>
</body>
</html>
