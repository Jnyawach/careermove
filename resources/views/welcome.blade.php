@extends('layouts.main')
@section('title','Discover your Next Career')
@section('content')
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
@endsection

