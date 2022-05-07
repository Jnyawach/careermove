<div>
    <section class="hunt pt-3 p-3">

            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('listings.index')}}">Jobs</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{route('saved.index')}}">Saved</a>
                </li>

            </ul>

        <div class="form-group row">
            <div class="col-sm-6 col-md-4">
                <input type="search"  wire:model.debounce.500ms="search" required class="form-control mt-3"
                       placeholder="Search job by title">

            </div>
            <div class="col-sm-6 col-md-4">
                <select class="form-select mt-3" wire:model="location">
                    <option selected value="">Sort by Location</option>
                    @foreach($locations as $location)
                    <option value="{{$location->id}}">{{$location->name}}</option>
                    @endforeach
                </select>
            </div>
            @if($visible)
            <div class="col-sm-6 col-md-4 align-self-center">
                <button type="button" class="btn btn-view mt-3" wire:click="clearFilter">
                    <i class="fa-solid fa-square-xmark me-3"></i>Clear filter
                </button>
            </div>
            @endif
        </div>

            <div class="filter mt-2">
                <form>
                    <div class="form-group row">
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <select class="form-select mb-3" wire:model="publish">
                                <option selected  value="" >Published</option>
                                <option value="7">Last 1 Week</option>
                                <option value="30">Last 30 days</option>
                                <option value="1">Today</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <select class="form-select mb-3" wire:model="experience">
                                <option selected  value="">Seniority</option>
                                @foreach($experiences as $experience)
                                <option value="{{$experience->id}}">{{$experience->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <select class="form-select mb-3" wire:model="profession">
                                <option selected  value="">Profession</option>
                                @foreach($professions as $profession)
                                <option value="{{$profession->id}}">{{$profession->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <select class="form-select mb-3" wire:model="industry">
                                <option selected  value="">Industry</option>
                                @foreach($industries as $industry)
                                <option value="{{$industry->id}}">{{$industry->name}}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>
                </form>
            </div>
        </section>
    <section class="counter p-2">
            <div class="row">
                <div class="col-6">
                    <form class="">
                        <div class="form-group row ">
                            <label for="sort-select"
                                   class="col-5 col-sm-6 col-md-4 col-lg-2 col-form-label fw-bold text-end ">SORT
                                BY:</label>
                            <div class="col-7 col-sm-6 col-md-8 col-lg-10 text-start">
                                <select class="form-select m-0" wire:model="order" id="sort-select">
                                    <option selected value="">RECOMMENDED</option>
                                    <option value="ASC">CLOSING SOON</option>
                                    <option value="DESC">LATEST</option>

                                </select>
                            </div>
                        </div>


                    </form>

                </div>
                <div class="col-6 text-end align-self-center">
                    <h6 class="m-0 me-3"><span>{{$jobs->count()}}</span> JOBS FOUND</h6>
                </div>

            </div>
        </section>
    <section class="jobs p-3">
        @if($jobs->count()>0)
            <div class="row">
                @foreach($jobs as $job)
                <div class="col-md-6 p-2">
                    <a href="{{route('listings.show',$job->slug)}}" class="text-decoration-none" title="{{$job->title}}">
                        <div class="card job-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <form method="POST" action="{{route('saved.store')}}">
                                            @csrf
                                            <input type="hidden" value="{{$job->id}}" name="job_id">
                                            <button type="submit" title="save job" class="btn btn-link m-0 p-0">
                                                <i class="fa-regular fa-heart"></i>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3 col-sm-2">
                                        <img src="{{asset($job->company->getFirstMediaUrl('logo')
                                        ?$job->company->getFirstMediaUrl('logo','logo-icon'):'company-icon.jpg')}}"
                                             class="img-fluid rounded-circle img-thumbnail"
                                             style="width: 100px">
                                    </div>
                                    <div class="col-9 col-sm-10">

                                        <h2>{{$job->title}}</h2>
                                        <small><i class="fa-regular fa-building"></i> {{$job->company->name}}</small>
                                        <small><i class="fa-solid fa-location-crosshairs"></i>
                                            {{$job->location->name}}</small>
                                        <small><i class="fa-solid fa-briefcase"></i> {{$job->type->name}}</small>
                                        <small @if (\Carbon\Carbon::parse
                                        ($job->deadline)<\Carbon\Carbon::now())
                                           class="text-danger"
                                           @else
                                           class="text-success"
                                        @endif><i class="fa-regular fa-clock"></i> {{\Carbon\Carbon::parse
                                        ($job->deadline)->isoFormat('MMM Do YY')}}</small>


                                        <p>{!! \Illuminate\Support\Str::limit($job->description, 150, $end='...')
                                        !!}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>

                </div>
                @endforeach

            </div>
        @else
            <div class="text-center p-5">
                <img src="images/sad-face.png" class="img-fluid mt-5" style="width:80px">
                <h6 class="mt-5 ">Sorry We could not find what you are looking for</h6>
            </div>
        @endif
        </section>
      <section class="text-center p-5">
          <div class="row">
              <div class="col-12 mx-auto text-center">
                  {{$jobs->links('vendor.pagination.live')}}
              </div>
          </div>

        </section>
</div>
