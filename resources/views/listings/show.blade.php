@extends('layouts.main')
@section('title',$job->title)
@section('description', $job->title)
@section('keywords')
Jobs in kenya, job vacancies in kenya, latest job vacancies in kenya, apply for jobs today,{{$job->tags}}
@endsection
@section('styles')

<script type="application/ld+json">
    {
          "@context" : "https://schema.org/",
          "@type" : "JobPosting",
          "title" : "{{$job->title}}",
          "description" : "{!!$job->description!!}",
          "identifier": {
            "@type": "PropertyValue",
            "name": "Careermove",
            "value": "{{$job->id}}"
          },
          "datePosted" : "{{$job->created_at->todatestring()}}",
          "validThrough" : "{{$job->deadline}}T00:00",
          "employmentType" : "{{$job->type->name}}",
          "hiringOrganization" : {
            "@type" : "Organization",
            "name" : "Careermove",
            "sameAs" : "https://www.careermove.co.ke",
            "logo" : "https://www.careermove.co.ke/careermove-logo.png"
          },
          "jobLocation": {
          "@type": "Place",
            "address": {
            "@type": "PostalAddress",
            "streetAddress": "null",
            "addressLocality": "{{$job->location}}",
            "addressRegion": "Kenya",
            "postalCode": "null",
            "addressCountry": "KE"
            }
          },
          "baseSalary": {
            "@type": "MonetaryAmount",
            "currency": "KES",
            "value": {
              "@type": "QuantitativeValue",
              "value": "null",
              "unitText": "MONTH"
            }
          }
        }
</script>

@endsection
@section('content')


<section class="p-2 p-md-5">
    @include('includes.status')
    <a href="{{url()->previous()}}" class="btn btn-link mb-4 text-decoration-none fs-5 fw-bold">
        <i class="fa-solid fa-arrow-left-long me-2"></i>Return to Jobs</a>

    <div class="row ">
        <div class="col-12 col-md-9 p-1">

            <div class="card p-0 p-lg-3">
                <div class="card-body mt-2">
                    <div class="actions">
                        <form method="POST" action="{{route('saved.store')}}" class="d-inline-block">
                            @csrf
                            <input type="hidden" value="{{$job->id}}" name="job_id">
                            <button type="submit" title="save job" class="btn btn-link  text-decoration-none fw-bold">
                                <i class="fa-regular fa-heart"></i> Save Job
                            </button>
                        </form>
                        <button type="button" class="btn btn-link d-inline-block text-decoration-none fw-bold"
                            data-bs-toggle="modal" data-bs-target="#shareJobModal{{$job->id}}">
                            <i class="fa-solid fa-share-nodes me-2"></i>Share Job
                        </button>
                        <button type="button" class="btn btn-link d-inline-block text-decoration-none fw-bold"
                            data-bs-toggle="modal" data-bs-target="#reportJobModal{{$job->id}}">
                            <i class="fa-solid fa-flag me-2"></i>Report Job
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="shareJobModal{{$job->id}}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Share Job</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6>Copy the Job link and share</h6>
                                        <input type="text" value="{{url()->current()}}" class="form-control">


                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Modal-->
                        <!-- Modal -->
                        <div class="modal fade" id="reportJobModal{{$job->id}}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Report Job</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('report-job',$job->id)}}"
                                            id="reportJob{{$job->id}}">
                                            @csrf
                                            @honeypot
                                            <div class="form-group">
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="radio" name="reason"
                                                        id="flexRadioDefault1" value="It is offensive,discriminatory"
                                                        required>

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
                                                <textarea class="form-control mt-2" placeholder="Leave a comment here"
                                                    id="additional" style="height: 100px" name="additional"
                                                    required></textarea>

                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-primary"
                                            form="reportJob{{$job->id}}">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Modal-->
                    </div>
                    <div class="row mt-3">
                        <div class="col-3 col-md-3 col-lg-2">
                            <img src="{{asset($job->company->getFirstMediaUrl('logo')
                                        ?$job->company->getFirstMediaUrl('logo'):'company-icon.jpg')}}"
                                class="img-fluid img-thumbnail" style="width: 120px">
                        </div>
                        <div class="col-12 col-md-9 col-lg-10 align-self-center">
                            <h1 class="fs-5">{{$job->title}}</h1>
                            <h6>{{$job->company->name}}</h6>
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
                        <h5 class="fs-6 d-inline-block m-1">Posted On: <span>{{$job->created_at->isoFormat('MMM Do
                                YY')}}</span></h5>
                        <h5 class="fs-6 d-inline-block m-1">Deadline: <span>{{\Carbon\Carbon::parse
                                ($job->deadline)->isoFormat
                                ('MMM Do YY')
                                }}</span></h5>
                        <h5 class="fs-6 d-inline-block m-1">Experience: <span>{{$job->experience->name}}</span></h5>


                    </div>
                     <!----Professonal CV Adver-->
                     @include('includes.pro-cv')
                    <div>{!! $job->description !!}</div>
                    <div>
                        @if($job->link)
                        <a href="{{$job->link}}" class="btn btn-view" title="{{$job->title}}" target="_blank">
                            Apply</a>
                        @endif
                        <p class="mt-3">
                            Keywords:@foreach(explode(',',$job->tags) as $tag)
                            <mark>{{$tag}}</mark>
                            @endforeach
                        </p>
                        <div class="mt-3 mb-3">
                            <script async
                                src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1649231050054855"
                                crossorigin="anonymous"></script>
                            <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
                                data-ad-format="fluid" data-ad-client="ca-pub-1649231050054855" data-ad-slot="7245907301"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>

                        <a href="{{url()->previous()}}" class="btn btn-link mt-4 text-decoration-none fs-5 fw-bold">
                            <i class="fa-solid fa-arrow-left-long me-2"></i>Return to Jobs</a>

                    </div>




                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 p-1">
            <section>
                <!--Ads Space-->
               <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <script async
                                src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1649231050054855"
                                crossorigin="anonymous"></script>
                            <!-- horizontal-add -->
                            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1649231050054855"
                                data-ad-slot="4790585617" data-ad-format="auto" data-full-width-responsive="true"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    </div>

                </div>
            </section>
            @if ($jobs->count()>0)
            <h6 class="fs-5 fw-bold mt-2">Similar Jobs</h6>
            <div class="trend-jobs">
                @foreach($jobs as $trending)
                <p>
                    <a href="{{route('listings.show',$trending->slug)}}" class="">
                        {{$trending->title}}
                    </a>
                </p>

                @endforeach
            </div>

            @endif

            <div class="mt-3 mb-3">
                <script async
                    src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1649231050054855"
                    crossorigin="anonymous"></script>
                <!-- horizontal-add -->
                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1649231050054855"
                    data-ad-slot="4790585617" data-ad-format="auto" data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
    </div>

</section>
@include('includes.subscribe')

@endsection
