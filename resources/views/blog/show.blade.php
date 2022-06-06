@extends('layouts.main')
@section('title', $post->title)
@section('description', $post->title)
@section('keywords', $post->tags)
@section('styles')
<meta property="og:title" content="{{$post->title}}">
<meta property="og:description" content="{{$post->summary}}">
<meta property="og:image" content="asset($post->getFirstMediaUrl('imageCard')">
<meta property="og:url" content="{{url()->current()}}">
<meta name="twitter:title" content="{{$post->title}}">
<meta name="twitter:description" content="{{$post->summary}}">
<meta name="twitter:url" content="{{url()->current()}}">
<meta name="twitter:card" content="{{$post->summary}}">
    @livewireStyles
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "NewsArticle",
          "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "https://www.careermove.co.ke/blog/{{$post->slug}}"
          },
          "headline": "{{$post->title}}",

          "datePublished": "{{$post->created_at->todatestring()}}",
          "dateModified": "{{$post->updated_at->todatestring()}}",
          "author":{
              "@type": "Person",
              "name": "{{$post->author->first_name}} {{$post->author->last_name}}",
              "url": "null"
            },
            "publisher": {
                "@type": "Organization",
                "name": "Careermove",
                "logo": {
                  "@type": "ImageObject",
                  "url": "https://www.careermove.co.ke/careermove-logo.png"
                }
              }
        }
        </script>

@endsection

@section('content')

    <section>
        <!--Ads Space-->
    </section>
    <section class="post p-3">
        <div class="row mt-2">
            <div class="col-11 col-md-11 col-lg-9 ">

                <h1 class="fs-1 fw-bolder">{{$post->title}}</h1>
                <p class="mb-4 summary mt-3">{{$post->summary}}</p>
                <div>
                    <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard'):'/images/no-image.png' )}}"
                         alt="{{$post->title}}" class="img-fluid rounded" title="{{$post->title}}">
                </div>
                <small class="fst-italic mb-4">Image Credit:{{$post->image_credit}}</small>
                <p class="fw-bold fs-6 m-0 p-0 about-post">@if($post->readers>0){{$post->readers}} people are reading this |@endif <i class="fa-solid fa-thumbs-up"></i> {{$post->like}} | <i class="fa-solid fa-thumbs-down"></i> {{$post->dislike}} | <i class="fa-solid fa-message"></i> {{$post->comments()->count()}}</p>
                <div>
                    <script async
                        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1649231050054855"
                        crossorigin="anonymous"></script>
                    <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
                        data-ad-format="fluid" data-ad-client="ca-pub-1649231050054855" data-ad-slot="7245907301"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <div class="post-content">{!! $post->content !!}</div>
                <p class="mt-3">
                    Tags:@foreach(explode(',',$post->tags) as $tag)
                             <mark>{{$tag}}</mark>
                    @endforeach
                </p>
                <h6>Posted: {{$post->created_at->diffForHUmans()}}</h6>
                <hr>
                @livewire('comment-page',['post'=>$post])


            </div>
            <div class="col-11 col-md-6 col-lg-3  writer position-relative">
                <div class="writer-detail p-1 pt-2 pb-2">

                    <div class="row">
                        <div class="col-3 col-md-3">
                            <img src="{{asset($post->author->getFirstMediaUrl('profile')?$post->author->getFirstMediaUrl('profile','profile-card'):'images/user.png')}}"
                                 class="img-fluid rounded-circle" alt="{{$post->author->firt_name}}" alt="{{$post->author->firt_name}}">
                        </div>
                        <div class="col-9 col-md-9">

                            <h5 class="fs-6">Written by {{$post->author->first_name}} {{$post->author->last_name}} on {{$post->created_at->format('d-m-Y')}}. {{$post->author->title}}
                                {{$post->author->profession}}</h5>
                        </div>

                    </div>

                </div>
                <div class="review mt-4">
                    <h6 class="fs-5 fw-bold mb-3">More from this Author</h6>
                    <ol>
                        @foreach ($blogs  as$blog )
                        <li class="mt-4">
                        <a href="{{route('blog.show',$post->slug)}}" class="text-decoration-none">

                        <h5>{{$post->title}}</h5>

                        </a>
                        </li>

                        @endforeach
                    </ol>

                    <div>
                        <script async
                            src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1649231050054855"
                            crossorigin="anonymous"></script>
                        <!-- horizontal-add -->
                        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1649231050054855"
                            data-ad-slot="4790585617" data-ad-format="auto" data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>

                </div>
            </div>
        </div>


    </section>
    <section class="mt-5">
        <div class="row">
            <div class="col-11 mx-auto">
                <h2 class="fs-5 text-uppercase">Trending jobs
                    <a href="{{route('listings.index')}}" class="float-end text-decoration-none fs-6"><i
                            class="fa-solid fa-list
                   me-3"></i>View
                        all</a>
                </h2>

                <div class="row mt-5">
                    @foreach($jobs as $job)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-2">
                        <a href="{{route('listings.show',$job->slug)}}" title="{{$job->title}}"
                           class="text-decoration-none">
                            <div class="card trending">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <small class="p-0 m-0 fs-6 fw-bold"><span>{{\Carbon\Carbon::parse
                                            ($job->deadline)->isoFormat('MMM Do YY')
                                            }}</span></small>
                                        </div>
                                        <div class="col-3 text-end">
                                            <form method="POST" action="{{route('saved.store')}}">
                                                @csrf
                                                <input type="hidden" value="{{$job->id}}" name="job_id">
                                                <button type="submit" title="save job" class="btn btn-link m-0 p-0">
                                                    <i class="fa-regular fa-heart"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>


                                    <h6>{{$job->company->name}}</h6>
                                    <p class="fs-5 title">{{$job->title}}</p>
                                    <div class="addition">
                                        <p><i class="fa-solid fa-money-bill me-2"></i>{{$job->range->name}}</p>
                                        <p><i class="fa-solid fa-location-crosshairs
                                        me-2"></i>{{$job->location->name}}, Kenya</p>
                                        <p><i class="fa-solid fa-briefcase me-2"></i>{{$job->type->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


    </section>
    @include('includes.subscribe')


@endsection
@section('scripts')
    @livewireScripts

@endsection
