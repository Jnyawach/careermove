@if ($advert->count()>0)
    <section class=" p-3">
        <div class="row pro-cv">
            <div class="col-12 p-3">
                <h2 class="d-inline-block ms-2">Let a professional review na write your CV today</h2>
                <a href="{{route('services.index')}}" title="Professional Cv Writing service in Kenya"
                class="d-inline-block float-md-end btn btn-primary me-3">
                Order Now
                </a>

            </div>

        </div>
    </section>
    @endif
