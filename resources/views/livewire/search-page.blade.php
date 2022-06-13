<div>
    <div class="search-head mt-5">
        <div class="row">
            <div class="col-11 mx-auto">
                <h1 class="fs-5 mb-4">Search for Latest Job alerts, companys and blog post</h1>
                <div class="input-group search-input">
                    <input class="form-control border-end-0 border" type="search" value="search" id="example-search-input"
                        wire:model.debounce.debounce.500ms="search" placeholder="Search jobs titles, company names & career insights">
                    <span class="input-group-append">
                        <button class="btn btn-primary border-start-0 border  ms-n3 " type="button"  title="Click to Search">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>

            </div>
        </div>
    </div>

    <section class="mt-5 search-result ">


        @if ($search)

        <div class="row">
            <div class="col-11 mx-auto">
                @if ($jobs)
                @foreach ($jobs as $job )
                <a href="{{route('listings.show',$job->slug)}}">
                    <p class="p-0 m-1 fs-6">{{$job->title}} <span>#Job</span></p>
                </a>
                <hr class="mt-1">
                @endforeach
                @endif
                @if ($posts)
                @foreach ($posts as $post )
                <a href="{{route('blog.show',$post->slug)}}">
                    <p class="p-0 m-1 fs-6">{{$post->title}} <span>#blog post</span></p>
                </a>
                <hr class="mt-1">
                @endforeach
                @endif

                @if ($companies)
                @foreach ($companies as $company )
                <a href="{{route('hiring.show',$company->slug)}}" class="d-inline-block m-1">
                    <p class="p-0 m-1 fs-6">{{$company->name}} <span>#company</span></p>
                </a>

                @endforeach
                @endif


            </div>

        </div>

        @if (is_null($jobs) && is_null($posts) && is_null($companies))
        <h2 class="text-center fs-5">Sorry we could not find what youa are looking for !</h2>

        @endif

        @else
        <div class="row">
            <div class="col-11 mx-auto">
                <h2 class="fs-4 fw-bold">Recent from Blog</h2>
               @foreach ($blogs as $blog)
                   <div>
                    <a href="{{route('blog.show',$blog->slug)}}">
                        <p class="p-0 m-1 fs-5"><span><i class="fa-solid fa-plus"></i></span> {{$blog->title}} >></p>
                    </a>
                   </div>
               @endforeach

               <h2 class="fs-4 fw-bold mt-4">Trending Job Vacancies</h2>

                @foreach ($vacancies as $vacancy)
                   <div>
                    <a href="{{route('listings.show',$vacancy->slug)}}">
                        <p class="p-0 m-1 fs-5">{{$vacancy->title}} >></p>
                    </a>
                   </div>
               @endforeach

               <h2 class="fs-4 fw-bold mt-4">Companies hiring now</h2>
               <p class="fs-5">
               @foreach ($hirings as $hiring)

                    <a href="{{route('hiring.show',$hiring->slug)}}" class="company-link">
                        {{$hiring->name}}
                    </a> <span>.</span>

               @endforeach
               </p>

            </div>
        </div>
        @endif

    </section>
</div>
