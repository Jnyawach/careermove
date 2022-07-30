<div>
    @if($preview==false)
    <section>
        <div class="row">
            <div class="col-12 d-block d-lg-none text-end p-5">
                <button type="button" class="btn btn-success" wire:click="ShowPreview">
                    <i class="fa-regular fa-eye me-3"></i>Preview
                </button>
            </div>
        </div>
    </section>
    @endif
    @if($preview)
        <section>
            <div class="row">
                <div class="col-12 p-2 resume-preview mx-auto">
                    <div class="cv-preview p-3 d-flex justify-content-center">
                        <div class="resume-container">

                            @include('templates.'.$resume->template->folder.'.index')
                        </div>


                    </div>
                    <div class="text-center  mt-4">

                        <button type="button" class="btn btn-primary" wire:click="ClosePreview">
                            <i class="fa-solid fa-xmark me-3"></i>Close
                        </button>
                        <button type="button" class="btn btn-primary" wire:click="CompleteResume">Finish & Download</button>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if($preview==false)
   <section >
       <div class="row">
           <div class="col-12 col-lg-6 p-3 p-lg-5">
               @if($page==1)
               <div class="login-request">
                   <h1>Welcome to Careermove CV Creator</h1>
                   <p class="fs-5">The CV document will be created based on your Careermove
                       Profile, so make sure your profile is up-to-date with the
                       latest changes. And remember, you can update your Careermove
                       Profile and CV document at any time!</p>

               </div>
                   <hr class="mt-5">
                   <a href="{{route('dashboard.index')}}" title="Profile" class="btn btn-secondary">
                       Edit Profile
                   </a>
                   <button type="button" class="btn btn-primary" wire:click="nextPage">Create CV</button>

                   @endif
               @if($page==2)
                   <div class="category-selection">
                       <h1 class="fs-4">What category do you want to show?</h1>
                       <div class="category switch mt-5">
                           <table class="table">
                               <tbody >
                               <tr>
                                   <td class="fw-bold">1. Personal Info</td>
                                   <td>
                                       @if($resume->personal_info==1)
                                       <button type="button" class="btn-sm btn-danger" wire:click="AddressDisable">Remove</button>
                                       @else
                                           <button type="button" class="btn-sm btn-secondary" wire:click="AddressEnable">Add</button>
                                       @endif
                                   </td>
                               </tr>
                               <tr>
                                   <td class="fw-bold">2. Professional Summary</td>
                                   <td>
                                       @if($resume->intro==1)
                                       <button type="button" class="btn-sm btn-danger "  wire:click="SummaryDisable">Remove</button>
                                       @else
                                           <button type="button" class="btn-sm btn-secondary" wire:click="SummaryEnable">Add</button>
                                       @endif
                                   </td>
                               </tr>
                               <tr>
                                   <td class="fw-bold">3. Work Experience</td>
                                   <td>
                                       @if($resume->experience==1)
                                           <button type="button" class="btn-sm btn-danger "  wire:click="ExperienceDisable">Remove</button>
                                       @else
                                           <button type="button" class="btn-sm btn-secondary" wire:click="ExperienceEnable">Add</button>
                                       @endif
                                   </td>
                               </tr>
                               <tr>
                                   <td class="fw-bold">4. Education</td>
                                   <td>
                                       @if($resume->education==1)
                                           <button type="button" class="btn-sm btn-danger "  wire:click="EducationDisable">Remove</button>
                                       @else
                                           <button type="button" class="btn-sm btn-secondary" wire:click="EducationEnable">Add</button>
                                       @endif
                                   </td>
                               </tr>
                               <tr>
                                   <td class="fw-bold">5. Certifications/Awards</td>
                                   <td>
                                       @if($resume->certifications==1)
                                           <button type="button" class="btn-sm btn-danger "  wire:click="AwardDisable">Remove</button>
                                       @else
                                           <button type="button" class="btn-sm btn-secondary" wire:click="AwardEnable">Add</button>
                                       @endif
                                   </td>
                               </tr>

                               <tr>
                                   <td class="fw-bold">6. References</td>
                                   <td>
                                       @if($resume->references==1)
                                           <button type="button" class="btn-sm btn-danger "  wire:click="ReferenceDisable">Remove</button>
                                       @else
                                           <button type="button" class="btn-sm btn-secondary" wire:click="ReferenceEnable">Add</button>
                                       @endif
                                   </td>
                               </tr>

                               </tbody>
                           </table>
                       </div>

                       <button type="button" class="btn btn-primary" wire:click="Previous">Previous</button>
                       <button type="button" class="btn btn-primary" wire:click="nextPage">Next</button>
                   </div>

                   @endif
               @if($page==3)
                       <h1 class="fs-4">What category do you want to show?</h1>
                       <div class="category switch mt-5">
                           <table class="table">
                               <tbody >

                               <tr>
                                   <td class="fw-bold">7. Soft Skills</td>
                                   <td>
                                       @if($resume->soft_skills==1)
                                           <button type="button" class="btn-sm btn-danger "  wire:click="SoftDisable">Remove</button>
                                       @else
                                           <button type="button" class="btn-sm btn-secondary" wire:click="SoftEnable">Add</button>
                                       @endif
                                   </td>
                               </tr>

                               <tr>
                                   <td class="fw-bold">8. Hard Skills</td>
                                   <td>
                                       @if($resume->hard_skills==1)
                                           <button type="button" class="btn-sm btn-danger "  wire:click="HardDisable">Remove</button>
                                       @else
                                           <button type="button" class="btn-sm btn-secondary" wire:click="HardEnable">Add</button>
                                       @endif
                                   </td>
                               </tr>
                               <tr>
                                   <td class="fw-bold">9. Language</td>
                                   <td>
                                       @if($resume->language==1)
                                           <button type="button" class="btn-sm btn-danger "  wire:click="LanguageDisable">Remove</button>
                                       @else
                                           <button type="button" class="btn-sm btn-secondary" wire:click="LanguageEnable">Add</button>
                                       @endif
                                   </td>
                               </tr>
                               <tr>
                                   <td class="fw-bold">10. Hobbies</td>
                                   <td>
                                       @if($resume->hobbies==1)
                                           <button type="button" class="btn-sm btn-danger "  wire:click="HobbiesDisable">Remove</button>
                                       @else
                                           <button type="button" class="btn-sm btn-secondary" wire:click="HobbiesEnable">Add</button>
                                       @endif
                                   </td>
                               </tr>
                               <tr>
                                   <td class="fw-bold">11. Social Media</td>
                                   <td>
                                       @if($resume->social_media==1)
                                           <button type="button" class="btn-sm btn-danger"  wire:click="SocialDisable">Remove</button>
                                       @else
                                           <button type="button" class="btn-sm btn-secondary" wire:click="SocialEnable">Add</button>
                                       @endif
                                   </td>
                               </tr>


                               </tbody>
                           </table>
                       </div>
                       <button type="button" class="btn btn-primary" wire:click="Previous">Previous</button>
                       <button type="button" class="btn btn-primary" wire:click="nextPage">Next</button>
                   @endif
                   @if($page==4)
                       <h1 class="fs-4">What work experience do you want to keep?</h1>
                       <div class="mt-5">
                           <table class="table">
                               <tbody>
                               @if($user->work()->exists())
                               @foreach($user->work->sortByDesc('start') as $work)
                                   <tr>
                                       <td class="fw-bold"> {{$work->title}}-<span>{{$work->organization}}</span></td>
                                       <td>
                                           @if($work->visibility==1)
                                               <button type="button" class="btn-sm btn-danger "
                                                       wire:click="WorkVisibilityDisable({{$work->id}})">Remove
                                               </button>
                                           @else
                                               <button type="button" class="btn-sm btn-secondary"
                                                       wire:click="WorkVisibilityEnable({{$work->id}})">Add
                                               </button>
                                           @endif
                                       </td>

                                   </tr>
                               @endforeach
                                   @endif
                               </tbody>

                           </table>


                       </div>
                       <button type="button" class="btn btn-primary" wire:click="Previous">Previous</button>
                       <button type="button" class="btn btn-primary" wire:click="nextPage">Next</button>
                   @endif

                   @if($page==5)
                       <h1 class="fs-4">Which education do you want to keep?</h1>
                       <div class="mt-5">
                           <table class="table">
                               <tbody>
                               @if($user->education()->exists())
                               @foreach($user->education->sortByDesc('start') as $education)
                                   <tr>
                                       <td class="fw-bold"> {{$education->degree}}-<span>{{$education->institution}}</span></td>
                                       <td>
                                           @if($education->visibility==1)
                                               <button type="button" class="btn-sm btn-danger "
                                                       wire:click="EducationVisibilityDisable({{$education->id}})">Remove
                                               </button>
                                           @else
                                               <button type="button" class="btn-sm btn-secondary"
                                                       wire:click="EducationVisibilityEnable({{$education->id}})">Add
                                               </button>
                                           @endif
                                       </td>

                                   </tr>
                               @endforeach
                               @endif
                               </tbody>

                           </table>


                       </div>
                       <button type="button" class="btn btn-primary" wire:click="Previous">Previous</button>
                       <button type="button" class="btn btn-primary" wire:click="nextPage">Next</button>
                   @endif
                   @if($page==6)
                       <h1 class="fs-4">Which references do you want to keep?</h1>
                       <div class="mt-5">
                           <table class="table">
                               <tbody>
                               @if($user->references()->exists())
                               @foreach($user->references as $reference)
                                   <tr>
                                       <td class="fw-bold"> {{$reference->name}}-<span>{{$reference->title}} at {{$reference->organization}}</span></td>
                                       <td>
                                           @if($reference->visibility==1)
                                               <button type="button" class="btn-sm btn-danger "
                                                       wire:click="ReferenceVisibilityDisable({{$reference->id}})">Remove
                                               </button>
                                           @else
                                               <button type="button" class="btn-sm btn-secondary"
                                                       wire:click="ReferenceVisibilityEnable({{$reference->id}})">Add
                                               </button>
                                           @endif
                                       </td>

                                   </tr>
                               @endforeach
                               @endif
                               </tbody>

                           </table>


                       </div>
                       <button type="button" class="btn btn-primary" wire:click="Previous">Previous</button>
                       <button type="button" class="btn btn-primary" wire:click="CompleteResume">Finish & Download</button>
                   @endif
           </div>
           <div class="d-none d-lg-block col-lg-6  p-2 resume-preview">
               <div class="cv-preview p-3">
                   <div class="resume-container">
                       @include('templates.'.$resume->template->folder.'.index')
                   </div>


               </div>
              <div class="text-center  mt-4">
                  <div class="d-inline-block ms-3">
                      <div wire:loading.delay>
                          <div class="spinner-grow spinner-grow-sm spin" role="status">
                              <span class="sr-only">Loading...</span>
                          </div>
                          <div class="spinner-grow spinner-grow-sm spin " role="status">
                              <span class="sr-only">Loading...</span>
                          </div>
                          <div class="spinner-grow spinner-grow-sm spin" role="status">
                              <span class="sr-only">Loading...</span>
                          </div>
                      </div>


                  </div>
                  <button type="button" class="btn btn-primary" wire:loading.remove wire:click="ShowPreview">
                      <i class="fa-regular fa-eye me-3"></i>Preview
                  </button>
              </div>

           </div>
       </div>
   </section>
        @endif
</div>
