<div>
    <section class="p-5">
        <h1 class="fs-3 text-center"><i class="fas fa-shopping-bag"></i> Confirm Payment For Orders</h1>
        <hr>

        @if (\Cart::getContent()->count()>0)
    <div class="row mt-5">
        <div class="col-12 col-md-6 col-lg-8 mx-auto">
            <div class="row">
                <div class="col-6 col-md-2">
                    <img src="{{asset('images/resume.png')}}" class="img-fluid">

                </div>
                <div class="col-12 col-md-9">
                    <h6 class="fs-5 fw-bold">Description</h6>
                    @foreach (\Cart::getContent() as $cart )

                    @if($errors->any())
                    {!! implode('', $errors->all('<div class="text-danger fw-bold">*:message*</div>')) !!}
                    @endif
                    @endforeach
                    <p class="fw-bold">{{$cart->name}}</p>
                    <p class="p-0 m-0"><span>Name:</span>{{$cart->model->name}}</p>
                    <p class="p-0 m-0"><span>Email:</span>{{$cart->model->email}}</p>
                    <p class="p-0 m-0"><span>Cellphohe:</span> {{$cart->model->cellphone}}</p>
                    <p class="p-0 m-0 fw-bold">Old CV: <a href="{{$cart->model->getFirstMediaUrl('old_cv')}}" class="text-decoration-none">
                        <i class="fa-solid fa-file-lines"></i> {{$cart->model->getFirstMedia('old_cv')->name}}
                    </a>

                    </p>


                </div>
            </div>

            <hr class="dotted mt-5">

            <form wire:submit.prevent='confirmPayment'>
                <div class="form-group row">
                    <div class="col-8">
                        <label class="control-label" for="code">Enter Mpesa Code:</label>

                        <input type="text" name="code" class="form-control mt-2" wire:model.lazy='code' required
                        placeholder="eg. QFS4IMYHXA">
                        @error('code') <span class="error">{{ $message }}</span> @enderror

                    </div>
                    <div class="col-4 align-self-end">
                        <button type="submit" class="btn btn-primary" style="height: 45px">CONFIRM</button>
                    </div>

                </div>
                @if ($information)
                <small class="text-danger fw-bold">{{$information}}</small>

                @endif

            </form>


        </div>

    </div>
     @else
     <h5>No available orders</h5>
    @endif

    </section>
</div>
