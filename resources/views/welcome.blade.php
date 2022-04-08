
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "icon" href =
        "images/careermove-icon.png"
          type = "image/x-icon">
    <title>Career Move:Discover your Next Career</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/awesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<body>
<header>
    <!--Big menu-->
    <section class="big-menu">
        <nav class="navbar navbar-expand-sm navbar-light">
            <div class="container-fluid mt-2">
                <a class="navbar-brand me-5" href="index.html">
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
<main>
    <section class="p-5 intro">
        <div class="row pt-5 pb-5">
            <div class="col-11 mx-auto">
                <h1 class="">Discover you next Career move</h1>
                <p class="mt-2 access">Get unlimited access to over a 10000+ jobs</p>
                <form class="mt-3">
                    <div class="form-group row">
                        <div class="col-sm-6 col-md-4">
                            <label class="control-label">
                                Job by Profession
                            </label>
                            <input type="text" required class="form-control mt-3">
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <label class="control-label">
                                Job by Location(optional)
                            </label>
                            <input type="text" required class="form-control mt-3">
                        </div>
                        <div class="col-sm-6 col-md-4 align-self-end">
                            <button type="submit" class="btn btn-primary mt-3">
                                <i class="fa-solid fa-magnifying-glass me-3"></i>Search Job</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="mt-5">
        <div class="row">
            <div class="col-11 mx-auto">
                <h2 class="fs-3">Trending jobs
                    <a href="#" class="float-end text-decoration-none fs-6"><i class="fa-solid fa-list
                   me-3"></i>View
                        all</a>
                </h2>
                <hr>
                <div class="row mt-5">
                    <div class="col-sm-6 col-md-4 col-lg-3 p-2">
                        <a href="#" title="Job title" class="text-decoration-none">
                            <div class="card trending">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="p-0 m-0 fs-6"><span>Closing in 7days</span></p>
                                        </div>
                                        <div class="col-5 text-end">
                                            <form>
                                                <button type="submit" title="save job" class="btn btn-link m-0 p-0">
                                                    <i class="fa-regular fa-heart"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>

                                    <h6>Old Mutual</h6>
                                    <p class="fs-5 title">Full Time Warehouse Worker- Freight Handler</p>
                                    <div class="addition">
                                        <p><i class="fa-solid fa-money-bill me-2"></i>Unspecified</p>
                                        <p><i class="fa-solid fa-location-crosshairs me-2"></i>Nairobi, Kenya</p>
                                        <p><i class="fa-solid fa-briefcase me-2"></i>Full-time</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3 p-2">
                        <a href="#" title="Job title" class="text-decoration-none">
                            <div class="card trending">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="p-0 m-0"><span>Closing in 31days</span></p>
                                        </div>
                                        <div class="col-5 text-end">
                                            <form>
                                                <button type="submit" title="save job" class="btn btn-link m-0 p-0">
                                                    <i class="fa-regular fa-heart"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>

                                    <h6>Platinum Credit Limited</h6>
                                    <p class="fs-5 title">Finance And Administrative Intern</p>
                                    <div class="addition">
                                        <p><i class="fa-solid fa-money-bill me-2"></i>20000-60000</p>
                                        <p><i class="fa-solid fa-location-crosshairs me-2"></i>Kisumu, Kenya</p>
                                        <p><i class="fa-solid fa-briefcase me-2"></i>Full-time</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3 p-2">
                        <a href="#" title="Job title" class="text-decoration-none">
                            <div class="card trending">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="p-0 m-0"><span>Closing in 3days</span></p>
                                        </div>
                                        <div class="col-5 text-end">
                                            <form>
                                                <button type="submit" title="save job" class="btn btn-link m-0 p-0">
                                                    <i class="fa-regular fa-heart"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>

                                    <h6>Smartmile</h6>
                                    <p class="fs-5 title">Frontend Developer</p>
                                    <div class="addition">
                                        <p><i class="fa-solid fa-money-bill me-2"></i>150000-200000</p>
                                        <p><i class="fa-solid fa-location-crosshairs me-2"></i>Kisumu, Kenya</p>
                                        <p><i class="fa-solid fa-briefcase me-2"></i>Full-time</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 p-2">
                        <a href="#" title="Job title" class="text-decoration-none">
                            <div class="card trending">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="p-0 m-0"><span>Closing in 3days</span></p>
                                        </div>
                                        <div class="col-5 text-end">
                                            <form>
                                                <button type="submit" title="save job" class="btn btn-link m-0 p-0">
                                                    <i class="fa-regular fa-heart"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>

                                    <h6>Optiven limited</h6>
                                    <p class="fs-5 title">Sales & Marketing Executive (Real Estate)</p>
                                    <div class="addition">
                                        <p><i class="fa-solid fa-money-bill me-2"></i>40000-60000</p>
                                        <p><i class="fa-solid fa-location-crosshairs me-2"></i>Mombasa, Kenya</p>
                                        <p><i class="fa-solid fa-briefcase me-2"></i>Full-time</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                </div>
            </div>
        </div>


    </section>
    <section class="mt-5">
        <div class="row">
            <div class="col-11 mx-auto">
                <h2 class="fs-3">Companies Hiring today</h2>
                <div class="row mt-5">
                    <div class="col-sm-10 col-md-6 col-lg-4 p-3">
                        <a href="#" title="Company name" class="text-decoration-none">
                            <div class="companies">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="images/companies-02.jpg" class="img-fluid img-thumbnail"
                                             alt="company name" title="company name">
                                    </div>
                                    <div class="col-9 pt-2">
                                        <h4 class="fs-5">Telkom kenya</h4>
                                        <p>Positions: 16 &nbsp;Nairobi, Kenya.</p>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>

                    <div class="col-sm-10 col-md-6 col-lg-4 p-3">
                        <a href="#" title="Company name" class="text-decoration-none">
                            <div class="companies">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="images/companies-01.jpg" class="img-fluid img-thumbnail"
                                             alt="company name" title="company name">
                                    </div>
                                    <div class="col-9 pt-2">
                                        <h4 class="fs-5">Nairobi Metropolitan Services</h4>
                                        <p>Positions: 4 &nbsp;Nairobi, Kenya.</p>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-4 p-3">
                        <a href="#" title="Company name" class="text-decoration-none">
                            <div class="companies">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="images/companies-03.jpg" class="img-fluid img-thumbnail"
                                             alt="company name" title="company name">
                                    </div>
                                    <div class="col-9 pt-2">
                                        <h4 class="fs-5">Airtel Kenya</h4>
                                        <p>Positions: 1 &nbsp;Nairobi, Kenya.</p>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-4 p-3">
                        <a href="#" title="Company name" class="text-decoration-none">
                            <div class="companies">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="images/companies-04.jpg" class="img-fluid img-thumbnail"
                                             alt="company name" title="company name">
                                    </div>
                                    <div class="col-9 pt-2">
                                        <h4 class="fs-5">Lightstone</h4>
                                        <p>Positions: 4 &nbsp;Nairobi, Kenya.</p>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-4 p-3">
                        <a href="#" title="Company name" class="text-decoration-none">
                            <div class="companies">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="images/companies-05.jpg" class="img-fluid img-thumbnail"
                                             alt="company name" title="company name">
                                    </div>
                                    <div class="col-9 pt-2">
                                        <h4 class="fs-5">M-kopa</h4>
                                        <p>Positions: 2 &nbsp;Kisumu, Kenya.</p>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-4 p-3">
                        <a href="#" title="Company name" class="text-decoration-none">
                            <div class="companies">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="images/companies-06.jpg" class="img-fluid img-thumbnail"
                                             alt="company name" title="company name">
                                    </div>
                                    <div class="col-9 pt-2">
                                        <h4 class="fs-5">Optica Africa</h4>
                                        <p>Positions: 4 &nbsp;Nairobi, Kenya.</p>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-4 p-3">
                        <a href="#" title="Company name" class="text-decoration-none">
                            <div class="companies">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="images/companies-07.jpg" class="img-fluid img-thumbnail"
                                             alt="company name" title="company name">
                                    </div>
                                    <div class="col-9 pt-2">
                                        <h4 class="fs-5">Twiga Foods</h4>
                                        <p>Positions: 4 &nbsp;Nairobi, Kenya.</p>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-4 p-3">
                        <a href="#" title="Company name" class="text-decoration-none">
                            <div class="companies">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="images/companies-08.jpg" class="img-fluid img-thumbnail"
                                             alt="company name" title="company name">
                                    </div>
                                    <div class="col-9 pt-2">
                                        <h4 class="fs-5">Mpesa</h4>
                                        <p>Positions: 4 &nbsp;Nairobi, Kenya.</p>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-4 p-3">
                        <a href="#" title="Company name" class="text-decoration-none">
                            <div class="companies">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="images/companies-09.jpg" class="img-fluid img-thumbnail"
                                             alt="company name" title="company name">
                                    </div>
                                    <div class="col-9 pt-2">
                                        <h4 class="fs-5">Safaricom</h4>
                                        <p>Positions: 4 &nbsp;Nairobi, Kenya.</p>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="mt-5 sign p-4">
        <div class="row">
            <div class="col-11 mx-auto">
                <div class="subscribe">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <h1 class="fs-1">Never Miss a Chance...</h1>
                            <p class="fs-4 mt-3"><mark>Sign up for free.</mark> Never miss out a thing. Latest job
                                listings, career insights and company reviews</p>


                        </div>
                        <div class="col-md-3 mx-auto align-self-center text-end">
                            <a href="#" title="Sign Up" class="btn btn-primary m-2">
                                Sign up<i class="fa-solid fa-angle-right ms-3"></i></a>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>
</main>
<footer class="pt-5">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Browse Jobs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Find Companies</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Work at Careermove</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contact us</a>
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
</body>
</html>
