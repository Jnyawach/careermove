<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "icon" href =
        "images/careermove-icon.png"
          type = "image/x-icon">
    <title>Careermove:@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/awesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    @yield('styles')
</head>
<body>
<header>
    <!--Big menu-->
    <section class="big-menu">
        <nav class="navbar navbar-expand-sm navbar-light">
            <div class="container-fluid mt-2">
                <a class="navbar-brand me-5" href="/">
                    <!--<img src="images/excel-logo.png" class="img-fluid" alt="careermove-logo"
                    style="width: 200px">-->
                    <h2>Careermove</h2>
                </a>

                <div class="navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Discover Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Companies</a>
                        </li>

                    </ul>
                </div>
                <ul class="nav justify-content-end me-4">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Post a Job</a>
                    </li>
                </ul>
            </div>
        </nav>

    </section>
    <!--End of big menu-->
    <section class="small-screen pt-4 ps-2 pb-4">
        <div class="row">
            <div class="col-6">
                <div class="navbar-brand">
                    <h2 class="ms-3">Careermove</h2>
                </div>
            </div>
            <div class="col-6 text-end pe-4">

                <ul class="nav justify-content-end">

                    <li class="nav-item">
                        <button class="btn btn-link" type="button" data-bs-toggle="modal" data-bs-target="#smallMenu">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </li>



                </ul>
            </div>
        </div>
        <hr>
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
                                <a class="nav-link" href="#">DiscoverJobs
                                    <i class="fa-solid fa-chevron-right float-end"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Companies Hiring
                                    <i class="fa-solid fa-chevron-right float-end"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Post
                                    a Job   <i class="fa-solid fa-chevron-right float-end"></i></a>
                            </li>

                            <li class="dropdown-divider"><hr></li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa-solid fa-envelope-open-text me-3"></i>SUBSCRIBE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa-solid fa-user me-3"></i>LOGIN
                                </a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!--End of Small Menu Modal-->


    </section>


</header>
<main>@yield('content')</main>

<footer class="pt-5">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Browse Jobs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Find Companies</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('contact.index')}}">Contact us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
        </li>
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
</body>
</html>
