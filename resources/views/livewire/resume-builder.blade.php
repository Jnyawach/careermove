<div>
   <section class="">
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
                       <div class="category switch">
                           <div class="form-group">
                               <div class="form-check form-switch">
                                   <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                   <label class="form-check-label fw-bold" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                               </div>
                           </div>
                       </div>
                       <hr class="mt-5">
                       <button type="button" class="btn btn-primary" wire:click="Previous">Previous</button>
                       <button type="button" class="btn btn-primary" wire:click="nextPage">Next</button>
                   </div>

                   @endif

           </div>
           <div class="d-none d-md-block col-md-6  p-2 resume-preview">
               <div class="cv-preview p-3">
                   <div class="resume-container">
                       @include('templates.oxford.index')
                   </div>


               </div>
              <div class="text-center  mt-4">
                  <button type="button" class="btn btn-primary">
                      <i class="fa-solid fa-download me-3"></i>Download
                  </button>
              </div>

           </div>
       </div>
   </section>
</div>
