<div>
    <section class="hiring p-5">
        <div class="row">
            <div class="col-md-5">
                <h6 class="fs-2 fw-light">A more robust way to connect to more employers</h6>

            </div>
            <div class="col-md-7 text-center">
                <img src="{{asset('images/find-jobs.png')}}" class="img-fluid" style="height: 100px">
            </div>
        </div>

    </section>
    <section class="p-2 p-lg-5">
        <div class="form-group row">
            <div class="col-sm-6 col-md-4">
                <input type="search"  wire:model.debounce.500ms="search" required class="form-control mt-3"
                       placeholder="Search  by Name">

            </div>
            <div class="col-sm-6 col-md-4">
                <select class="form-select mt-3" wire:model="location">
                    <option selected value="">Company by Location</option>
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
    </section>
    @if($companies->count()>0)
        <section class="">
            <div class="row">
                <div class="col-11 mx-auto">
                    <div class="row mt-3">
                        @foreach($companies as $company)
                            <div class="col-sm-6 col-md-4 col-lg-3 p-1">
                                <a href="{{route('hiring.show',$company->slug)}}" title="{{$company->name}}"
                                   class="text-decoration-none">
                                    <div class="profile-company">
                                        <div class="card p-2 text-center">
                                            <img src="{{asset($company->getFirstMediaUrl('logo')
                                        ?$company->getFirstMediaUrl('logo','logo-icon'):'company-icon.jpg')}}"
                                                 class="img-fluid
                                        mx-auto"
                                                 alt="{{$company->name}}" style="width: 60px">
                                            <h4 class="fs-6">{{$company->name}}</h4>
                                            <small class="fs-6 text-dark fw-bold">Open Positions
                                                {{$company->jobs->where('status_id',2)->count()}}</small>

                                        </div>

                                    </div>
                                </a>

                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
    @else
        <div class="text-center p-5">
            <img src="images/sad-face.png" class="img-fluid mt-5" style="width:80px">
            <h6 class="mt-5 ">Sorry We could not find what you are looking for</h6>
        </div>
    @endif
    <section class="text-center mt-5">
        {{$companies->links('vendor.pagination.live')}}
    </section>

</div>
