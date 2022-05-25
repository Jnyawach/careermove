@extends('layouts.main')

@section('content')
        <section class="home p-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-2 col-md-4 text-end align-self-center d-none d-md-block">
                            <img src="images/photo.jpg" class="img-fluid rounded-circle img-thumbnail" style="width: 80px">
                        </div>
                        <div class="col-8 align-self-center">
                            <h2 class="fs-2">Welcome back, Joshua</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 align-self-center p-2 text-md-end">
                    <a href="#" class="btn btn-secondary"><i class="fa-regular fa-heart me-3"></i>Saved Jobs</a>
                </div>
                <div class="col-sm-4 col-md-3 align-self-center p-2 text-md-start">
                    <a href="#" class="btn btn-view"><i class="fa-regular fa-user me-3"></i>View Profile</a>
                </div>
            </div>

        </section>
        <section class="mt-5">
            <div class="row">
                <div class="col-11 mx-auto">
                    <h2 class="fs-3">Saved jobs
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
                    <h2 class="fs-3">Recommended for you
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
        <section class="mt-5 sign p-4">
            <div class="row">
                <div class="col-11 mx-auto">
                    <div class="subscribe">
                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <h1 class="fs-1">Never miss an opportunity...</h1>
                                <p class="fs-4 mt-3">We are here to help you land your next job</p>


                            </div>
                            <div class="col-md-3 mx-auto align-self-center text-end">
                                <a href="#" title="Sign Up" class="btn btn-primary m-2">
                                    View all Jobs<i class="fa-solid fa-angle-right ms-3"></i></a>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </section>
        <section class="mt-5">
            <div class="row">
                <div class="col-11 mx-auto">
                    <h2 class="fs-3">Companies looking to hire
                        <a href="#" class="float-end text-decoration-none fs-6"><i class="fa-solid fa-list
                   me-3"></i>View
                            all</a>
                    </h2>
                    <hr>
                    <div class="row mt-5">
                        <div class="col-sm-10 col-md-6 col-lg-3 p-3">
                            <a href="#" title="Company name" class="text-decoration-none">
                                <div class="profile-company">
                                    <div class="card p-3 text-center">
                                        <img src="images/companies-01.jpg" class="img-fluid mx-auto" style="width: 60px">
                                        <h4 class="fs-6">Nairobi Metropolitan Services</h4>
                                        <small class="fs-6 text-dark">2 positions Nairobi, Kenya</small>
                                    </div>

                                </div>
                            </a>

                        </div>
                        <div class="col-sm-10 col-md-6 col-lg-3 p-3">
                            <a href="#" title="Company name" class="text-decoration-none">
                                <div class="profile-company">
                                    <div class="card p-3 text-center">
                                        <img src="images/companies-02.jpg" class="img-fluid mx-auto" style="width: 60px">
                                        <h4 class="fs-6">Telkom Kenya</h4>
                                        <small class="fs-6 text-dark">2 positions Nairobi, Kenya</small>
                                    </div>

                                </div>
                            </a>

                        </div>
                        <div class="col-sm-10 col-md-6 col-lg-3 p-3">
                            <a href="#" title="Company name" class="text-decoration-none">
                                <div class="profile-company">
                                    <div class="card p-3 text-center">
                                        <img src="images/companies-03.jpg" class="img-fluid mx-auto" style="width: 60px">
                                        <h4 class="fs-6">Airtel Kenya</h4>
                                        <small class="fs-6 text-dark">2 positions Nairobi, Kenya</small>
                                    </div>

                                </div>
                            </a>

                        </div>
                        <div class="col-sm-10 col-md-6 col-lg-3 p-3">
                            <a href="#" title="Company name" class="text-decoration-none">
                                <div class="profile-company">
                                    <div class="card p-3 text-center">
                                        <img src="images/companies-05.jpg" class="img-fluid mx-auto" style="width: 60px">
                                        <h4 class="fs-6">M-kopa Kenya</h4>
                                        <small class="fs-6 text-dark">2 positions Nairobi, Kenya</small>
                                    </div>

                                </div>
                            </a>

                        </div>

                    </div>

                </div>
            </div>
        </section>

@endsection
<div class="bottom-0 position-fixed p-2 w-100 js-cookie-consent cookie-consent">
    <div class="cookie p-1 ps-3 rounded">
        <div class="p-2 row">
            <div class="row">
                <div class="col-12 col-md-8">
                    <p class="ml-3 cookie-consent__message">
                        {!! trans('cookie-consent::texts.message') !!}
                    </p>
                </div>
                <div class="col-12 col-md-4 text-end align-self-center">
                    <button class="js-cookie-consent-agree cookie-consent__agree btn btn-cookie ">
                        {{ trans('cookie-consent::texts.agree') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
