<div>
   <section class="">
       <div class="row">
           <div class="col-12 col-lg-6">
               @guest()
                   <div class="p-5 login-request">
                       <h1>Please <span>login</span> to use this service</h1>
                       <table>
                           <tr class="pt-4">
                               <td><span class="me-3 p-2">01</span></td>
                               <td>Login <a href="{{route('login')}}" title="login" class="text-decoration-none">here.</a></td>
                           </tr>
                           <tr class="pt-5">
                               <td><span class="me-3 p-2">02</span></td>
                               <td>Select a template from our collection.</td>
                           </tr>
                           <tr class="pt-4">
                               <td><span class="me-3 p-2">03</span></td>
                               <td> Build you resume using our easy-to-use resume builder.</td>
                           </tr>
                           <tr class="pt-4">
                               <td><span class="me-3 p-2">04</span></td>
                               <td> Download your resume.</td>
                           </tr>
                       </table>


                   </div>
               @endguest
               @auth()
                   <div class="resume-form p-5">
                       @if($page==1)
                           <div class="user-profile">


                               <h6 class="fw-bold fs-5"> Step 1 of 4: Personal details</h6>
                               <hr>
                               <form wire:submit.prevent="PersonalDetails">
                                   <div class="form-group row required">
                                       <div class="col-12 col-md-6">
                                           <label class="control-label" for="name">First Name:</label>
                                           <input type="name" name="title" wire:model="name" id="name" required
                                                  class="form-control mt-2">
                                           @error('name') <span class="error">{{ $message }}</span> @enderror<br>
                                       </div>

                                       <div class="col-12 col-md-6">
                                           <label class="control-label" for="lastName">Last Name:</label>
                                           <input type="lastName" name="title" wire:model="lastName" id="lastName"
                                                  required
                                                  class="form-control mt-2">
                                           @error('lastName') <span class="error">{{ $message }}</span> @enderror<br>
                                       </div>
                                   </div>
                                   <div class="form-group row required">
                                       <div class="col-12 col-md-6">
                                           <label class="control-label" for="title">Occupation:</label>
                                           <input type="title" name="title" wire:model="title" id="title" required
                                                  class="form-control mt-2" placeholder="e.g Senior Accountant">
                                           @error('title') <span class="error">{{ $message }}</span> @enderror<br>
                                       </div>

                                       <div class="col-12 col-md-6">
                                           <label class="control-label" for="cellphone">Cellphone:</label>
                                           <input type="cellphone" name="title" wire:model="cellphone" id="cellphone"
                                                  required
                                                  class="form-control mt-2" placeholder="e.g +254 712 345675">
                                           @error('cellphone') <span class="error">{{ $message }}</span> @enderror<br>
                                       </div>
                                   </div>
                                   <div class="form-group required">
                                       <label class="control-label" for="summary">Career Summary:</label>
                                       <div>

                                           <small><i class="fa-solid fa-circle-info"></i> A short summary about 60-100 words about your career. Should be keyword intensive highlighting your
                                           profession, skills, years of experience and achievements</small>
                                       </div>
                                       <textarea class="form-control mt-2" id="summary" wire:model.lazy="summary"
                                                 style="height: 150px" name="summary" required >{{$summary}}</textarea>
                                       @error('summary') <span class="error">{{ $message }}</span> @enderror

                                   </div>

                                   <div class="form-group mt-4 text-end">
                                       <button type="submit" class="btn btn-primary">Next</button>
                                   </div>

                               </form>
                           </div>
                       @endif
                       @if($page==2)
                           <div class="experience">
                               <h6 class="fw-bold fs-5"> Step 1 of 4: Personal details</h6>
                               <hr>
                               <form wire:submit.prevent="ExperienceDetails">
                                   <div class="form-group mt-4 text-end">
                                       <button type="button" class="btn btn-primary" wire:click="Previous">Previous</button>
                                       <button type="submit" class="btn btn-primary">Next</button>
                                   </div>

                               </form>
                           </div>
                           @endif
                   </div>

                   @endauth
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
