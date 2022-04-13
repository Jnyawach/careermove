@extends('layouts.main')
@section('title','Companies Hiring')
@section('content')
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
    @if($companies->count()>0)
        <section class="mt-5">
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
                                            <small class="fs-6 text-dark fw-bold">Open Positions {{$company->jobs->count()
                                        }}</small>
                                        </div>

                                    </div>
                                </a>

                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
    @endif
    <section class="text-center mt-5">
        {{$companies->links('vendor.pagination.custom')}}
    </section>
@endsection

