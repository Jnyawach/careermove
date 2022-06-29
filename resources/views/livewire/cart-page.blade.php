<div>
   <section class="p-3 p-lg-5 cart">
    @include('includes.status')
    @if ($payment)
    <div class="alert alert-danger">
        {{ $payment }}
    </div>

    @endif

    <h1 class="fs-3 text-center"><i class="fas fa-shopping-bag"></i> My Cart</h1>
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
                    <div class="edit-cart text-end">
                        <button type="button" class="btn btn-link fw-bold text-decoration-none text-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal{{$cart->id}}">
                            <i class="fas fa-pen-square"></i> Edit</button>

                            <button type="button" class="btn btn-link fw-bold text-decoration-none text-danger" wire:click='clearCart({{$cart->id}})' >

                                <i class="fas fa-trash-alt"></i> Remove</button>



                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$cart->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$cart->id}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{$cart->id}}">Edit Order details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                       <form id="Cart{{$cart->id}}" method="POST" action="{{route('cart.update',$cart->id)}}" enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        @honeypot
                                        <div class="form-group mt-3">
                                            <label class="control-label" for="name">Your Name:</label>
                                            <input type="text"  class="form-control mt-2" id="name"name="name"
                                            placeholder="eg. Jane Doe" required value="{{$cart->model->name}}">
                                            @error('name') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group mt-3">
                                            <label class="control-label" for="email">Your Email:</label>
                                            <input type="email" class="form-control mt-2" id="email" name="email"
                                            placeholder="eg. janedoe@gmail.com" required value="{{$cart->model->email}}">
                                            @error('email') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group mt-3">
                                            <label class="control-label" for="cellphone">Your Cellphone:</label>
                                            <input type="text"  class="form-control mt-2" required name="cellphone" id="cellphone" placeholder="eg.+254 722 002100"
                                            value="{{$cart->model->cellphone}}">
                                            @error('cellphone') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group mt-4">
                                            <label class="control-label">Current CV:</label>
                                            <input type="file"  class="form-control mt-3" name="old_cv">
                                            @error('old_cv') <span class="error">{{ $message }}</span> @enderror
                                        </div>

                                     </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" form="Cart{{$cart->id}}">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
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


        </div>
        <div class="col-12 col-md-6 col-lg-4 mx-auto">
            <div class="cart-summary p-3">
                <h6 class="fs-5 fw-bold">Summary</h6>
                <hr>
                <p>Do you have a Promo code?</p>
                <div class="promo-code">
                    <form wire:submit.prevent='addDiscount'>
                        <div class="form-group row">
                            <div class="col-8">
                                <input type="text" name="promo" class="form-control" wire:model.lazy='promo' required>
                                @error('promo') <span class="error">{{ $message }}</span> @enderror
                                @if ($success)
                                <small class="text-danger">{{$success}}</small>

                                @endif
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary">APPLY</button>
                            </div>

                        </div>


                    </form>
                    <hr>
                    <table class="table table-borderless">
                       <tbody class="fw-bold">
                        @if (\Cart::getCondition('Discount Sale'))
                        <tr>

                            <td>{{\Cart::getCondition('Discount Sale')->getName()}}</td>
                            <td><span><strike>{{\Cart::getSubTotalWithoutConditions()}}</strike></span></td>
                        </tr>
                        @endif


                        <tr>

                            <td>SUBTOTAL (KES)</td>
                            <td><span>{{\Cart::getSubTotal()}}</span></td>
                        </tr>
                        <tr>

                            <td>PROMO CODE (KES)</td>
                            <td><span>{{\Cart::getCondition('Discount Sale')?\Cart::getCondition('Discount Sale')->getValue():'0.00'}}</span></td>
                        </tr>
                       </tbody>

                       <tfoot class="fw-bold">

                        <tr class="table-light">

                            <td>TOTAL (KES)</td>
                            <td><span>{{\Cart::getTotal()}}</span></td>
                        </tr>
                      </tfoot>
                      </table>
                      <hr>



                     @if ($phone)
                     <form wire:submit.prevent='clickPay'>
                        <div class="form-group row">
                            <div class="col-8">
                                <label class="control-label" for="mssd">Enter Mpesa Phone Number</label>

                                <input type="text" name="mssd" class="form-control mt-2" wire:model.lazy='mssd' required
                                placeholder="eg. 0722002100">

                                @if ($success)
                                <small class="text-danger">{{$success}}</small>

                                @endif
                            </div>
                            <div class="col-4 align-self-end">
                                <button type="submit" class="btn btn-primary">
                                    <div wire:loading.delay>
                                        <span  class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"></span>
                                        </div>
                                    PAY
                                </button>
                            </div>
                            @error('mssd') <span class="error">{{ $message }}</span> @enderror

                        </div>


                    </form>

                     @else
                     <div>
                        <p>Pay via Mpesa Using Phone number <strong>{{\Cart::getContent()->first()->model->cellphone}}</strong></p>
                        <button class="btn btn-primary mt-4 text-center" wire:click="clickPay">
                            <div wire:loading.delay>
                                <span  class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"></span>
                                </div>
                            PROCEED TO PAY
                        </button>
                        <button class="btn btn-view text-center mt-4" wire:click="editPhone">Edit Phone Number</button>
                       </div>
                     @endif

                      <hr>
                      <p>Need help? call us at 0705813739</p>

                    </div>
            </div>
        </div>
    </div>
     @else
     <h5>No items in your cart. Continue shopping </h5>
    @endif

   </section>
</div>
