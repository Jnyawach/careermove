<div>
<section class="p-5">
    <h1 class="fs-5">Order details*</h1>
    <div class="card">

        <div class="card-body">
            <button type="button" class="btn btn-primary float-end m-2">{{$order->progress->name}}
                @if ($order->user_id)
                    : {{$order->user->name}}
                @endif
            </button>

            <p class="p-0 m-0"><span>Product:</span> {{$order->product->name}}</p>
            <p class="p-0 m-0"><span>Name:</span> {{$order->name}}</p>
            <p class="p-0 m-0"><span>Name:</span> {{$order->email}}</p>
            <p class="p-0 m-0"><span>Email:</span> {{$order->cellphone}}</p>
            <p class="p-0 m-0"><span>Payment:</span> {{$order->payment?$order->payment->mpesa_receipt_number:'N/A'}}</p>
            <p class="p-0 m-0"><span>Status:</span> {{$order->progress->name}}</p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <h6>Change Status</h6>
                    <p>Set order status to processing/cancelled or complete</p>

                    <form wire:submit.prevent='orderStatus'>
                        <div class="form-group">
                            <label for="status" class="control-label">Order Status</label>
                            <select class="form-select mt-2" required name="status"
                                    wire:model.lazy="status" id="status">
                                <option selected  value="">Change status</option>
                                @foreach($statuses as $identity=>$status)
                                    <option value="{{$identity}}">{{$status}}</option>
                                @endforeach

                            </select>
                            @error('status') <span class="error">{{ $message }}</span> @enderror<br>

                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>

                        @if ($success)
                        <p class="text-success">{{$success}}</p>

                        @endif
                    </form>
                </div>
            </div>


        </div>

        @if ($order->progress->name=="Abandoned")
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <h6>Create Discount and Email to Client</h6>
                    <p>The discount product is available for abandoned order only</p>

                    <form wire:submit.prevent='offerDiscount'>
                        <div class="form-group">
                            <label for="amount" class="control-label">Disount Percentage</label>
                            <select class="form-select mt-2" required name="amount"
                                    wire:model.lazy="amount" id="amount">
                                <option selected  value="">Select Amount</option>

                                <option value="5">5% off</option>
                                <option value="8">8% off</option>
                                <option value="10">10% off</option>


                            </select>
                            @error('amount') <span class="error">{{ $message }}</span> @enderror<br>

                        </div>
                        <div class="form-group mt-3">
                            <label for="expiry" class="control-label">Expiry:</label>
                            <input type="date" name="expiry" wire:model.lazy="expiry" id="expiry" required
                                   class="form-control mt-2">
                            <small>Enter discount expiry date</small>
                            @error('expiry') <span class="error">{{ $message }}</span> @enderror<br>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">


                                Send
                            </button>
                        </div>

                        @if ($discount)
                        <p class="text-success">{{$discount}}</p>

                        @endif
                    </form>
                </div>
            </div>


        </div>
        @endif


        @if ($order->discount->count()>0)
        <div class="col-12 col-md-4">

            <div class="card">

                <div class="card-body">
                    <h6>Discounts Created</h6>
                    @foreach ($order->discount as $index=>$discount )
                    <button type="button" class="btn btn-link text-danger float-end" wire:click="deleteDiscount({{$discount->id}})">
                        Delete
                    </button>
                    <p>{{$index+1}} Discount: <span>{{$discount->amount}}%</span></p>
                    <p>Created on: {{$discount->created_at->diffForHumans()}}</p>
                    <p>Expires on: {{Carbon\Carbon::parse($discount->expiry)->diffForHumans()}}</p>
                    @if ($discount->status==1)
                    <p class="text-success">Unused</p>
                    @else
                    <p class="text-danger">Used</p>
                    @endif

                    <hr class="dotted">

                    @endforeach
                </div>
            </div>


        </div>
        @endif
    </div>

</section>

<section class="p-5">
    <h2 class="fw-bold fs-4">Order Fulfillment</h2>
    <hr>
    <div class="row">
        <div class="col-4">
            <div class="card">
               <div class="card-body">
                <h6>Old CV: Uploaded by Client</h6>
                <a href="{{$order->getFirstMediaUrl('old_cv')}}" class="text-decoration-none fw-bold">
                    <i class="fa-solid fa-file-lines"></i> {{$order->getFirstMedia('old_cv')->name}}
                </a>
               <div>
                <small class="fw-bold">Uploaded: {{$order->created_at->diffForHumans()}}</small>
               </div>
               </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
               <div class="card-body">
                <h6>New and Updated CV</h6>
                @if ($order->getFirstMedia('curriculum'))
                <a href="{{$order->getFirstMediaUrl('curriculum')}}" class="text-decoration-none fw-bold">
                    <i class="fa-solid fa-file-lines"></i> {{$order->getFirstMedia('curriculum')->name}}
                </a>
                @else
                <small>Unavailable</small>
                @endif

                <div>
                    <small class="fw-bold">Uploaded: {{$order->created_at->diffForHumans()}}</small>
                   </div>
               </div>
            </div>
        </div>
    </div>
    <hr class="dotted">
    <div class="row">
        @if ($order->progress->name=="Processing")
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h6>Upload Updated CV</h6>
                    <form wire:submit.prevent='uploadNew'>
                        <div class="form-group">
                            <label for="comment" class="control-label">Add comments if you have any(optional):</label>
                            <textarea class="form-control mt-2" id="comment" wire:model.lazy="comment"
                            name="comment"></textarea>
                            @error('comment') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="curriculum" class="form-label">New & Updated CV</label>
                            <input class="form-control" type="file" id="curriculum" wire:model.lazy="curriculum" required>
                          </div>

                          <button type="submit" class="btn btn-primary mt-3">


                           Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

</div>
