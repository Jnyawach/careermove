@extends('layouts.resume')
@section('styles')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@200;300;400;500;600;700&display=swap');
        .resume-content{
            font-family: 'Barlow Condensed', sans-serif;
            max-width: 22cm;
            height:auto;
            background-color: white;
            line-height: 32px;
            font-size: 100%;
            font-weight: 400;



        }


        h2{
           font-size: 18px;
            font-weight: bold;
            color: #07333d;
        }
        h3{
            font-size: 18px;
            font-weight: bold;
            color: black;
        }
        h4{
            font-size: 16px;
            font-weight:bold;
            color: #07333d;
        }
        span{
            color: #07333d;
            font-weight: bold;
        }
        .name-content{
            border:1px solid black;
            height: 100px;
            width: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .name-container{
            background-color: #07333d;
            height: 90px;
            width: 90px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .name-abbr{
            color: white;
            font-weight: 500;
            font-size: 45px;
        }
        .name-head{
            font-weight: 700;
            font-size: 45px;
        }
        .name-head span{
            font-weight: 300;
        }
        .head-address{
            font-weight: 600;
            font-size: 16px !important;
            letter-spacing: 2px;
        }
        .dotted{
            background: none;
            opacity: 1 !important;
            border-top: 0.2px dotted #07333d;
        }
        .skill-badge{
            background-color: #07333d;
            color: white;
            letter-spacing: 2px;
            font-size: 12px;
            font-weight: 600 !important;
            border-radius: 15px !important;
            margin: 2px;
        }
        ul li{
           font-weight: 400;
        }


    </style>
@endsection
@section('content')

    <section class="p-5 resume-content mx-auto shadow-sm content">
        @if($resume->personal_info==1)
            <div class="row mt-4">
                <div class="col-3 text-center">
                    <div class="name-content rounded-circle p-1 text-center">
                        <div class="name-container rounded-circle">
                            <h1 class="m-0 p-0 name-abbr">{{$user->name[0]}}{{$user->profile->lastName[0]}}</h1>
                        </div>
                    </div>

                </div>
                <div class="col-9 align-self-center mx-auto text-center">
                    <h1 class="name-head text-uppercase">{{$user->name}}
                        <span>{{$user->profile->lastName}}</span></h1>
                    <p class="p-0 m-0 text-uppercase head-address">{{$user->profile->cellphone?$user->profile->cellphone:'(+254) 712 23543'}}
                        &nbsp;&nbsp; &bull;&nbsp;&nbsp;{{$user->email}}</p>
                </div>
            </div>
        @endif

        @if($resume->intro==1)
            <hr class="mt-4 dotted">
            <div class="row mt-4">
                <div class="col-12">
                    <p class="resume-summary"><span>SUMMARY:</span>
                        @if($user->summary()->exists())
                            {{$user->summary->summary}}
                        @else
                            Creative full-stack web developer with a flair for bringing innovative UX design to life.
                            2+ experience with Javascript, Ajax, PHP, Laravel, REST Api, Livewire, Bootstrap, and
                            Tailwind CSS. Passionate about
                            implementing user-friendly platforms with simple and dynamic functionality. Seeking to
                            develop my skills in a challenging  environment.
                        @endif
                    </p>
                </div>
            </div>
        @endif
        <hr class="mt-4 dotted">
        <section>
            <div class="row">
                <div class="col-5">
                    @if($resume->personal_info==1)
                        <h2>Get in Touch</h2>
                        <div class="resume-address">
                            <p class="p-0 m-0"><span class="me-2"><i
                                        class="fa-solid fa-mobile-screen-button"></i></span>{{$user->profile->cellphone?$user->profile->cellphone:'(+254) 712 23543'}}
                            </p>
                            <p class="p-0 m-0"><span class="me-2"><i
                                        class="fa-regular fa-envelope"></i></span>{{$user->email}}
                            </p>
                        </div>
                    @endif
                    @if($resume->social_media==1)
                        <div class="social-media mt-4">
                            <h2>Social Media</h2>
                            @if($user->links()->exists())
                                @foreach($user->links as $link)
                                    <p class="p-0 m-0"><span
                                            class="me-2">{!! $link->social->icon !!}</span>{{$link->link}}
                                    </p>
                                @endforeach
                            @endif
                        </div>
                    @endif
                    @if($resume->soft_skills==1)
                        <div class="soft-skills mt-4">
                            <h2>Soft Skills</h2>
                            @if($user->skill()->exists())
                                <div class="d-inline-block">
                                    @foreach (explode(':', $user->skill->skills) as $pill)
                                        <small><span class="badge skill-badge">{{$pill}}</span></small>
                                    @endforeach

                                </div>
                            @endif
                        </div>
                    @endif
                    @if($resume->hard_skills==1)
                        <div class="hard-skills mt-4">
                            <h2>Hard Skills</h2>
                            @if($user->hard()->exists())
                                <div class="d-inline-block">
                                    @foreach (explode(':', $user->hard->skills) as $pill)
                                        <small><span class="badge skill-badge">{{$pill}}</span></small>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endif

                    @if($resume->language==1)

                        <div class="languages mt-4">
                            <h2>Languages</h2>
                            @if($user->languages()->exists())
                                <div>
                                    @foreach($user->languages as $language)
                                        <p class="d-inline-block m-0 me-2 p-0">
                                            <span>{{$language->name}}: </span>{{$language->writen}}</p>

                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endif
                    @if($resume->hobbies==1)

                        <div class="hobbies mt-4">
                            <h2>Hobbies</h2>
                            @if($user->hobby()->exists())
                                <div class="d-inline-block">
                                    @foreach (explode(':', $user->hobby->hobbies) as $hobby)
                                        <small><span class="badge skill-badge">{{$hobby}}</span></small>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
                <div class="col-7 p-1">
                    @if($resume->experience==1)
                        <h2>WORK EXPERIENCE</h2>
                        @if($user->work()->exists())
                            @foreach($user->work->where('visibility',1)->sortByDesc('start') as $work)
                                <div class="experience mt-4">
                                    <h3>{{$work->title}}</h3>
                                    <h4>{{$work->organization}}&nbsp;&nbsp;
                                        &bull;&nbsp;&nbsp;{{\Carbon\Carbon::parse($work->start)->isoFormat('MMM YYYY')}}
                                        - {{$work->end?\Carbon\Carbon::parse($work->end)->isoFormat('MMM YYYY'):'Currently'}}</h4>

                                    <ul class="p-0 m-0 ms-3">
                                        @foreach (explode(':', $work->achievement) as $achievement)
                                            <li>{{$achievement}}</li>
                                        @endforeach
                                    </ul>

                                </div>
                            @endforeach
                        @endif

                        <hr class="mt-4 dotted">
                    @endif
                    @if($resume->education==1)

                        <h2 class="mt-4">EDUCATION</h2>
                        @if($user->education()->exists())
                            @foreach($user->education->where('visibility',1)->sortByDesc('start') as $education)
                                <div class="education mt-4">
                                    <h3>{{$education->degree}}</h3>
                                    <h4>{{$education->education_level}}&nbsp;&nbsp;
                                        &bull;&nbsp;&nbsp;{{$education->institution}}&nbsp;&nbsp;
                                        &bull;&nbsp;&nbsp;&nbsp;&nbsp;{{\Carbon\Carbon::parse($education->start)->isoFormat('MMM YYYY')}}
                                        - {{$work->end?\Carbon\Carbon::parse($education->end)->isoFormat('MMM YYYY'):'Currently'}}</h4>
                                    <ul class="p-0 m-0 ms-3">
                                        @foreach (explode(':', $education->education_summary) as $summary)
                                            <li>{{$summary}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        @endif

                        <hr class="mt-4 dotted">
                    @endif
                    @if($resume->certifications==1)
                        <h2 class="mt-4">CERTIFICATIONS/AWARDS</h2>
                        @if($user->awards()->exists())
                            <div class="education mt-2">

                                <ol class="m-0 p-0 ms-3">
                                    @foreach($user->awards->sortByDesc('when') as $award)
                                        <li>{{$award->title}}
                                            - {{$award->organization}} {{\Carbon\Carbon::parse($award->when)->isoFormat('MMM YYYY')}}</li>
                                    @endforeach

                                </ol>


                            </div>
                        @endif
                        <hr class="mt-4 dotted">
                    @endif
                    @if($resume->references==1)
                        <h2 class="mt-4">REFERENCES</h2>
                        <div class="referee mt-2">
                            @foreach($user->references->where('visibility',1) as $reference)
                                <p class="p-0 m-0">
                                    <span>{{$reference->name}}, {{$reference->title}}, {{$reference->organization}}</span>
                                </p>
                                <p class="p-0 m-0">Tel: {{$reference->cellphone}}, Email: {{$reference->email}}</p>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </section>


    </section>

@endsection

