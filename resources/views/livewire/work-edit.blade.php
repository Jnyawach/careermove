<div>
    @include('includes.dashboard-menu')
    <section class="dashboard-body p-3">
        <div class="card">
            <div class="card-header">
                <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-briefcase"></i></span> Work Experience</h2>


            </div>
            <div class="card-body">
                <form wire:submit.prevent='updateWork'>
                    <div class="form-group row required mt-3">
                        <div class="col-12 col-md-6 col-lg-4">
                            <label class="control-label" for="organization">Employer Name:</label>
                            <input type="text" name="organization"  id="organization" required wire:model.lazy="organization"
                           class="form-control mt-3">
                           @error('organization') <span class="error">{{ $message }}</span> @enderror

                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <label class="control-label" for="title">Job title:</label>
                            <input type="text" name="title"  id="title" required wire:model.lazy="title"
                           class="form-control mt-3">
                           @error('title') <span class="error">{{ $message }}</span> @enderror

                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label class="control-label" for="gender">Size of Organization:</label>
                            <select class="form-select mt-3" id="size" name="size" required wire:model.lazy="size">
                                <option selected value="">Select Ogarnization Size</option>
                                <option value="1-10 People">1-10 People</option>
                                <option value="10-20 People">10-20 People</option>
                                <option value="20-50 People">20-50 People</option>
                                <option value="50-100 People">50-100 People</option>
                                <option value="100-500 People">100-500 People</option>
                                <option value="500-1000 People">500-1000 People</option>
                                <option value="1000+ People">1000+ People</option>


                              </select>
                              @error('size') <span class="error">{{ $message }}</span> @enderror
                        </div>



                    </div>

                    <div class="form-group mt-3 required row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <label class="control-label" for="profession">Job Category:</label>
                            <select class="form-select mt-3" id="profession" name="profession" required wire:model.lazy="profession">
                                <option selected value="">Select Job Profession</option>
                                @foreach ($professions as $profession )
                                <option value="{{$profession->id}}">{{$profession->name}}</option>
                                @endforeach


                              </select>
                              @error('profession') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label class="control-label" for="industry">Industry of the Employer:</label>
                            <select class="form-select mt-3" id="industry" name="industry" required wire:model.lazy="industry">
                                <option selected value="">Select Employer Industry</option>
                                @foreach ($industries as $industry )
                                <option value="{{$industry->id}}">{{$industry->name}}</option>
                                @endforeach


                              </select>
                              @error('industry') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12 col-md-6 col-lg-2">
                            <label class="control-label" for="start">Start date:</label>
                            <input type="date" name="start"  id="start" required wire:model.lazy="start"
                           class="form-control mt-3" style="height: 45px">
                           @error('start') <span class="error">{{ $message }}</span> @enderror

                        </div>
                        <div class="col-12 col-md-6 col-lg-2">
                            <label class="control-label" for="end">End date:</label>
                            <input type="date" name="end"  id="end" required wire:model="end"
                           class="form-control mt-3" style="height: 45px" @if($current)disabled @endif>
                           @error('end') <span class="error">{{ $message }}</span> @enderror
                           <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="1" id="current" wire:model.lazy="current">
                            <label class="form-check-label" for="current">
                              Current work
                            </label>
                          </div>

                        </div>

                    </div>


                    <div class="form-group required mt-3">
                        <label for="achievement" class="control-label">Work Experience Summary:</label>
                        <div>
                            <small>Tell briefly about your achievements and responsibilities.  </small>
                            <small>Use colon separated points for example,<span> Spearheaded the introduction of peer-to-peer user communication : Helped the company grow sales by 10%</span></small>
                        </div>

                        <textarea class="form-control mt-2" id="achievement" wire:model.lazy="achievement"
                            style="height: 150px" name="achievement" required placeholder="Use colon separated points">{{$achievement}}</textarea>
                            @error('achievement') <span class="error">{{ $message }}</span> @enderror

                    </div>
                    <hr>
                    <div class="form-group mt-3 text-end">
                        <a href="{{route('dashboard.index')}}" class="btn btn-view">Cancel</a>
                        <button type="submit" class="btn btn-secondary">
                            Save
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

