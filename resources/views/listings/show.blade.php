@extends('layouts.main')
@section('title',$job->title)
@section('styles')

    <meta property="og:url"           content="http://127.0.0.1:8000/listings/technical-specialist-enterprise-development-kenya" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{$job->title}}" />
    <meta property="og:description"   content="View Job" />
    <meta property="og:image"         content="https://i.roamcdn.net/kazi/ke/hq/9c5ceb354b79b83b80d57be3546e5ab2/-/advertiser-img-ke-jobs-prod/dealer-images/advid10364/adv10364_1472045014.jpg" />
@endsection
@section('content')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <section class="p-2 p-md-5">
        @include('includes.status')
        <a href="{{url()->previous()}}" class="btn btn-link mb-4 text-decoration-none fs-5 fw-bold">
            <i class="fa-solid fa-arrow-left-long me-2"></i>Return to Jobs</a>
        <div class="row">
            <div class="col-12 col-md-9">

                <div class="card p-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-end">

                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#reportJobModal">
                                    <i class="fa-solid fa-flag me-2"></i>Report Job
                                </button>


                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="reportJobModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Report Job</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{route('report-job',$job->id)}}"
                                                  id="reportJob">
                                                @csrf
                                                @honeypot
                                                <div class="form-group">
                                                    <div class="form-check mt-3">
                                                        <input class="form-check-input" type="radio" name="reason"
                                                               id="flexRadioDefault1" value="It is offensive,discriminatory" required>

                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            It is offensive, discriminatory
                                                        </label>
                                                    </div>
                                                    <div class="form-check mt-3">
                                                        <input class="form-check-input" type="radio" name="reason"
                                                               id="flexRadioDefault2" value="It seems like a fake
                                                               job" required>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            It seems like a fake job
                                                        </label>
                                                    </div>
                                                    <div class="form-check mt-3">
                                                        <input class="form-check-input" type="radio" name="reason"
                                                               id="flexRadioDefault3" value="It is inaccurate" required>
                                                        <label class="form-check-label" for="flexRadioDefault3">
                                                            It is inaccurate
                                                        </label>
                                                    </div>
                                                    <div class="form-check mt-3">
                                                        <input class="form-check-input" type="radio" name="reason"
                                                               id="flexRadioDefault4" value="It is an advertisement" required>
                                                        <label class="form-check-label" for="flexRadioDefault4">
                                                            It is an advertisement
                                                        </label>
                                                    </div>
                                                    <div class="form-check mt-3">
                                                        <input class="form-check-input" type="radio" name="reason"
                                                               id="flexRadioDefault5" value="Other" required>
                                                        <label class="form-check-label" for="flexRadioDefault5">
                                                            Other
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label class="form-check-label" for="additional">
                                                        Additional information
                                                    </label>
                                                    <textarea class="form-control mt-2" placeholder="Leave a comment here" id="additional"
                                                              style="height: 100px" name="additional" required></textarea>

                                                </div>

                                            </form>
                                        </div>
                                        <div class="modal-footer">

                                            <button type="submit" class="btn btn-primary"
                                                    form="reportJob">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-lg-2">
                                <img src="{{asset($job->company->getFirstMediaUrl('logo')
                                        ?$job->company->getFirstMediaUrl('logo'):'company-icon.jpg')}}"
                                     class="img-fluid img-thumbnail"
                                     style="width: 120px">
                            </div>
                            <div class="col-md-9 col-lg-10 align-self-center">
                                <h6>{{$job->title}}</h6>
                                <h5>{{$job->company->name}}</h5>
                                <div class="small-desc">
                                    <small><i class="fa-solid fa-location-crosshairs"></i>{{$job->location->name}}
                                    </small>
                                    <small><i class="fa-solid fa-briefcase"></i> {{$job->type->name}}</small>
                                    <small><i class="fa-solid fa-bookmark"></i> {{$job->type->name}}</small>
                                    <small><i class="fa-solid fa-user-tie"></i> {{$job->profession->name}}</small>
                                    <small><i class="fa-solid fa-industry"></i> {{$job->industry->name}}</small>
                                    <small><i class="fa-solid fa-money-bill me-2"></i>{{$job->range->name}}</small>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h5 class="fs-6 d-inline-block m-2">Posted On: <span>{{$job->created_at->isoFormat('MMM Do
                            YY')}}</span></h5>
                            <h5 class="fs-6 d-inline-block m-2">Deadline: <span>{{\Carbon\Carbon::parse
                            ($job->deadline_at)->isoFormat
                            ('MMM Do YY')
                            }}</span></h5>
                            <h5 class="fs-6 d-inline-block m-2">Experience: <span>{{$job->experience->name}}</span></h5>


                        </div>
                        <div>{!! $job->description !!}</div>
                        <div>
                            @if($job->link)
                            <a href="{{$job->link}}" class="btn btn-view" title="{{$job->title}}" target="_blank">
                                Follow the link to apply</a>
                            @endif
                            <p class="mt-3">
                                Tags:@foreach(explode(',',$job->tags) as $tag)
                                         <mark>{{$tag}}</mark>
                                @endforeach
                            </p>
                            <a href="{{url()->previous()}}" class="btn btn-link mt-4 text-decoration-none fs-5 fw-bold">
                                <i class="fa-solid fa-arrow-left-long me-2"></i>Return to Jobs</a>
                            <div>
                                <div class="fb-share-button d-inline-block p-2"
                                     data-href="http://127.0.0.1:8000/listings/technical-specialist-enterprise-development-kenya"
                                     data-layout="button_count">
                                </div>
                                <div class="d-inline-block p-2">
                                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <h6 class="fs-5 fw-bold">Trending Jobs</h6>
                <div class="trend-jobs">
                    @foreach($jobs as $trending)
                        <p>
                            <a href="{{route('listings.show',$trending->slug)}}" class="">
                                {{$trending->title}}
                            </a>
                        </p>

                    @endforeach
                </div>
            </div>
        </div>

    </section>
    <section class="mt-5 sign p-4">
    <div class="row">
        <div class="col-11 mx-auto">
            <div class="subscribe">
                @guest()
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <h1 class="fs-1">Never miss a Chance...</h1>
                            <p class="fs-4 mt-3"><mark>Sign up for free.</mark> Never miss out a thing. Latest job
                                listings, career insights and company reviews</p>
                        </div>
                        <div class="col-md-3 mx-auto align-self-center text-end">
                            <a href="{{route('register')}}" title="Sign Up" class="btn btn-primary m-2">
                                Sign up<i class="fa-solid fa-angle-right ms-3"></i></a>
                        </div>
                    </div>
                @endguest
                @auth()
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <h1 class="fs-1">Never miss this Opportunity...</h1>
                            <p class="fs-4 mt-3"><mark>Subscribe.</mark> Never miss out a thing. Latest job
                                listings, career insights and company reviews</p>
                        </div>
                        <div class="col-md-3 mx-auto align-self-center text-end">
                            <a href="{{route('newsletter.index')}}" title="Subscribe to our Newsletter"
                               class="btn btn-primary m-2">
                                Subscribe<i class="fa-solid fa-angle-right ms-3"></i></a>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
    </section>

@endsection

