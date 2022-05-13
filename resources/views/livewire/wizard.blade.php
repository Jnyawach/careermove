<div>
    <div class="stepwizard">
            <!--step one-->
            <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1">
            <div class="col-sm-6 mx-auto p-2">
                <button type="button" class="btn-step"  wire:click="firstStepSubmit">
                    Are you a jobseeker?
                </button>
            </div>
                <div class="col-sm-6 mx-auto p-2">
                    <button type="button" class="btn-step"  wire:click="employerSubmit">
                        Are you an Employer?
                    </button>
                </div>
            </div>
            <!--step two-->
            <div class="row setup-content {{ $currentStep != 2 ? 'display-none' : '' }}" id="step-2">
                <div class="col-12 col-md-8 mx-auto">
                    <h6 class="text-center fw-bold">Step 1 of 3</h6>
                    <div class="card mt-5 p-lg-5">
                        <div class="card-body p-3 p-lg-5">
                            <div class="form-group mt-2">
                                <label for="name" class="control-label">First Name:</label>
                                <input type="text" name="name" wire:model.lazy="name" id="name" required
                                           class="form-control mt-2">
                                @error('name') <span class="error">{{ $message }}</span> @enderror<br>

                            </div>
                            <div class="form-group mt-2">
                                <label for="lastName" class="control-label">Last Name:</label>
                                <input type="text" name="lastName" wire:model.lazy="lastName" id="lastName" required
                                       class="form-control mt-2">
                                @error('lastName') <span class="error">{{ $message }}</span> @enderror<br>

                            </div>
                            <div class="form-group mt-2">
                                <label for="email" class="control-label">Email:</label>
                                <input type="email" name="email" wire:model.lazy="email" id="email" required
                                       class="form-control mt-2">
                                @error('email') <span class="error">{{ $message }}</span> @enderror<br>

                            </div>
                            <div class="form-group mt-2">
                                <label class="control-label" for="password">Password:</label>
                                <input type="password" id="password"  class="form-control mt-2"
                                       name="password" required autocomplete="new-password" wire:model.lazy="password">
                                @error('password') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="control-label" for="confirmPassword">Confirm Password:</label>
                                <input type="password" id="confirmPassword"  class="form-control mt-2"
                                       name="password_confirmation" required wire:model.lazy="password_confirmation">

                            </div>

                            <div class="form-group mt-5 row">
                                <div class="col-6 ps-3">
                                    <button type="button" class="btn btn-secondary" wire:click="lastStep">
                                        <i class="fa-solid fa-angle-left me-2"></i>Previous
                                    </button>
                                </div>
                                <div class="col-6 text-end pe-3">
                                    <button type="button" class="btn btn-secondary" wire:click="stepTwoSubmit">
                                        Next<i class="fa-solid fa-angle-right ms-2"></i>
                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--step three-->
            <div class="row setup-content {{ $currentStep != 3 ? 'display-none' : '' }}" id="step-3">
                <div class="col-md-8 mx-auto">
                    <h6 class="text-center fw-bold">Step 2 of 3</h6>
                    <div class="card mt-5 p-lg-5">
                        <div class="card-body p-5">
                            <div class="form-group mt-2">
                                <label for="title" class="control-label">Title for you Profession:</label>
                                <input type="text" name="title" wire:model.lazy="title" id="title" required
                                       class="form-control mt-2">
                                <small>For Example:<span> Urban designer</span> </small>
                                @error('title') <span class="error">{{ $message }}</span> @enderror<br>

                            </div>
                            <div class="form-group mt-2">
                              <h6>Experience Level</h6>
                                @foreach($experiences as $id=>$experience)
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="radio" name="experienceId" id="experience{{$id}}"
                                           wire:model.lazy="experienceId" value="{{$id}}">
                                    <label class="form-check-label " for="experience{{$id}}">
                                        {{$experience}}
                                    </label>
                                </div>
                                @endforeach
                                @error('experienceId') <span class="error">{{ $message }}</span> @enderror<br>

                            </div>


                            <div class="form-group mt-5 row">
                                <div class="col-6 ps-3">
                                    <button type="button" class="btn btn-secondary" wire:click="lastStep">
                                        <i class="fa-solid fa-angle-left me-2"></i>Previous
                                    </button>
                                </div>
                                <div class="col-6 text-end pe-3">
                                    <button type="button" class="btn btn-secondary" wire:click="stepThreeSubmit">
                                        Next<i class="fa-solid fa-angle-right ms-2"></i>
                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--step three-->
            <div class="row setup-content {{ $currentStep != 4 ? 'display-none' : '' }}" id="step-4">
                <div class="col-md-11 mx-auto">
                    <h6 class="text-center fw-bold">Step 3 of 3</h6>
                    <div class="card mt-5 p-lg-5">
                        <div class="card-body p-3">
                            <h6>Select Profession you are interested in</h6>
                            <small>Selection Limited to 5 professions</small>
                            <div class="form-group row">
                                @error('professionId') <span class="error">{{ $message }}</span> @enderror<br>
                                @foreach($professions as $id=>$profession)
                                <div class="col-12 col-sm-6 col-lg-4 p-2">
                                    <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{$id}}"
                                                   id="profession{{$id}}" name="professionId" wire:model.lazy="professionId">
                                            <label class="form-check-label" for="profession{{$id}}">
                                                {{$profession}}
                                            </label>
                                        </div>

                                </div>
                                @endforeach
                            </div>

                            <div class="form-group mt-5 row">
                                <div class="col-6 ps-3">
                                    <button type="button" class="btn btn-secondary" wire:click="lastStep">
                                        <i class="fa-solid fa-angle-left me-2"></i>Previous
                                    </button>
                                </div>
                                <div class="col-6 text-end pe-3">
                                    <button type="button" class="btn btn-secondary" wire:click="stepFourSubmit">
                                        Finish<i class="fa-solid fa-angle-right ms-2"></i>
                                    </button>
                                </div>

                            </div>
                            @if($success)
                                <p>{{$success}}</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
