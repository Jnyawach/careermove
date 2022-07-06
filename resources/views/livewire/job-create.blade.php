<div>

    <div class="stepwizard">
        <h6>Create Listing</h6>
        @if ($exists)
            <div class="card card-body mt-3 mb-3">
                <div class="row">
                    <div class="col-11">
                        <h6 class="text-warning">Do you mean?: {{$exists->title}}- As listed by
                            {{$exists->company->name}} on {{$exists->created_at->diffForHumans()}}</h6>
                            <p>If it is so then the job already exists in the database. Do not list again</p>


                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-link col-2" wire:click="dismissInfo"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                </div>

            </div>
            @endif

        <!--step one-->
        <div class=" setup-content {{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1">
        <div class="col-12 mx-auto">
            <div class="form-group mt-5">
            @if($selected)
            <h5>Listing Company</h5>
            <img src="{{asset($company->getFirstMediaUrl('logo')
                    ?$company->getFirstMediaUrl('logo','logo-icon'):'company-icon.jpg')}}"
                             alt="{{$company->name}}" style="height: 50px">

                       <h5 class="text-uppercase">{{$company->name}}</h5>
                       <button type="button" wire:click="clearCompany" class="btn btn-view">Change</button>

            @else
                <div class="mt-5">
                    <div class="row mt-2">
                        <h5>Search & select Listing Company/Organization</h5>
                        <div class="col-md-6 p-2">
                            <input wire:model="search" type="search" placeholder="Search Companies by name..."
                                   class="form-control" style="height: 45px">
                        </div>
                    </div>
                    @if ($search)
                    @if($company->count()>0)
                    <img src="{{asset($company->getFirstMediaUrl('logo')
                    ?$company->getFirstMediaUrl('logo','logo-icon'):'company-icon.jpg')}}"
                             alt="{{$company->name}}" style="height: 50px">

                       <h5 class="text-uppercase">{{$company->name}}</h5>

                        <button type="button" wire:click="createCompany({{$company->id}})" class="btn btn-view">Select</button><br>


                   @endif
                    @endif

                    <small>Didn't find your Company?<a href="{{route('companies.create')}}">Add company</a> </small><br>
                    @error('companyId') <span class="error">{{ $message }}</span> @enderror<br>
                </div>
                @endif
            </div>

            <div class="form-group mt-5 row">
                <div class="col-8">
                    <label for="title" class="control-label">Job Title:</label>
                    <input type="text" name="title" wire:model.lazy="title" id="title" required
                           class="form-control mt-2">
                    <small>Describe Job title e.g Social Media Manager.
                    Do not exceed 120 characters</small><br>
                    @error('title') <span class="error">{{ $message }}</span> @enderror<br>
                </div>

            </div>

            <div  class="form-group row mt-3">

                <div class="col-md-4 col-lg-3 p-2">
                    <label for="experienceId" class="control-label">Experience Level</label>
                    <select class="form-select mt-2" required name="experienceId"
                            wire:model.lazy="experienceId" id="experienceId">
                        <option selected  value="">Experience Level</option>
                        @foreach($experiences as $experience)
                            <option value="{{$experience->id}}">{{$experience->name}}</option>
                        @endforeach

                    </select>
                    @error('experienceId') <span class="error">{{ $message }}</span> @enderror<br>

                </div>

                <div  class="col-md-4 col-lg-3 p-2">
                    <label for="locationId" class="control-label">Location</label>
                    <select class="form-select  mt-2" required name="locationId"
                            wire:model.lazy="locationId" id="locationId">
                        <option selected  value="">Select Location</option>
                        @foreach($locations as $location)
                            <option value="{{$location->id}}">{{$location->name}}</option>
                        @endforeach

                    </select>
                    @error('locationId') <span class="error">{{ $message }}</span> @enderror<br>

                </div>
            </div>

            <div class="form-group row mt-3">
                <div  class="col-md-4 col-lg-3 p-2 ">
                    <label for="professionId" class="control-label">Profession</label>
                    <select class="form-select mt-2" required name="locationId"
                            wire:model.lazy="professionId" id="professionId">
                        <option selected  value="">Select Profession</option>
                        @foreach($professions as$profession)
                            <option value="{{$profession->id}}">{{$profession->name}}</option>
                        @endforeach

                    </select>
                    @error('professionId') <span class="error">{{ $message }}</span> @enderror<br>

                </div>

                <div  class="col-md-4 col-lg-3 p-2">
                    <label for="industryId" class="control-label">Industry</label>

                        <select class="form-select mt-2" required name="industryId"
                             id="industryId" style="height: 45px" wire:model.lazy="industryId">
                        <option selected  value="">Select Industry</option>
                        @foreach($industries as $industry)
                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                        @endforeach

                    </select>

                    @error('industryId') <span class="error">{{ $message }}</span> @enderror<br>

                </div>

                <div class="col-md-4 col-lg-3 p-2">
                    <label for="typeId" class="control-label">Job Type:</label>
                    <select class="form-select mt-2" required name="typeId"
                            wire:model.lazy="typeId" id="typeId" >
                        <option selected  value="">Select Job Type</option>
                        @foreach($types as$type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach

                    </select>
                    @error('typeId') <span class="error">{{ $message }}</span> @enderror<br>

                </div>
            </div>

            <div class="form-group mt-2 row">
                <div class="col-md-8">
                    <label for="link" class="control-label">Application Link(optional):</label>
                    <input type="text" name="link" wire:model.lazy="link" id="link" required
                           class="form-control mt-2">
                    <small>Paste the link to the website that has listed the job.</small>
                    @error('link') <span class="error">{{ $message }}</span> @enderror<br>
                </div>
                <div class="col-md-4 col-lg-3">
                    <label for="locationId" class="control-label">Salary Range</label>
                    <select class="form-select mt-2" required name="locationId"
                            wire:model.lazy="rangeId" id="rangeId">
                        <option selected  value="">Select Salary Range</option>
                        @foreach($ranges as $range)
                            <option value="{{$range->id}}">{{$range->name}}</option>
                        @endforeach

                    </select>
                    @error('rangeId') <span class="error">{{ $message }}</span> @enderror<br>

                </div>

            </div>
            <div class="form-group mt-2 row">
                <div class="col-8 col-sm-4 col-lg-3">
                    <label for="link" class="control-label">Deadline:</label>
                    <input type="date" name="deadline" wire:model.lazy="deadline" id="deadline" required
                           class="form-control mt-2">
                    <small>Enter application deadline</small>
                    @error('deadline') <span class="error">{{ $message }}</span> @enderror<br>
                </div>
            </div>

            <div class="form-group mt-3">
                <button type="button" class="btn btn-primary" wire:click="firstStepSubmit">
                    Proceed
                </button>
            </div>


        </div>
        </div>
        <!--step one-->
        <div class="row setup-content {{ $currentStep != 2 ? 'display-none' : '' }}" id="step-2">
        <div class="col-12 mx-auto">
            <div class="form-group">
                <label for="tags" class="control-label">Meta Description:</label>
                <textarea name="tags" class="form-control mt-2" id="tags" required
                wire:model.lazy="tags">{{$tags}}</textarea>


                <small>Provide Meta description for the Jobs (About 100 words and must contain keywords)</small>
                @error('tags') <span class="error">{{ $message }}</span> @enderror<br>
            </div>

            <div wire:ignore class="form-group mt-3 ">
                    <label for="content" class="control-label">Job Description:</label><br>
                    <small>Provide a detailed description of the job. Include means of
                        application</small>
                    <div
                        class="form-textarea w-full"
                        x-data
                        x-init="
                         ClassicEditor.create($refs.myIdentifierHere)
                        .then( function(editor){
                            editor.model.document.on('change:data', () => {
                               $dispatch('input', editor.getData())
                            })
                        })
                        .catch( error => {
                            console.error( error );
                        } );
                    "
                        wire:ignore
                        wire:key="myIdentifierHere"
                        x-ref="myIdentifierHere"
                        wire:model.debounce.9999999ms="content"
                    >{!! $content !!}</div>
                    @error('content') <span class="error">{{ $message }}</span> @enderror<br>

                </div>



        </div>
            <div class="form-group mt-3">
                <button type="button" class="btn btn-primary" wire:click="lastStep">
                    Previous
                </button>
                <button type="button" class="btn btn-primary" wire:click="lastStepSubmit">
                    Finish
                </button>
                @if($success)
                <h6 class="text-success mt-3">{{$success}}</h6>
                    <a href="{{route('jobs.index')}}">View Jobs</a>
                @endif
            </div>
        </div>
    </div>

    <script src="{{asset('ckeditor5/ckeditor.js')}}"></script>


</div>
