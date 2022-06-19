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
                    <a href="#" class="btn btn-view d-inline-block float-end"> <i class="fa-solid fa-plus me-1"></i>Add</a>

                </div>
                <div class="card-body">
                    <div class="experience">
                        <div class="text-end">
                            <a href="#" title="Edit" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-square-pen"></i>
                                Edit</a>


                        </div>
                        <div class="work-experience mb-3">
                            <span class="badge skills-set">Graphic design</span>
                            <span class="badge skills-set">Creative Thinking</span>
                            <span class="badge skills-set">Web Design</span>
                            <span class="badge skills-set">Drawing & Painting</span>
                            <span class="badge skills-set">Analytics</span>
                            <span class="badge skills-set">Laravel</span>
                            <span class="badge skills-set">Graphic design</span>
                            <span class="badge skills-set">Creative Thinking</span>
                            <span class="badge skills-set">Web Design</span>
                            <span class="badge skills-set">Drawing & Painting</span>
                            <span class="badge skills-set">Analytics</span>
                            <span class="badge skills-set">Laravel</span>


                        </div>
                    </div>





                </div>


            </div>

            <!--Languages-->
            <div class="card mt-2">
                <div class="card-header">
                    <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-globe"></i></span> Languages</h2>
                    <a href="#" class="btn btn-view d-inline-block float-end"> <i class="fa-solid fa-plus me-1"></i>Add</a>

                </div>
                <div class="card-body">
                   <div class="experience">
                        <div class="text-end">
                            <a href="#" title="Edit" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-square-pen"></i>
                                Edit</a>

                            <a href="#" title="Delete" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-trash-can"></i>
                                Delete</a>
                        </div>
                        <div class="work-experience">
                            <h6 class="fw-bold">Swahili</h6>
                            <p class="fw-bold">Spoken: Fluent. Writen: Fluent</p>

                            <hr class="dotted">
                        </div>
                    </div>

                    <div class="experience">
                        <div class="text-end">
                            <a href="#" title="Edit" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-square-pen"></i>
                                Edit</a>

                            <a href="#" title="Delete" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-trash-can"></i>
                                Delete</a>
                        </div>
                        <div class="work-experience">
                            <h6 class="fw-bold">English</h6>
                            <p class="fw-bold">Spoken: Fluent. Writen: Fluent</p>

                            <hr class="dotted">
                        </div>
                    </div>





                </div>


            </div>

            <!--Certifications-->
            <div class="card mt-2">
                <div class="card-header">
                    <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-award"></i></span> Certifications & Awards</h2>
                    <a href="#" class="btn btn-view d-inline-block float-end"> <i class="fa-solid fa-plus me-1"></i>Add</a>

                </div>
                <div class="card-body">
                   <div class="experience">
                        <div class="text-end">
                            <a href="#" title="Edit" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-square-pen"></i>
                                Edit</a>

                            <a href="#" title="Delete" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-trash-can"></i>
                                Delete</a>
                        </div>
                        <div class="work-experience">
                            <h6 class="fw-bold">Google Digital Marketer</h6>
                            <p class="fw-bold">Coursera. <span>2021</span></p>

                            <hr class="dotted">
                        </div>
                    </div>

                    <div class="experience">
                        <div class="text-end">
                            <a href="#" title="Edit" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-square-pen"></i>
                                Edit</a>

                            <a href="#" title="Delete" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-trash-can"></i>
                                Delete</a>
                        </div>
                        <div class="work-experience">
                            <h6 class="fw-bold">Database Security Analyst</h6>
                            <p class="fw-bold">Cisco Technologies. <span>2020</span></p>

                            <hr class="dotted">
                        </div>
                    </div>





                </div>


            </div>

            <!--Associations-->
            <div class="card mt-2">
                <div class="card-header">
                    <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-user-group"></i></span> Professional Associations</h2>
                    <a href="#" class="btn btn-view d-inline-block float-end"> <i class="fa-solid fa-plus me-1"></i>Add</a>

                </div>
                <div class="card-body">
                   <div class="experience">
                        <div class="text-end">
                            <a href="#" title="Edit" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-square-pen"></i>
                                Edit</a>

                            <a href="#" title="Delete" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-trash-can"></i>
                                Delete</a>
                        </div>
                        <div class="work-experience">
                            <h6 class="fw-bold">Kenya Institute of Planners</h6>
                            <p class="fw-bold">Member</p>

                            <hr class="dotted">
                        </div>
                    </div>

                    <div class="experience">
                        <div class="text-end">
                            <a href="#" title="Edit" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-square-pen"></i>
                                Edit</a>

                            <a href="#" title="Delete" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-trash-can"></i>
                                Delete</a>
                        </div>
                        <div class="work-experience">
                            <h6 class="fw-bold">Architects Association of Kenya</h6>
                            <p class="fw-bold">Secretary</p>

                            <hr class="dotted">
                        </div>
                    </div>





                </div>


            </div>

            <!--Hobbies-->
            <div class="card mt-2">
                <div class="card-header">
                    <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-camera"></i></span> Hobbies</h2>
                    <a href="#" class="btn btn-view d-inline-block float-end"> <i class="fa-solid fa-plus me-1"></i>Add</a>

                </div>
                <div class="card-body">
                    <div class="experience">
                        <div class="text-end">
                            <a href="#" title="Edit" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-square-pen"></i>
                                Edit</a>


                        </div>
                        <div class="work-experience mb-3">
                            <span class="badge skills-set">listening to music</span>
                            <span class="badge skills-set">writing</span>
                            <span class="badge skills-set">Singing</span>



                        </div>
                    </div>





                </div>


            </div>

            <!--Associations-->
            <div class="card mt-2">
                <div class="card-header">
                    <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-address-card"></i></span> References</h2>
                    <a href="#" class="btn btn-view d-inline-block float-end"> <i class="fa-solid fa-plus me-1"></i>Add</a>

                </div>
                <div class="card-body">
                   <div class="experience">
                        <div class="text-end">
                            <a href="#" title="Edit" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-square-pen"></i>
                                Edit</a>

                            <a href="#" title="Delete" class="fw-bold  text-decoration-none m-2"><i class="fa-solid fa-trash-can"></i>
                                Delete</a>
                        </div>
                        <div class="work-experience">
                            <h6 class="fw-bold">Bonface Mureithi • Marketing Director Winglobal Ltd</h6>
                            <p class="fw-bold">Manager</p>
                            <p>bonifacemureithi@happynation.co.ke, +254 721125156</p>

                            <hr class="dotted">
                        </div>
                    </div>







                </div>


            </div>


        </div>
        <div class="col-12 col-md-4 p-1">
            <div class="card p-3">
                <h2 class="fs-5">Curriculum Vitae(CV)</h2>
                <div class="cv-panel p-3">
                    <a href="#" target="_blank" title="{{Auth::user()->name}} CV" class="fs-6 text-decoration-none fw-bold">
                        <i class="fa-solid fa-file-lines me-2"></i>nyawach_cv.pdf <i class="fa-solid fa-download float-end"></i>
                    </a>
                </div>

                <button type="button" class=" btn btn-view mt-3">
                    Upload New
                </button>
            </div>
            <div class="card p-3 mt-2">
                <h2 class="fs-5">Notifications</h2>
                <p>You have <span>4</span> pending notifications</p>
                <a href="#" class="text-decoration-none fw-bold">See all <i class="fa-solid fa-right-long ms-2"></i></a>
            </div>

        </div>
    </div>


  </section>

</div>
