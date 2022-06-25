<div>
    <section class="p-5">
        <h1 class="fs-4 text-center">Track your Order Progress</h1>
        <hr>
        @if ($order)
        <div class="order-details">
            <p class="fw-bold">{{$order->product->name}}</p>
            <p class="p-0 m-0"><span>Name:</span>{{$order->name}}</p>
            <p class="p-0 m-0"><span>Email:</span>{{$order->email}}</p>
            <p class="p-0 m-0"><span>Cellphohe:</span> {{$order->cellphone}}</p>
            <p class="p-0 m-0 fw-bold">Old CV: <a href="{{$order->getFirstMediaUrl('old_cv')}}"
                    class="text-decoration-none">
                    <i class="fa-solid fa-file-lines"></i> {{$order->getFirstMedia('old_cv')->name}}
                </a>

            </p>
            <p class="p-0 m-0 fw-bold"><span>Order Status:</span> {{$order->progress->name}}</p>
         @if ($order->progress->name=="Abandoned")
         <button type="button" class="btn btn-danger mt-3" wire:click="restoreOrder({{$order->id}})">Restore Order</button>

         @endif

        </div>
        @else
        <div class="order-search">
            @if ($info)
            <p class="text-danger text-center">{{$info}}</p>

            @endif
            <form wire:submit.prevent='searchOrder'>
                <div class="form-group mt-5">
                   <div class="col-8 col-md-6 mx-auto">

                        <input type="text" name="code" id="code" required wire:model.lazy="code" class="form-control m-2"
                            placeholder="Order Number">


                        <button type="submit" class="btn btn-primary m-2">
                            Submit
                        </button>

                    </div>


                </div>
            </form>
        </div>
        @endif



    </section>
</div>
