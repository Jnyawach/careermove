@extends('layouts.main')
@section('title', 'About us')
@section('title','Explore and discover your next career move')
@section('keywords','near me job, jobs in Kenya,work form home jobs,
hiring near me, companies hiring, get jobs,jobs in Nairobi, Jobs in Mombasa, jobs in Kisumu, jobs in Nakuru,internship parmanent jobs,job application,find a job')
@section('content')
    <section class=" p-3 p-md-5">
        <div class="row">
            <div class="col-12">
                <h1 class="fs-1">About Us</h1>
                <p class="fs-5">
                    Job hunting has never been easy. At Careermove we search every corner to
                    find a suitable job and list them in one space for you. Our team
                    works hard to ensure that what you receive is legit and up to date

                </p>

                <div class="mt-5">
                    <h2>Work with Us</h2>
                    <p class="fs-5">At Careermove, our most valuable resource is our people.
                        A diversity of backgrounds, ideas, options, and life experiences.
                        We are open to ideas and taking risks because all this is learning and mastery.
                        Besides, it is an opportunity to be yourself and impact the lives of other millions.
                        <a href="{{route('listings.index')}}" title="Careers at Dr. Manu"
                           class="text-decoration-none"><span> Join our team.</span></a>
                    </p>
                </div>

                <div class="mt-5">
                    <h2>Privacy Policy</h2>
                    <p class="fs-5">Careermove values the privacy of its customers.
                        We develop our products with privacy topping our decision-making model.
                        Feel free to read our<a href="{{route('privacy-policy')}}" title="Privacy Policy" class="text-decoration-none">
                            <span>privacy policy.</span></a></p>
                </div>

                <div class="mt-5">
                    <h2>Terms of Use</h2>
                    <p class="fs-5">
                        Careermove Website resources and contents are governed by terms and conditions.
                        Read more about our <a href="{{route('terms')}}" title="Terms of Use" class="text-decoration-none"><span>terms of use</span></a>
                    </p>
                </div>
                <div class="mt-5">
                    <h2>Contact Details</h2>
                    <p class="fs-5">Shii Hse. Alego Rd. Bahati Nairobi<br>
                        P.O Box 457-00100 Nairobi Kenya<br>
                        Tel. +254 717 109280<br>
                        Email; management@careermove.com</p>
                </div>

            </div>
        </div>

    </section>
@endsection
