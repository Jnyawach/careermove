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
                               </tbody>
                           </table>
                       </div>

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
                  <button type="button" class="btn btn-primary" wire:loading.remove>
                      <i class="fa-solid fa-download me-3"></i>Download
                  </button>
              </div>

           </div>
       </div>
   </section>
</div>
