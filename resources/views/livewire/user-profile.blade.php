<div>
    <h5>{{$name}} {{$lastName}}</h5>
    <p>Email: <span>{{$email}}</span></p>
    <div class="row">
        <div class="col-md-6">
            <div class="card p-5">
                <div class="card-body">

                    <h6>Update account info</h6>
                    <form wire:submit.prevent="bioUpdate">
                        <div class="form-group mt-2">
                            <label for="name" class="control-label">First Name:</label>
                            <input type="text" name="name" wire:model.lazy="name" id="name" required
                                   class="form-control mt-2">
                            @error('name') <span class="error">{{ $message }}</span> @enderror<br>

                        </div>
                        <div class="form-group ">
                            <label for="lastName" class="control-label">Last Name:</label>
                            <input type="text" name="lastName" wire:model.lazy="lastName" id="lastName" required
                                   class="form-control mt-2">
                            @error('lastName') <span class="error">{{ $message }}</span> @enderror<br>

                        </div>

                        <button type="submit" class="btn btn-secondary ">
                           Save
                        </button>
                        @if($success)
                            <div class="alert alert-success mt-2 p-1">
                                <p>{{$success}}</p>
                            </div>

                        @endif
                    </form>

                </div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-5">
                <div class="card-body">
                    <h6>Update Password</h6>
                    <form wire:submit.prevent="passwordUpdate">
                        <div class="form-group mt-2">
                            <label class="control-label" for="password">New Password:</label>
                            <input type="password" id="password"  class="form-control mt-2"
                                   name="password" required autocomplete="new-password" wire:model.lazy="password">
                            @error('password') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label class="control-label" for="confirmPassword">Confirm New Password:</label>
                            <input type="password" id="confirmPassword"  class="form-control mt-2"
                                   name="password_confirmation" required wire:model.lazy="password_confirmation">

                        </div>

                        <button type="submit" class="btn btn-secondary mt-3">
                            Save
                        </button>
                        @if($success)
                            <div class="alert alert-success mt-2 p-1">
                                <p>{{$pass_success}}</p>
                            </div>

                        @endif
                    </form>

                </div>

            </div>
        </div>
    </div>

</div>
