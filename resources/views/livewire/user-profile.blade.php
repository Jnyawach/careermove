<div>
     <!--Dashboard Menu-->
  @include('includes.dashboard-menu')
  <section class="dashboard-body p-3 ">
    <div class="card">
        <div class="card-header">
            <h2 class="fs-5 mt-2"><span class="profile-icon"><i class="fa-solid fa-user"></i></span> My Profile</h2>


        </div>
        <div class="card-body p-3">
            <div class="row">
               <div class="col-12 col-md-3">
                    <div class="mb-3">
                        @if ($photo)

                        <img src="{{ $photo->temporaryUrl() }}" class="img-fluid img-thumbnail" style="width:100px">

                        @else
                        <img src="{{asset(Auth::user()->getFirstMediaUrl('profile')? Auth::user()->getFirstMediaUrl('profile','profile-thumb'):'/images/user-icon.png' )}}"
                            style="width:100px" class="img-fluid img-thumbnail">

                        @endif
                        <div>
                            @error('photo') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <form wire:submit.prevent="updatePicture">



                            <div class="mt-2">
                            <label for="formFile" class="btn btn-view m-1">
                                <i class="fa-solid fa-camera"></i> Change
                                <input class="form-control d-none" type="file" id="formFile" wire:model="photo">
                            </label>

                            <button type="submit" class="btn btn-secondary m-1">Save</button>


                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-9">
                    <form wire:submit.prevent="updateUser">
                    <div class="form-group required row">
                        <div class="col-12 col-md-6">
                            <label class="control-label" for="gender">Gender</label>
                            <select class="form-select mt-3" id="gender" name="gender" required wire:model="gender">
                                <option selected value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                                <option value="Prefer not to disclose">Prefer not to disclose</option>
                              </select>
                              @error('gender') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="control-label" for="birthday">Date of Birth</label>
                            <input type="date" name="birthday"  id="birthday" required style="height: 45px"
                           class="form-control mt-3" placeholder="dd-mm-yyyy" wire:model="birthday">
                           @error('birthday') <span class="error">{{ $message }}</span> @enderror
                        </div>


                    </div>

                    <div class="form-group required row mt-2">
                        <div class="col-12 col-md-6">
                            <label class="control-label" for="name">First Name</label>
                            <input type="text" name="name"  id="name" required wire:model="name"
                           class="form-control mt-3">
                           @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="control-label" for="lastName">Last Name</label>
                            <input type="text" name="lastName"  id="lastName" required wire:model="lastName"
                           class="form-control mt-3" >
                           @error('lastName') <span class="error">{{ $message }}</span> @enderror
                        </div>


                    </div>
                    <hr class="dotted">
                    <div class="form-group mt-2 required row">
                        <div class="col-12 col-md-6">
                            <label class="control-label" for="title">Title</label>
                            <input type="text" name="title" id="title" required class="form-control mt-3" placeholder="eg. Accountant"
                            wire:model="title">
                            @error('title') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12 col-md-3">
                            <label class="control-label" for="cellphone">Cellphone</label>
                            <input type="text" name="cellphone" id="cellphone" required class="form-control mt-3" placeholder="eg. +254710101010"
                            wire:model="cellphone">
                            @error('cellphone') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 col-md-3">
                            <label class="control-label" for="experience">Experience</label>
                            <select class="form-select mt-3" id="experience" name="experience" required wire:model="experience">
                                <option selected value="">Experience Level</option>
                                @foreach ($experiences  as $expert=>$years )
                                <option value="{{$expert}}">{{$years}}</option>
                                @endforeach


                              </select>

                              @error('experience') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>





                    <div class="form-group mt-3 text-end">
                        <a href="{{route('dashboard.index')}}" class="btn btn-view">Cancel</a>
                        <button type="submit" class="btn btn-secondary">
                            Save
                        </button>

                    </div>
                </div>

                </div>
            </div>
        </div>

    </div>
  </section>

</div>
