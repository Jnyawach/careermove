<div>
    <!--Dashboard Menu-->
  @include('includes.dashboard-menu')


  <section class="dashboard-body p-3">
    @include('includes.status')
    <div class="row">
        <div class="col-12 col-md-8 p-1">
            <!--user profile details-->
            <div class="card p-3">
                <div class="text-end">
                <a href="{{route('accounts.index')}}" title="Edit Profile"
                class="fw-bold float-end text-decoration-none"><i class="fa-solid fa-square-pen"></i> Edit</a>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-4">
                        <a href="{{route('accounts.index')}}" title="profile">
                            <img src="{{asset(Auth::user()->getFirstMediaUrl('profile')? Auth::user()->getFirstMediaUrl('profile','profile-thumb'):'/images/user-icon.png' )}}"
                            style="width:100px" class="img-fluid img-thumbnail rounded-circle">
                        </a>
                    </div>
                    <div class="col-11 col-lg-8 align-self-center">

                        <h2 class="fs-5">Welcome back, {{Auth::user()->name}}</h2>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p><span><i class="fa-regular fa-envelope"></i></span> {{Auth::user()->email}}</p>
                                <p><span><i class="fa-solid fa-mobile"></i></span>{{Auth::user()->profile->cellphone}}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p><span><i class="fa-solid fa-link me-2"></i></span> {{Auth::user()->profile->website?Auth::user()->profile->website:'Missing Website'}}</p>
                                <p><span><i class="fa-brands fa-linkedin me-2"></i></span> {{Auth::user()->profile->linkedin?Auth::user()->profile->linkedin:'Missing Linkedin Profile'}}</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <!--career introduction-->
            <div class="card mt-2">
                <div class="card-header">
                    <h2 class="fs-5 mt-2"><span class="profile-icon"><i class="fa-solid fa-book-open"></i></span> Career Introduction</h2>

                </div>
                <div class="card-body">
                    @if ($summary)
                    <a href="{{route('summary.edit',$summary->id)}}" title="Edit career introduction"
                        class="fw-bold float-end text-decoration-none"><i class="fa-solid fa-square-pen"></i> Edit</a>
                        <p>{{$summary->summary}}</p>
                           @else
                           <a href="{{route('summary.create')}}" class="btn btn-view d-inline-block"> <i class="fa-solid fa-plus me-1"></i>Add career summary</a>
                    @endif


                </div>



            </div>


            <!--Work Experience-->
            <div class="card mt-2">
                <div class="card-header">
                    <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-briefcase"></i></span> Work Experience</h2>
                    <a href="{{route('work.create')}}" class="btn btn-view d-inline-block float-end"> <i class="fa-solid fa-plus me-1"></i>Add</a>

                </div>
                <div class="card-body">
                    @if ($works->count()>0)
                    @foreach ($works as $work )
                    <div class="experience">
                        <div class="text-end">
                            <a href="{{route('work.edit',$work->id)}}" title="Edit" class="fw-bold  text-decoration-none m-1 p-0 btn btn-link"><i class="fa-solid fa-square-pen"></i>
                                Edit</a>

                                <button type="button" class="fw-bold text-decoration-none m-1 p-0 btn btn-link" wire:click="deleteWork({{$work->id}})">
                                    <i class="fa-solid fa-trash-can"></i> Delete
                                </button>

                        </div>
                        <div wire:loading.remove>
                            <div class="work-experience">
                                <h6 class="fw-bold">{{$work->title}}</h6>
                                <p class="fw-bold mb-0">{{$work->organization}}</p>
                                <p class="mt-0"><span>{{\Carbon\Carbon::parse($work->start)->isoFormat('MMM YYYY')}} - {{$work->end?\Carbon\Carbon::parse($work->end)->isoFormat('MMM YYYY'):'Currently'}}</span></p>
                                <p><span>Responsibilities</span></p>
                                <ul class="fw-bold">
                                    @foreach (explode(':',$work->responsibility) as $responsibility )
                                    <li>{{$responsibility}}</li>

                                    @endforeach
                                </ul>
                                <p><span>Achievements</span></p>
                                <ul class="fw-bold">
                                    @foreach (explode(':',$work->achievement) as $achievement )
                                    <li>{{$achievement}}</li>

                                    @endforeach
                                </ul>
                                <hr class="dotted">
                            </div>
                        </div>
                    </div>

                    @endforeach
                    @else
                    <a href="{{route('work.create')}}" class="btn btn-view d-inline-block"> <i class="fa-solid fa-plus me-1"></i>Add work experience</a>
                    @endif






                </div>


            </div>

            <!--Education-->
            <div class="card mt-2">
                <div class="card-header">
                    <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-graduation-cap"></i></span> Education</h2>
                    <a href="{{route('education.create')}}" class="btn btn-view d-inline-block float-end"> <i class="fa-solid fa-plus me-1"></i>Add</a>

                </div>
                <div class="card-body">
                    @if ($educations->count()>0)
                    @foreach ($educations as $education )
                    <div wire:loading.remove>
                    <div class="experience">
                        <div class="text-end">
                            <a href="{{route('education.edit',$education->id)}}" title="Edit" class="fw-bold  text-decoration-none m-1 p-0 btn btn-link"><i class="fa-solid fa-square-pen"></i>
                                Edit</a>

                                <button type="button" class="fw-bold text-decoration-none m-1 p-0 btn btn-link" wire:click="deleteEducation({{$education->id}})">
                                    <i class="fa-solid fa-trash-can"></i> Delete
                                </button>

                        </div>
                        <div class="work-experience">
                            <h6 class="fw-bold">{{$education->degree}}</h6>
                            <p class="fw-bold mb-0">{{$education->institution}}</p>
                            <p class="m-0"><span class="fw-bold">{{\Carbon\Carbon::parse($education->start)->isoFormat('MMM YYYY')}} - {{$education->end?\Carbon\Carbon::parse($education->end)->isoFormat('MMM YYYY'):'Currently'}}</span></p>
                            <p class="m-0"><span>Grade:</span> {{$education->grade}}</p>
                            <ul class="fw-bold">
                            @foreach (explode(':',$education->education_summary) as $resp )
                            <li>{{$resp}}</li>

                            @endforeach
                            </ul>
                            <hr class="dotted">
                        </div>
                    </div>
                    </div>
                    @endforeach
                    @else
                    <a href="{{route('education.create')}}" class="btn btn-view"> <i class="fa-solid fa-plus me-1"></i>Add Education</a>
                    @endif



                </div>


            </div>

            <!--Skills-->
            <div class="card mt-2">
                <div class="card-header">
                    <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-trophy"></i></span> Skills Set</h2>
                    @if ($skills->count()<1)
                    <a href="{{route('skills.create')}}" class="btn btn-view d-inline-block float-end"> <i class="fa-solid fa-plus me-1"></i>Add</a>
                    @endif


                </div>
                <div class="card-body">
                    @if ($skills->count()>0)
                    @foreach ($skills as $skill )
                    <div class="experience">
                        <div class="text-end">
                            <a href="{{route('skills.edit', $skill->id)}}" title="Edit" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-square-pen"></i>
                                Edit</a>


                        </div>
                        <div class="work-experience mb-3">
                            @foreach (explode(':', $skill->skills) as $pill)
                            <span class="badge skills-set">{{$pill}}</span>
                            @endforeach


                        </div>
                    </div>
                    @endforeach

                    @else
                    <h6>You don't have any skills. Please add a few<h6>

                    @endif






                </div>


            </div>

            <!--Languages-->
            <div class="card mt-2">
                <div class="card-header">
                    <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-globe"></i></span> Languages</h2>
                    <a href="{{route('languages.create')}}" class="btn btn-view d-inline-block float-end"> <i class="fa-solid fa-plus me-1"></i>Add</a>

                </div>
                <div class="card-body">
                    @if ($languages->count()>0)
                    @foreach ($languages as $language)
                    <div wire:loading.remove>
                    <div class="experience">
                        <div class="text-end">
                            <a href="{{route('languages.edit',$language->id)}}" title="Edit" class="fw-bold  text-decoration-none m-1 p-0 btn btn-link"><i class="fa-solid fa-square-pen"></i>
                                Edit</a>

                                <button type="button" class="fw-bold text-decoration-none m-1 p-0 btn btn-link" wire:click="deleteLanguage({{$language->id}})">
                                    <i class="fa-solid fa-trash-can"></i> Delete
                                </button>

                        </div>
                        <div class="work-experience">
                            <h6 class="fw-bold">{{$language->name}}</h6>
                            <p class="fw-bold">Spoken: {{$language->spoken}}. Writen: {{$language->writen}}</p>

                            <hr class="dotted">
                        </div>
                    </div>
                    </div>
                    @endforeach
                    @else
                    <h6>No Language attached to your profile. Please add at least on language</h6>
                    @endif








                </div>


            </div>

            <!--Certifications-->
            <div class="card mt-2">
                <div class="card-header">
                    <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-award"></i></span> Certifications & Awards</h2>
                    <a href="{{route('awards.create')}}" class="btn btn-view d-inline-block float-end"> <i class="fa-solid fa-plus me-1"></i>Add</a>

                </div>
                <div class="card-body">
                    @if ($awards->count()>0)
                    @foreach ($awards as $award)
                    <div wire:loading.remove>
                        <div class="experience">
                            <div class="text-end">
                                <a href="{{route('awards.edit',$award->id)}}" title="Edit"
                                    class="fw-bold  text-decoration-none m-1 p-0 btn btn-link"><i class="fa-solid fa-square-pen"></i>
                                    Edit</a>

                                <button type="button" class="fw-bold text-decoration-none m-1 p-0 btn btn-link"
                                    wire:click="deleteAward({{$award->id}})">
                                    <i class="fa-solid fa-trash-can"></i> Delete
                                </button>

                            </div>
                            <div class="work-experience">
                                <h6 class="fw-bold">{{$award->title}}</h6>
                                <p class="fw-bold">{{$award->organization}}. <span>{{\Carbon\Carbon::parse($award->when)->isoFormat('MMM
                                        YYYY')}}</span></p>

                                <hr class="dotted">
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h6>No Certifications/awards attached to your profile. Please add at least on award/certification</h6>
                    @endif






                </div>


            </div>

            <!--Associations-->
            <div class="card mt-2">
                <div class="card-header">
                    <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-user-group"></i></span> Professional Associations</h2>
                    <a href="{{route('associations.create')}}" class="btn btn-view d-inline-block float-end"> <i class="fa-solid fa-plus me-1"></i>Add</a>

                </div>
                <div class="card-body">
                    @if ($associations->count()>0)
                    @foreach ($associations as $association)
                    <div wire:loading.remove>
                        <div class="experience">
                            <div class="text-end">
                                <a href="{{route('associations.edit',$association->id)}}" title="Edit"
                                    class="fw-bold  text-decoration-none m-1 p-0 btn btn-link"><i class="fa-solid fa-square-pen"></i>
                                    Edit</a>

                                <button type="button" class="fw-bold text-decoration-none m-1 p-0 btn btn-link"
                                    wire:click="deleteAssociation({{$association->id}})">
                                    <i class="fa-solid fa-trash-can"></i> Delete
                                </button>

                            </div>
                            <div class="work-experience">
                                <h6 class="fw-bold">{{$association->organization}}</h6>
                                <p class="fw-bold">{{$association->role}}. Since <span>{{\Carbon\Carbon::parse($association->when)->isoFormat('MMM
                                    YYYY')}}</span></p>

                                <hr class="dotted">
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <h6>No Associations attached to your profile. Please add at least on assciations</h6>
                @endif

                     </div>


            </div>

            <!--Hobbies-->
            <div class="card mt-2">
                <div class="card-header">
                    <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-camera"></i></span> Hobbies</h2>
                    @if ($hobbies->count()<1)
                    <a href="{{route('hobbies.create')}}" class="btn btn-view d-inline-block float-end"> <i class="fa-solid fa-plus me-1"></i>Add</a>
                    @endif

                </div>
                <div class="card-body">
                    @if ($hobbies->count()>0)
                    @foreach ($hobbies as $hobby )
                    <div class="experience">
                        <div class="text-end">
                            <a href="{{route('hobbies.edit', $hobby->id)}}" title="Edit" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-square-pen"></i>
                                Edit</a>


                        </div>
                        <div class="work-experience mb-3">
                            @foreach (explode(':', $hobby->hobbies) as $pill)
                            <span class="badge skills-set">{{$pill}}</span>
                            @endforeach


                        </div>
                    </div>
                    @endforeach

                    @else
                    <h6>You don't have any Hobbies. Please add a few<h6>

                    @endif






                </div>


            </div>

            <!--Associations-->
            <div class="card mt-2">
                <div class="card-header">
                    <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-address-card"></i></span> References</h2>
                    <a href="{{route('references.create')}}" class="btn btn-view d-inline-block float-end"> <i class="fa-solid fa-plus me-1"></i>Add</a>

                </div>
                <div class="card-body">
                    @if ($references->count()>0)
                    @foreach ($references as $reference)
                    <div wire:loading.remove>
                        <div class="experience">
                            <div class="text-end">
                                <a href="{{route('references.edit',$reference->id)}}" title="Edit"
                                    class="fw-bold  text-decoration-none m-1 p-0 btn btn-link"><i class="fa-solid fa-square-pen"></i>
                                    Edit</a>

                                <button type="button" class="fw-bold text-decoration-none m-1 p-0 btn btn-link"
                                    wire:click="deleteReference({{$reference->id}})">
                                    <i class="fa-solid fa-trash-can"></i> Delete
                                </button>

                            </div>
                            <div class="work-experience">
                                <h6 class="fw-bold">{{$reference->name}} • {{$reference->title}} {{$reference->organization}}</h6>
                                <p class="fw-bold">{{$reference->relation}}</p>
                                <p>{{$reference->email}}, {{$reference->cellphone}}</p>

                                <hr class="dotted">
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <h6>No Associations attached to your profile. Please add at least on assciations</h6>
                @endif








                </div>


            </div>


        </div>
        <div class="col-12 col-md-4 p-1">
            <div class="card p-3">
                <h2 class="fs-5">Curriculum Vitae(CV)</h2>
                @if ($cv)
                <div class="cv-panel p-3">
                    <a href="{{$cv->getUrl()}}"  title="{{Auth::user()->name}} CV" class="fs-6 text-decoration-none fw-bold">
                        <i class="fa-solid fa-file-lines me-2"></i>{{$cv->name}} <i class="fa-solid fa-download float-end"></i>
                    </a>
                </div>
                @endif

                <div class="mt-3">

                        @error('resume') <span class="error">{{ $message }}</span> @enderror
                    <label for="formFile" class="form-label btn btn-view w-100">Upload New</label>
                    <input class="form-control d-none" type="file" id="formFile" wire:model="resume">

                  </div>


            </div>
            

        </div>
    </div>


  </section>

</div>
