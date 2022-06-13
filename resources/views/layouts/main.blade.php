<!DOCTYPE html>
<html lang="en">
<head>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1649231050054855"
     crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <link rel = "icon" href =
        "{{asset('images/careermove-icon.png')}}"
          type = "image/x-icon">
          <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PZXDP9D');</script>
    <!-- End Google Tag Manager -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <title>Careermove: @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="{{asset('css/awesome/css/all.css')}}" rel="stylesheet">
    @yield('styles')
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
    @yield('styles')

</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PZXDP9D"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


<header>
    <!--Big menu-->
    <section class="big-menu">

        <nav class="navbar navbar-expand-sm navbar-light">
            <div class="container-fluid mt-2">
                <a class="navbar-brand me-5" href="/">
                    <!--<img src="images/excel-logo.png" class="img-fluid" alt="careermove-logo"
                    style="width: 200px">-->
                    <h2 class="nav-logo ms-3">Careermove</h2>
                </a>

                <div class="navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('listings.index')}}">Discover Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('hiring.index')}}">Companies Hiring</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('blog.index')}}">Blog</a>
                        </li>

                    </ul>
                </div>
                <ul class="nav justify-content-end me-4">
                    @auth()
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-link   fw-bold  text-decoration-none"
                                        type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                     {{Auth::user()->name}}<i class="fa-solid fa-angle-down ms-2"></i>
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
                        <a class="nav-link" href="{{route('login')}}" title="Login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('careers.create')}}" title="Post a Job">Post a Job</a>
                    </li>
                        @endguest
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('search.index')}}" title="Search for Jobs and Insights"><i class="fa-solid fa-magnifying-glass"></i></a>
                        </li>
                </ul>
            </div>
        </nav>

    </section>
    <!--End of big menu-->
    <section class="small-screen ps-2 pb-2 pt-2">
        <div class="row">
            <div class="col-6">
                <a class="navbar-brand me-5" href="/">
                    <!--<img src="images/excel-logo.png" class="img-fluid" alt="careermove-logo"
                    style="width: 200px">-->
                    <h2 class="nav-logo">Careermove</h2>
                </a>
            </div>
            <div class="col-6 text-end pe-4">

                <ul class="nav justify-content-end">
                    <li class="nav-item fs-4">
                        <a class="nav-link" href="{{route('search.index')}}" title="Search for Jobs and Insights"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </li>

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
                                <a class="nav-link" href="{{route('blog.index')}}">Blog
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



<main class="d-flex flex-column min-vh-100">
    @if (Cookie::get('careermove_session'))
    @else
    @include('includes.subscriber-banner')
    @endif

    @yield('content')
</main>

<footer class="pt-5">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('listings.index')}}" title="Find Jobs">Browse Jobs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('hiring.index')}}" title="Companies Hiring">Companies Hiring</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('about')}}">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('blog.index')}}">Blog</a>
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
            <a class="nav-link" href="{{route('privacy-policy')}}">Privacy Policy</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('terms')}}">Terms</a>
        </li>

    </ul>
    <p class="p-3">&copy; {{date('Y')}} Careermove is a Cerve Ltd Company</p>

</footer>


<script src="{{asset('js/app.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        setTimeout(function(){
       $('#subscriberModal').modal('show');
   }, 3000);
    });
</script>

@yield('scripts')


</body>
</html>
