<div>
    @if($companies->count()<=0)
        <h5>Looks like you have no company attached to your profile</h5>
    @endif
       <div class="mb-5">
           <h6>Please Attach company/organization to this Profile. If you don't find your
               company profile-
               <a href="{{route('organizations.create')}}"><span>Create Company/Organization</span></a></h6>
           <div class="">
               <div class="row mt-2">
                   <div class="col-md-6 p-2">
                       <input wire:model="search" type="search" placeholder="Search Companies by name..."
                              class="form-control" style="height: 45px">
                   </div>
               </div>
               <h5>{{$success}}</h5>
               @if($organization)

                   <p>{{$organization->name}}</p>
                   <form wire:submit.prevent="attachCompany({{$organization->id}})">

                       <button type="submit" class="btn btn-view">Attach to your profile</button>
                   </form>


               @endif
           </div>
           <h6 class="mt-5">Companies Linked to you profile</h6>
       </div>

        <div class="row">
            @foreach($companies as $company)
            <div class="col-sm-6 col-md-3 p-1">
                <div class="card text-center p-3">
                    <div class="card-body">
                        <img src="{{asset($company->getFirstMediaUrl('logo')
                                        ?$company->getFirstMediaUrl('logo','logo-icon'):'company-icon.jpg')}}"
                             alt="{{$company->name}}" style="height: 100px">
                        <h6 class="text-uppercase">{{$company->name}}</h6>
                        <form wire:submit.prevent="unlinkCompany({{$company->id}})">

                            <button type="submit" class="btn btn-view">Unlink</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</div>
