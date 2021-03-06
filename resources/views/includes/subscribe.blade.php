<section class="mt-5 sign  p-3 ">
    <div class="row">
        <div class="col-11 mx-auto">
            <div class="subscribe">
                @guest()
                <div class="row">
                    <div class="col-12 col-md-8 mx-auto">
                        <h2 class="fs-1 opportunity">Never miss a Chance...</h2>
                        <h5 class="fs-4 mt-3"><mark>Sign up for free.</mark> Never miss out a thing. Latest job
                            listings, career insights and company reviews</h5>
                    </div>
                    <div class="col-md-3 mx-auto align-self-center text-lg-end">
                        <a href="{{route('register')}}" title="Sign Up" class="btn btn-primary m-2 fs-5">
                            Sign up<i class="fa-solid fa-angle-right ms-3"></i></a>
                    </div>
                </div>
                @endguest
                @auth()
                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <h2 class="fs-1 opportunity">Never miss this Opportunity...</h2>
                                <h5 class="fs-4 mt-3"><mark>Subscribe.</mark> Never miss out a thing. Latest job
                                    listings, career insights and company reviews</h5>
                            </div>
                            <div class="col-md-3 mx-auto align-self-center text-lg-end">
                                <a href="{{route('newsletter.index')}}" title="Subscribe to our Newsletter"
                                   class="btn btn-primary m-2 fs-5">
                                    Subscribe<i class="fa-solid fa-angle-right ms-3"></i></a>
                            </div>
                        </div>
                    @endauth
            </div>
        </div>
    </div>
</section>
