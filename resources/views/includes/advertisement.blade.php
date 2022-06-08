@if ($adverts->count()>0)
<section>
    <div class="row">
        <div class="col-11 mx-auto text-center">
      <div class="advert">
        <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($adverts as $photo=> $advert )
                <div class="carousel-item {{$photo==0? 'active' : '' }}">
                    <a href="{{$advert->link}}" title="Advertisement" target="_blank">
                        <img src="{{asset($advert->getFirstMediaUrl('banner')? $advert->getFirstMediaUrl('banner'):'/images/no-image.png' )}}"
                        alt="{{$advert->title}}" class="img-fluid rounded" title="{{$advert->name}}">
                    </a>
                  </div>
                @endforeach

            </div>
          </div>
      </div>

        </div>
    </div>

</section>
@endif
