@extends('layouts.main')
@section('title',$job->title)
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
        "name" : "{{$job->company->name}}",
        "sameAs" : "https://www.careermove.co.ke",
        "logo" : "http://www.careermove.co.ke/images/logo.png"
      },
      "jobLocation": {
      "@type": "Place",
        "address": {
        "@type": "PostalAddress",
        "streetAddress": "null",
        "addressLocality": "{{$job->location->name}}",
        "addressRegion": "kenya",
        "postalCode": "null",
        "addressCountry": "KE"
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
        <div class="row">
            <div class="col-12 col-md-9">

                <div class="card p-0 p-lg-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-end pb-2">

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
                        <div class="row mt-3">
                            <div class="col-3 col-md-3 col-lg-2">
                                <img src="{{asset($job->company->getFirstMediaUrl('logo')
                                        ?$job->company->getFirstMediaUrl('logo'):'company-icon.jpg')}}"
                                     class="img-fluid img-thumbnail"
                                     style="width: 120px">
                            </div>
                            <div class="col-12 col-md-9 col-lg-10 align-self-center">
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
                            <h5 class="fs-6 d-inline-block m-1">Posted On: <span>{{$job->created_at->isoFormat('MMM Do
                            YY')}}</span></h5>
                            <h5 class="fs-6 d-inline-block m-1">Deadline: <span>{{\Carbon\Carbon::parse
                            ($job->deadline_at)->isoFormat
                            ('MMM Do YY')
                            }}</span></h5>
                            <h5 class="fs-6 d-inline-block m-1">Experience: <span>{{$job->experience->name}}</span></h5>


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
                            <div>
                                <script src="https://platform.linkedin.com/in.js" type="text/javascript">
                                    lang: en_US
                                </script>
                                <script type="IN/Share" data-url="{{url()->current()}}"></script>
                            </div>
                            <a href="{{url()->previous()}}" class="btn btn-link mt-4 text-decoration-none fs-5 fw-bold">
                                <i class="fa-solid fa-arrow-left-long me-2"></i>Return to Jobs</a>

                        </div>




                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 p-2">
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
    @include('includes.subscribe')

@endsection

