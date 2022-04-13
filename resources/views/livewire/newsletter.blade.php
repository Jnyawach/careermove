<div>
  <section class="p-5">
      <h6 class="mt-5 fw-bold fs-4">Subscribe our mailing list to get:</h6>
      <ul class="fs-4">
          <li>Latest job listings</li>
          <li>Career insights and guidance</li>
          <li>Company Reviews</li>
      </ul>
      <div class="row">
          <div class="col-md-10">
              <form wire:submit.prevent="subscribeUser">
                  @honeypot
                  <div class="form-group row">
                      <div class="col-md-6">
                          <label for="name" class="control-label">First Name:</label>
                          <input type="text" name="name" wire:model.lazy="name" id="name" required
                                 class="form-control mt-2">
                          @error('name') <span class="error">{{ $message }}</span> @enderror<br>

                      </div>
                      <div class="col-md-6">
                          <label for="email" class="control-label">Email:</label>
                          <input type="email" name="email" wire:model.lazy="email" id="email" required
                                 class="form-control mt-2">

                          @error('email') <span class="error">{{ $message }}</span> @enderror<br>

                      </div>
                  </div>
                  <h6>Select categories you are interested in</h6>
                  <div class="form-group row">
                      @error('professionId') <span class="error">{{ $message }}</span> @enderror<br>
                      @foreach($professions as $profession)
                          <div class="col-12 col-sm-6 col-lg-4 p-2">
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="{{$profession->id}}"
                                         id="profession{{$profession->id}}" name="professionId" wire:model.lazy="professionId">
                                  <label class="form-check-label" for="profession{{$profession->id}}">
                                      {{$profession->name}}
                                  </label>
                              </div>

                          </div>
                      @endforeach
                  </div>
                  <div class="form-group mt-3">
                      <button type="submit" class="btn btn-primary">Subscribe</button>
                  </div>
                  @if($success)
                      <div class="alert alert-success">
                          <small>{{$success}}</small>

                      </div>
                  @endif

              </form>
          </div>
      </div>

  </section>
</div>
