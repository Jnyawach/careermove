<div>
    <div class="card mt-5 p-5">
        <div class="card-body">
            <h6 class="text-center mt-4">Please Register</h6>
            <form wire:submit.prevent="createEmployer">
                @honeypot
                <div class="form-group mt-2">
                    <label for="name" class="control-label">First Name:</label>
                    <input type="text" name="name" wire:model.lazy="name" id="name" required
                           class="form-control mt-2">
                    @error('name') <span class="error">{{ $message }}</span> @enderror<br>

                </div>
                <div class="form-group mt-2">
                    <label for="lastName" class="control-label">Last Name:</label>
                    <input type="text" name="lastName" wire:model.lazy="lastName" id="lastName" required
                           class="form-control mt-2">
                    @error('lastName') <span class="error">{{ $message }}</span> @enderror<br>

                </div>
                <div class="form-group mt-2">
                    <label for="email" class="control-label">Work Email:</label>
                    <input type="email" name="email" wire:model.lazy="email" id="email" required
                           class="form-control mt-2">
                    <small>For instance: hiring@company.com</small>
                    @error('email') <span class="error">{{ $message }}</span> @enderror<br>


                </div>

                <div class="form-group mt-2">
                    <label for="cellphone" class="control-label">Cellphone:</label>
                    <input type="text" name="cellphone" wire:model.lazy="cellphone" id="cellphone" required
                           class="form-control mt-2">
                    <small>For instance: +254 722 002100</small>
                    @error('cellphone') <span class="error">{{ $message }}</span> @enderror<br>

                </div>
                <div class="form-group mt-2">
                    <label for="organization" class="control-label">Organization/Company Name:</label>
                    <input type="text" name="organization" wire:model.lazy="organization" id="organization" required
                           class="form-control mt-2">
                    @error('organization') <span class="error">{{ $message }}</span> @enderror<br>

                </div>
                <div class="form-group mt-2">
                    <label class="control-label" for="password">Password:</label>
                    <input type="password" id="password"  class="form-control mt-2"
                           name="password" required autocomplete="new-password" wire:model.lazy="password">
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group mt-3">
                    <label class="control-label" for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword"  class="form-control mt-2"
                           name="password_confirmation" required wire:model.lazy="password_confirmation">

                </div>
                <div class="form-group required m-2 mt-4">
                    <button type="submit" class="btn btn-primary">Register</button><br>
                    <small>By registering you are agreeing to career move terms and conditions</small>
                </div>
            </form>
        </div>
    </div>
</div>
