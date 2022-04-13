<div>
    <h5>{{$name}} {{$lastName}}</h5>
    <p>Email: <span>{{$email}}</span></p>
    <div class="row">
        <div class="col-md-6 col-lg-4 p-2">
            <div class="card p-5">
                <div class="card-body">

                    <h6>Update account info</h6>
                    <form wire:submit.prevent="bioUpdate">
                        <div class="form-group mt-2">
                            <label for="name" class="control-label">First Name:</label>
                            <input type="text" name="name" wire:model.lazy="name" id="name" required
                                   class="form-control mt-2">
                            @error('name') <span class="error">{{ $message }}</span> @enderror<br>

                        </div>
                        <div class="form-group ">
                            <label for="lastName" class="control-label">Last Name:</label>
                            <input type="text" name="lastName" wire:model.lazy="lastName" id="lastName" required
                                   class="form-control mt-2">
                            @error('lastName') <span class="error">{{ $message }}</span> @enderror<br>

                        </div>

                        <button type="submit" class="btn btn-secondary ">
                           Save
                        </button>
                        @if($success)
                            <div class="alert alert-success mt-2 p-1">
                                <p>{{$success}}</p>
                            </div>

                        @endif
                    </form>

                </div>

            </div>
        </div>
        <div class="col-md-6 col-lg-4 p-2">
            <div class="card p-5">
                <div class="card-body">
                    <h6>Update Password</h6>
                    <form wire:submit.prevent="passwordUpdate">
                        <div class="form-group mt-2">
                            <label class="control-label" for="password">New Password:</label>
                            <input type="password" id="password"  class="form-control mt-2"
                                   name="password" required autocomplete="new-password" wire:model.lazy="password">
                            @error('password') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label class="control-label" for="confirmPassword">Confirm New Password:</label>
                            <input type="password" id="confirmPassword"  class="form-control mt-2"
                                   name="password_confirmation" required wire:model.lazy="password_confirmation">

                        </div>

                        <button type="submit" class="btn btn-secondary mt-3">
                            Save
                        </button>
                        @if($pass_success)
                            <div class="alert alert-success mt-2 p-1">
                                <p>{{$pass_success}}</p>
                            </div>

                        @endif
                    </form>

                </div>

            </div>
        </div>
        <div class="col-md-6 col-lg-4 p-2">
            <div class="card p-5">
                <div class="card-body">

                    <h6>Professional title and Experience</h6>
                    <form wire:submit.prevent="experienceUpdate">
                        <div class="form-group mt-2">
                            <label for="title" class="control-label">Title for you Profession:</label>
                            <input type="text" name="title" wire:model.lazy="title" id="title" required
                                   class="form-control mt-2">
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

                        <button type="submit" class="btn btn-secondary ">
                            Save
                        </button>
                        @if($exp_success)
                            <div class="alert alert-success mt-2 p-1">
                                <p>{{$exp_success}}</p>
                            </div>

                        @endif
                    </form>

                </div>

            </div>
        </div>




    </div>
    <div class="row">
        <div class="col-md-12 p-2">
            <div class="card p-5">
                <div class="card-body">

                    <h6>Professional title and Experience</h6>
                      @if($professionId->count()>0)
                          <h6>Selected Professions</h6>
                    <div >
                          @foreach($professionId as $prof)
                        <div class="d-inline-block m-2">
                            <form wire:submit.prevent="professionDelete({{$prof->id}})">
                                <button type="submit" class="btn btn-view " title="Remove Profession">
                                    {{$prof->name}}<i class="fa-solid fa-xmark ms-2"></i>
                                </button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <hr>

                        <div >
                            @foreach($professions as $id=>$profession)
                                <div class="d-inline-block m-2">
                                    <form wire:submit.prevent="professionUpdate({{$id}})">
                                        <button type="submit" class="btn btn-secondary " title="Add Profession">
                                            {{$profession}}<i class="fa-solid fa-check ms-2"></i>
                                        </button>
                                    </form>
                                </div>

                            @endforeach
                        </div>

                </div>

            </div>
        </div>
    </div>

</div>
