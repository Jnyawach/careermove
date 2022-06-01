<div>
    <section class="intro p-2">
        <div class="row mt-5">

            <div class="col-11 col-lg-5 mx-auto p-2">

                <a href="{{route('blog.show',$intro->slug)}}" title="{{$intro->title}}" class="text-decoration-none">
                    <div>
                    <img src="{{asset($intro->getFirstMediaUrl('imageCard')? $intro->getFirstMediaUrl('imageCard','blog-thumb'):'/images/no-image.png' )}}" class="img-fluid curved"
                    alt="{{$intro->title}}" title="{{$intro->title}}">
                    </div>
                    <small>{{$intro->image_credit}}</small>
                    <h1 class="mb-0">{{$intro->title}}</h1>
                    <p class="fw-bold fs-6 m-0 p-0 about-post">{{$intro->readers}} people are reading this | <i class="fa-solid fa-thumbs-up"></i> {{$intro->like}} | <i class="fa-solid fa-thumbs-down"></i> {{$intro->dislike}} | <i class="fa-solid fa-message"></i> 5</p>
                    <h6 class="fw-bold">{{$intro->author->first_name}} {{$intro->author->last_name}}: {{$intro->created_at->diffForHumans()}}</h6>
                </a>


            </div>

            <div class="col-11  col-lg-6 mx-auto">
                @foreach($header as $head)
                <a href="{{route('blog.show',$head->slug)}}" class="text-decoration-none" title="{{$head->title}}">
                    <div class="row p-3">
                        <div class="col-12 col-md-5 col-lg-3 p-1">
                            <img src="{{asset($head->getFirstMediaUrl('imageCard')? $head->getFirstMediaUrl('imageCard','imageCard-icon'):'/images/no-image.png' )}}" class="img-fluid curved"
                            title="{{$head->title}}" alt="{{$head->title}}">
                        </div>
                        <div class="col-12 col-md-7 col-lg-9 p-1">
                            <h2 class="fs-4">{{$head->title}}</h2>
                            <p class="fw-bold fs-6 m-0 p-0 about-post">@if($head->readers>0){{$head->readers}} people are reading this |@endif <i class="fa-solid fa-thumbs-up"></i> {{$head->like}} | <i class="fa-solid fa-thumbs-down"></i> {{$head->dislike}} | <i class="fa-solid fa-message"></i> 5</p>
                            <p class="fs-5 mb-0 pb-0">{{Str::of($head->summary)->words(10,'')}} <span>[...]</span></p>
                            <h6 class="">{{$head->author->first_name}} {{$head->author->last_name}}: {{$head->created_at->diffForHumans()}}</h6>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

    </section>

    <section class=" m-5 pt-3">
        <h1 class="text-uppercase fs-4">Top Picks</h1>
        <hr>
        <div class="row">
            @foreach($you as $post)
            <div class="col-12 col-lg-6">
                <a href="{{route('blog.show',$post->slug)}}" class="text-decoration-none m-1 post-card" title="{{$post->title}}">
                    <div class="row">
                        <div class="col-12 col-md-5 col-lg-5 p-1">
                            <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard','imageCard-icon'):'/images/no-image.png' )}}" class="img-fluid curved"
                            title="{{$post->title}}" alt="{{$post->title}}">
                        </div>
                        <div class="col-12 col-md-7 col-lg-7 p-1">
                            <h2 class="fs-4">{{$post->title}}</h2>
                            <p class="fw-bold fs-6 m-0 p-0 about-post">@if($post->readers>0){{$post->readers}} people are reading this |@endif <i class="fa-solid fa-thumbs-up"></i> {{$post->like}} | <i class="fa-solid fa-thumbs-down"></i> {{$post->dislike}} | <i class="fa-solid fa-message"></i> 5</p>
                            <p class="fs-5 mb-0 pb-0">{{Str::of($post->summary)->words(10,'')}} <span>[...]</span></p>
                            <h6 class="fw-bold">{{$post->author->first_name}} {{$post->author->last_name}}: {{$head->created_at->diffForHumans()}}</h6>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>

    </section>
    <section class="find-jobs p-5">
        <div class="row p-5">
            <div class="col-11 col-md-8 text-center mx-auto">


               <a href="{{route('listings.index')}}" class="btn btn-outline-primary text-uppercase">
                <i class="fa-solid fa-magnifying-glass me-2"></i> Find Your Ideal Job
            </a>

               <h6 class="mt-4 fs-3">Over 1000 roles to pick from today</h6>

               <p class="fs-5 mt-2">Never miss this Opportunity
                   <a href="{{route('register')}}">Sign Up here</a>
               </p>

            </div>

        </div>

    </section>
    <section class=" m-5 pt-3">
        <h1 class="text-uppercase fs-4">Most Trending</h1>
        <hr>
        <div class="row mt-5">
            @foreach($trending as $post)
            <div class="col-11 col-sm-6 col-md-4 col-lg-4 p-3" @if ($loop->last) id="last_record" @endif>
                <a href="{{route('blog.show',$post->slug)}}" title="{{$post->title}}" class="text-decoration-none posts ">
                    <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard','imageCard-icon'):'/images/no-image.png' )}}" class="img-fluid curved mb-2"
                         alt="{{$post->title}}" title="{{$post->title}}">
                         <h6 class="text-uppercase mt-2">{{$post->author->first_name}} {{$post->author->last_name}}: {{$post->created_at->diffForHumans()}}</h6>
                         <p class="fw-bold fs-6 m-0 p-0 about-post">@if($post->readers>0){{$post->readers}} people are reading this |@endif <i class="fa-solid fa-thumbs-up"></i> {{$post->like}} | <i class="fa-solid fa-thumbs-down"></i> {{$post->dislike}} | <i class="fa-solid fa-message"></i> 5</p>
                    <h2 class="fs-5">{{$post->title}}</h2>

                </a>

            </div>
            @endforeach
        </div>
        @if ($loadAmount = $totalRecords)
        <p class="text-center fs-4 mt-5">No Remaining articles!</p>
    @endif
    </section>
    <script>
        const lastRecord = document.getElementById('last_record');
        const options = {
            root: null,
            threshold: 1,
            rootMargin: '0px'
        }
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    @this.loadMore()
                }
            });
        });
        observer.observe(lastRecord);
    </script>
</div>
