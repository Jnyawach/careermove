<div>
    @include('includes.dashboard-menu')
    <section class="dashboard-body p-3">
        <div class="card">
            <div class="card-header">
                <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-graduation-cap"></i></span> Education</h2>


            </div>
            <div class="card-body">
                <form wire:submit.prevent='createEducation'>
                    <div class="form-group row required mt-3">
                        <div class="col-12 col-md-6 col-lg-4">
                            <label class="control-label" for="institution">Institution Name:</label>
                            <input type="text" name="institution"  id="institution" required wire:model.lazy="institution"
                           class="form-control mt-3">
                           @error('institution') <span class="error">{{ $message }}</span> @enderror

                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <label class="control-label" for="degree">Course/Degree Name:</label>
                            <input type="text" name="degree"  id="degree" required wire:model.lazy="degree"
                           class="form-control mt-3">
                           @error('degree') <span class="error">{{ $message }}</span> @enderror

                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label class="control-label" for="gender">Education Level:</label>
                            <select class="form-select mt-3" id="education_level" name="education_level" required wire:model.lazy="education_level">
                                <option selected value="">Select Education level</option>
                                <option value="Primary School">Primary School</option>
                                <option value="High, Secondary School">High, Secondary School</option>
                                <option value="Vocational School">Vocational School</option>
                                <option value="Diploma/Associate Degree">Diploma/Associate Degree</option>
                                <option value="Bachelor's Degree">Bachelor's Degree</option>
                                <option value="Post-graduate Education">Post-graduate Education</option>

                              </select>
                              @error('education_level') <span class="error">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <hr class="mt-5 dotted">
                    <div class="form-group mt-3 required row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <label class="control-label" for="grade">Grade:</label>
                            <input type="text" name="grade"  id="grade" required wire:model.lazy="grade"
                           class="form-control mt-3">
                           @error('grade') <span class="error">{{ $message }}</span> @enderror

                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <label class="control-label" for="start">Start date:</label>
                            <input type="date" name="start"  id="start" required wire:model.lazy="start"
                           class="form-control mt-3" style="height: 45px">
                           @error('start') <span class="error">{{ $message }}</span> @enderror

                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label class="control-label" for="end">End date:</label>
                            <input type="date" name="end"  id="end" required wire:model="end"
                           class="form-control mt-3" style="height: 45px" @if($current)disabled @endif>
                           @error('end') <span class="error">{{ $message }}</span> @enderror
                           <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="1" id="current" wire:model.lazy="current">
                            <label class="form-check-label" for="current">
                              I am currently a student
                            </label>
                          </div>

                        </div>

                    </div>
                    <div class="form-group required">
                        <label for="education_summary" class="control-label">Study summary</label>
                        <div>
                        <small>Tell briefly about your education: what disciplines did you study, what projects did you do? </small>
                        <small>Use colon separated points for example,<span> Bachelor of the built environment in Urban Design and Development: Second Class Upper division</span></small>
                        </div>

                        <textarea class="form-control mt-2" id="education_summary" wire:model.lazy="education_summary"
                            style="height: 200px" name="education_summary" required placeholder="Use colon separated points">{{$education_summary}}</textarea>
                            @error('education_summary') <span class="error">{{ $message }}</span> @enderror

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
