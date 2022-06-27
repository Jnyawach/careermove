@if ($advert->count()>0)
    <section>
        <div class="row">
            <div class="col-12 p-3">
                <a href="{{route('professional-resume')}}" title="Professional CV Writing">
                <img src="{{asset('images/professional-cv.jpg')}}" class="img-fluid rounded">
                </a>
            </div>

        </div>
    </section>
    @endif
