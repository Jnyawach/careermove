<div>
    <section class="hunt pt-2 p-2">

            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('listings.index')}}"> All Jobs</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('saved.index')}}">Saved</a>
                </li>

            </ul>


    </section>
    <section  class="mt-5">
        <div class="form-group row">
            <div class="col-11 mx-auto">


                       <div class="input-group search-input">
                        <input class="form-control border-end-0 border" type="search" value="search" id="example-search-input" wire:model.debounce.500ms="search"
                        placeholder="Start typing to search jobs">
                        <span class="input-group-append">
                            <button class="btn btn-primary border-start-0 border  ms-n3" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                 </div>

                <div class="mt-3">
                    @include('includes.status')
                </div>
            </div>


           </div>

    </section>




        <section class="p-5">
            <div class="row ">
                <div class="col-12 col-md-4 col-lg-3 p-2">
                   <div class="filter-bar">
                    <h2>Filter Jobs >></h2>


                    <div class="filter-form">
                        <select class="form-select mt-4 filter-input" wire:model="order">
                            <option selected value="">Recommended</option>
                            <option value="ASC">Closing Soon</option>
                            <option value="DESC">Latest</option>

                        </select>

                        <select class="form-select mt-4 filter-input" wire:model="location">
                            <option selected value="">Sort by Location</option>
                            @foreach($locations as $location)
                            <option value="{{$location->id}}">{{$location->name}}</option>
                            @endforeach
                        </select>

                        <select class="form-select mt-4 filter-input" wire:model="publish">
                            <option selected  value="" >Published</option>
                            <option value="7">Last 1 Week</option>
                            <option value="30">Last 30 days</option>
                            <option value="1">Today</option>
                        </select>



                        <select class="form-select mt-4 filter-input" wire:model="experience">
                            <option selected  value="">Seniority</option>
                            @foreach($experiences as $experience)
                            <option value="{{$experience->id}}">{{$experience->name}}</option>
                            @endforeach

                        </select>

                        <select class="form-select mt-4 filter-input" wire:model="profession">
                            <option selected  value="">Profession</option>
                            @foreach($professions as $profession)
                            <option value="{{$profession->id}}">{{$profession->name}}</option>
                            @endforeach
                        </select>

                        <select class="form-select mt-4 filter-input" wire:model="industry">
                            <option selected  value="">Industry</option>
                            @foreach($industries as $industry)
                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                            @endforeach
                        </select>


                        <div class="reset-form text-center mt-4 mb-3">
                            @if($visible)
                            <button type="button" class="btn btn-view" wire:click="clearFilter">
                                <i class="fa-solid fa-square-xmark me-3"></i>Clear filter
                            </button>
                            @endif
                        </div>



                    </div>

                   </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9 p-2">
                    <p class="fw-bold fs-6 text-muted result-para mb-0 d-inline-block">
                        {!! __('Showing') !!}
                        <span class="font-medium">{{ $jobs->firstItem() }}</span>
                        {!! __('-') !!}
                        <span class="font-medium">{{ $jobs->lastItem() }}</span>
                        {!! __('of') !!}
                        <span class="font-medium">{{ $jobs->total() }}</span>
                        {!! __('results') !!}
                    </p>
                    <div class="d-inline-block ms-3">
                        <div wire:loading.delay>
                            <div class="spinner-grow spinner-grow-sm spin" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow spinner-grow-sm spin " role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow spinner-grow-sm spin" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>


                    </div>
                    <hr>



                    <div wire:loading.remove>

                    @if($jobs->count()>0)
                    @foreach ($jobs as $job )
                    <div class="vacancy-card">
                        <div class="job-title">
                            <h6 class="job-location d-inline-block text-center fw-bold p-1 "><i class="fa-solid fa-location-crosshairs"></i> {{$job->location->name}}</h6>
                            <a href="{{route('listings.show',$job->slug)}}" title="{{$job->title}}" class="job-link">
                                <h2 class="d-inline-block fw-bold" style="text-decoration: underline">{{$job->title}}</h2></a>


                                <div class="job-detail">
                                    <p class="d-inline-block m-1"><span><i class="fa-regular fa-building"></i></span> {{$job->company->name}}</p>
                                    <p class="d-inline-block m-1"><span><i class="fa-regular fa-clock"></i></span> {{\Carbon\Carbon::parse
                                        ($job->deadline)->isoFormat('MMM Do YY')}}</p>
                                        <p class="d-inline-block m-1"><span><i class="fa-solid fa-briefcase"></i></span> {{$job->type->name}}</p>
                                        <p class="d-inline-block m-1"><span><i class="fa-solid fa-code-branch"></i></span> {{$job->industry->name}}</p>


                                </div>
                                <div class="actions">
                                    <form method="POST" action="{{route('saved.store')}}" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" value="{{$job->id}}" name="job_id">
                                        <button type="submit" title="save job" class="btn btn-link  text-decoration-none fw-bold">
                                            <i class="fa-regular fa-heart"></i> Save Job
                                        </button>
                                    </form>
                                    <button type="button" class="btn btn-link d-inline-block text-decoration-none fw-bold" data-bs-toggle="modal"
                                        data-bs-target="#shareJobModal{{$job->id}}">
                                        <i class="fa-solid fa-share-nodes me-2"></i>Share Job
                                    </button>
                                    <button type="button" class="btn btn-link d-inline-block text-decoration-none fw-bold" data-bs-toggle="modal"
                                        data-bs-target="#reportJobModal{{$job->id}}">
                                        <i class="fa-solid fa-flag me-2"></i>Report Job
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="shareJobModal{{$job->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Share Job</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6>Copy the Job link and share</h6>
                                                    <input type="text" value="https://careermove.co.ke/listings/{{$job->slug}}" class="form-control">


                                                </div>
                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Modal-->
                                    <!-- Modal -->
                                    <div class="modal fade" id="reportJobModal{{$job->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Report Job</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{route('report-job',$job->id)}}" id="reportJob{{$job->id}}">
                                                        @csrf
                                                        @honeypot
                                                        <div class="form-group">
                                                            <div class="form-check mt-3">
                                                                <input class="form-check-input" type="radio" name="reason" id="flexRadioDefault1"
                                                                    value="It is offensive,discriminatory" required>

                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                    It is offensive, discriminatory
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input class="form-check-input" type="radio" name="reason" id="flexRadioDefault2" value="It seems like a fake
                                                                                               job" required>
                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                    It seems like a fake job
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input class="form-check-input" type="radio" name="reason" id="flexRadioDefault3"
                                                                    value="It is inaccurate" required>
                                                                <label class="form-check-label" for="flexRadioDefault3">
                                                                    It is inaccurate
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input class="form-check-input" type="radio" name="reason" id="flexRadioDefault4"
                                                                    value="It is an advertisement" required>
                                                                <label class="form-check-label" for="flexRadioDefault4">
                                                                    It is an advertisement
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input class="form-check-input" type="radio" name="reason" id="flexRadioDefault5"
                                                                    value="Other" required>
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

                                                    <button type="submit" class="btn btn-primary" form="reportJob{{$job->id}}">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Modal-->
                                </div>

                        </div>
                        <hr>

                    </div>

                    @endforeach
                    @else
                    <div class="text-center p-5">
                        <img src="images/sad-face.png" class="img-fluid mt-5" style="width:80px">
                        <h6 class="mt-5 ">Sorry We could not find what you are looking for</h6>
                    </div>
                   @endif
                    </div>

                </div>
            </div>
        </section>

      <section class="text-center p-5" wire:loading.class="invisible">
          <div class="row">
              <div class="col-12 mx-auto text-center">

                  {{$jobs->onEachSide(0)->links('vendor.pagination.live')}}
              </div>
          </div>

        </section>

</div>
