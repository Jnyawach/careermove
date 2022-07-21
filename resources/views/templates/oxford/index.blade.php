


    <style>
        @import url("font/stylesheet.css");
        .resume-content{
            font-family: 'Bebas Neue Pro';
            max-width: 22cm;
            height:auto;
            background-color: white;

            line-height: 32px;
            font-size: 1vw;




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
            font-weight:normal;
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
            font-weight: normal;
            border-radius: 15px !important;
        }


    </style>




    <section class="p-5 resume-content mx-auto shadow-sm content">
        <div class="row mt-4">
            <div class="col-3 text-center">
                <div class="name-content rounded-circle p-1 text-center">
                    <div class="name-container rounded-circle">
                        <h1 class="m-0 p-0 name-abbr">{{$user->name[0]}}{{$user->profile->lastName[0]}}</h1>
                    </div>
                </div>

            </div>
            <div class="col-9 align-self-center mx-auto text-center">
                <h1 class="name-head text-uppercase">{{$user->name?$user->name:'Donald'}} <span>{{$user->profile?$user->profile->lastName:'Masika'}}</span></h1>
             <p class="p-0 m-0 text-uppercase head-address">{{$user->profile->cellphone?$user->profile->cellphone:'(+254) 712 23543'}}&nbsp;&nbsp; &bull;&nbsp;&nbsp;{{$user->email?$user->email:'donaldmasika@gmail.com'}}</p>
            </div>
        </div>
        <hr class="mt-4 dotted">
        <div class="row mt-4">
            <div class="col-12">
                <p class="resume-summary"><span>SUMMARY:</span>
                    @if($user->summary)
                        {{$user->summary->summary}}
                    @else
                        Creative full-stack web developer with a flair for bringing innovative UX design to life.
                        2+ experience with Javascript, Ajax, PHP, Laravel, REST Api, Livewire, Bootstrap, and Tailwind CSS. Passionate about
                        implementing user-friendly platforms with simple and dynamic functionality. Seeking to develop my skills in a challenging  environment.
                    @endif


                </p>
            </div>
        </div>
        <hr class="mt-4 dotted">
        <section>
            <div class="row">
                <div class="col-5">
                    <h2 >Get in Touch</h2>
                    <div class="resume-address">
                        <p class="p-0 m-0"><span class="me-2"><i class="fa-solid fa-mobile-screen-button"></i></span>{{$user->profile->cellphone?$user->profile->cellphone:'(+254) 712 23543'}}</p>
                        <p class="p-0 m-0"><span class="me-2"><i class="fa-regular fa-envelope"></i></span>{{$user->email?$user->email:'donaldmasika@gmail.com'}}</p>
                    </div>
                    <div class="social-media mt-4">
                        <h2 >Social Media</h2>
                        <p class="p-0 m-0"><span class="me-2"><i class="fa-brands fa-linkedin"></i></span>https://www.linkedin.com/donald-masika</p>
                        <p class="p-0 m-0"><span class="me-2"><i class="fa-brands fa-facebook-square"></i></span>https://www.facebook.com/donald-masika</p>
                        <p class="p-0 m-0"><span class="me-2"><i class="fa-brands fa-github-square"></i></span>https://github.com/Dmasika</p>
                        <p class="p-0 m-0"><span class="me-2"><i class="fa-brands fa-twitter-square"></i></span>https://twitter.com/JNyawach</p>
                    </div>
                    <div class="soft-skills mt-4">
                        <h2 >Soft Skills</h2>
                        <div class="d-inline-block">
                           <small><span class="badge skill-badge">Communication</span></small>
                            <small><span class="badge skill-badge">Creativity</span></small>
                            <small><span class="badge skill-badge">Leadership</span></small>
                            <small><span class="badge skill-badge">Enthusiasm</span></small>
                            <small><span class="badge skill-badge">Researching</span></small>
                            <small><span class="badge skill-badge">Problem-solving</span></small>
                        </div>
                    </div>
                    <div class="hard-skills mt-4">
                        <h2 >Hard Skills</h2>
                        <div class="d-inline-block">
                            <small><span class="badge skill-badge">Illustrator</span></small>
                            <small><span class="badge skill-badge">Photoshop</span></small>
                            <small><span class="badge skill-badge">Indesign</span></small>
                            <small><span class="badge skill-badge">Corel Draw</span></small>
                            <small><span class="badge skill-badge">Debugging</span></small>
                            <small><span class="badge skill-badge">Tailwind CSS</span></small>
                            <small><span class="badge skill-badge">Bootstrap CSS</span></small>
                            <small><span class="badge skill-badge">Livewire</span></small>
                        </div>
                    </div>

                    <div class="languages mt-4">
                        <h2>Languages</h2>
                        <div >
                            <p class="d-inline-block m-0 me-2 p-0"><span>English: </span>Fluent</p>
                            <p class="d-inline-block m-0 me-2 p-0"><span>Swahili: </span>Native</p>
                            <p class="d-inline-block m-0 me-2 p-0"><span>French: </span>Fluent</p>


                        </div>
                    </div>

                    <div class="hobbies mt-4">
                        <h2 >Hobbies</h2>
                        <div class="d-inline-block">
                            <small><span class="badge skill-badge">Painting</span></small>
                            <small><span class="badge skill-badge">Singing</span></small>
                            <small><span class="badge skill-badge">Reading</span></small>

                        </div>
                    </div>
                </div>
                <div class="col-7 p-1">
                    <h2>WORK EXPERIENCE</h2>
                    <div class="experience mt-4">
                        <h3>Founder and Full-Stack Web Developer</h3>
                        <h4>Careemove LTD&nbsp;&nbsp; &bull;&nbsp;&nbsp;Nairobi, Kenya&nbsp;&nbsp; &bull;&nbsp;&nbsp;2019-2021</h4>
                       <ul>
                           <li>Full-stack web developer responsible for end-to-end development and deployment</li>
                           <li>Optimized Careermove website for SEO which increased the site visits to over 5,000 within two weeks of deployment</li>
                           <li>Developed an email subscription program that received 167 subscriptions in two weeks of deployment.</li>
                           <li>Monitoring MYSQL Database and rectifying errors that may arise</li>
                           <li>Currently in charge of a three-member team that is tasked with content creation at Careermove</li>
                       </ul>
                    </div>
                    <div class="experience mt-4">
                        <h3>Graphic & Embroidery Designer</h3>
                        <h4>Global Inc.&nbsp;&nbsp; &bull;&nbsp;&nbsp;Nairobi, Kenya&nbsp;&nbsp; &bull;&nbsp;&nbsp;2019-2021</h4>
                        <ul>
                            <li>Developed the company website and optimized it for SEO</li>
                            <li>Led the introduction of embroidery services after independently taking embroidery classes online and being the main embroidery designer</li>
                            <li>Was promoted to junior production manager within 4 months of taking up the role and increased the overall production speed by introducing a job card system</li>

                        </ul>
                    </div>
                    <hr class="mt-4 dotted">
                    <h2 class="mt-4">EDUCATION</h2>
                    <div class="education mt-4">
                        <h3>Computer Science</h3>
                        <h4>Bachelor's Degree&nbsp;&nbsp; &bull;&nbsp;&nbsp;Nairobi University&nbsp;&nbsp; &bull;&nbsp;&nbsp;Nairobi, Kenya&nbsp;&nbsp; &bull;&nbsp;&nbsp;2019-2021</h4>
                        <ul>
                            <li>Excelled in LEMP Stack</li>
                            <li>Conducted a study on urban inclusivity and small-scale traders within Upperhill Nairobi</li>
                            <li>Scored Second Class Upper Division</li>

                        </ul>
                    </div>

                    <div class="education mt-4">
                        <h3>Introduction to PHP and MYSQL Database beginner to advance</h3>
                        <h4>Certificate&nbsp;&nbsp; &bull;&nbsp;&nbsp;Udemy&nbsp;&nbsp; &bull;&nbsp;&nbsp;Nairobi, Kenya&nbsp;&nbsp; &bull;&nbsp;&nbsp;2019-2021</h4>
                        <ul>
                            <li>Learnt the PHP Language and MYSQL database Queries</li>
                            <li>Developed my first dynamic website to test the progress and mastery of the course</li>


                        </ul>
                    </div>

                    <div class="education mt-4">
                        <h3>Start with TALL: Use Tailwind, Alpine JS, Laravel & Livewire</h3>
                        <h4>Certificate&nbsp;&nbsp; &bull;&nbsp;&nbsp;Udemy&nbsp;&nbsp; &bull;&nbsp;&nbsp;Nairobi, Kenya&nbsp;&nbsp; &bull;&nbsp;&nbsp;2019-2021</h4>
                        <ul>
                            <li>Advanced my knowledge in web development</li>
                            <li>Learnt how to develop more interactive and user-friendly web pages</li>
                            <li>Developed my first web application using the TALL stack</li>


                        </ul>
                    </div>
                    <hr class="mt-4 dotted">
                    <h2 class="mt-4">CERTIFICATIONS/AWARDS</h2>
                    <div class="education mt-2">
                        <ol>
                            <li>Google SEO Fundamentals- Coursera 2022</li>
                            <li>Social Media Marketing Mastery Learn Ads on 10+ Platforms-Udemy 2022</li>
                            <li>Fundamentals of digital marketing- Google 2022-ongoing</li>

                        </ol>


                    </div>
                    <hr class="mt-4 dotted">
                    <h2 class="mt-4">REFEREES</h2>
                    <div class="referee mt-2">
                     <p class="p-0 m-0"><span>John Doe, Marketing Director, Azam Global Inc.</span></p>
                        <p class="p-0 m-0">Tel: +254 710 19384, Email: johndoe@azamglobal.com</p>
                    </div>

                </div>
            </div>
        </section>

        <hr class="mt-4 dotted">
        <p class="text-uppercase text-end">Donald Masika</p>
    </section>



