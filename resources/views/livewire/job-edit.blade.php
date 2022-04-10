<div>
    <div class="stepwizard">
        <!--step one-->
        <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1">
            <div class="col-12 mx-auto">
                <h6>Create Listing</h6>
                <div class="form-group mt-2 row">
                    <div class="col-8">
                        <label for="title" class="control-label">Job Title:</label>
                        <input type="text" name="title" wire:model.lazy="title" id="title" required
                               class="form-control mt-2">
                        <small>Describe Job title e.g Social Media Manager.
                            Do not exceed 120 characters</small><br>
                        @error('title') <span class="error">{{ $message }}</span> @enderror<br>
                    </div>

                </div>
                <div class="form-group row mt-3">
                    <div class="col-md-4 col-lg-3 p-2">
                        <label for="companyId" class="control-label">Company/Organization:</label>
                        <select class="form-select mt-2" required name="experienceId"
                                wire:model.lazy="companyId" id="companyId">
                            <option selected  value="">Select Organization</option>
                            @foreach($companies  as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach

                        </select>
                        <small>Didn't find your Company?<a href="#">Add company</a> </small>
                        @error('companyId') <span class="error">{{ $message }}</span> @enderror<br>

                    </div>
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

                    <div class="col-md-4 col-lg-3 p-2">
                        <label for="locationId" class="control-label">Location</label>
                        <select class="form-select mt-2" required name="locationId"
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
                    <div class="col-md-4 col-lg-3 p-2">
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

                    <div class="col-md-4 col-lg-3 p-2">
                        <label for="professionId" class="control-label">Industry</label>
                        <select class="form-select mt-2" required name="industryId"
                                wire:model.lazy="industryId" id="industryId">
                            <option selected  value="">Select Industry</option>
                            @foreach($industries as $industry)
                                <option value="{{$industry->id}}">{{$industry->name}}</option>
                            @endforeach

                        </select>
                        @error('industryId') <span class="error">{{ $message }}</span> @enderror<br>

                    </div>
                </div>

                <div class="form-group mt-2 row">
                    <div class="col-8">
                        <label for="link" class="control-label">Application Link(optional):</label>
                        <input type="text" name="link" wire:model.lazy="link" id="link" required
                               class="form-control mt-2">
                        <small>Paste the link to the website that has listed the job.</small>
                        @error('link') <span class="error">{{ $message }}</span> @enderror<br>
                    </div>

                </div>
                <div class="form-group mt-2 row">
                    <div class="col-8 col-sm-4 col-lg-2">
                        <label for="link" class="control-label">Deadline:</label>
                        <input type="date" name="deadline" wire:model.lazy="deadline" id="deadline" required
                               class="form-control mt-2">
                        <small>Enter application deadline</small>
                        @error('link') <span class="error">{{ $message }}</span> @enderror<br>
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
                    <label for="tags" class="control-label">Tags:</label>
                    <textarea name="tags" class="form-control mt-2" id="tags" required
                              wire:model.lazy="tags">
                    {{$tags}}
                </textarea>
                    <small>List comma separated tags. For example:
                        mechanical engineering jobs,jobs in Nakuru,Jobs in Kenya</small>
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

