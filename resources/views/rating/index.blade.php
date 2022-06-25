@extends('layouts.main')
@section('title','Rate our Services')

@section('description','Rate our CV and Resume Writing service')
@section('keywords','cv writing in Kenya, Best CV Writing in Kenya, CV Writing service in Kenya,
Professional CV Writing service, CV Review in Kenya, Jobs in Kenya')
@section('content')
<section class="p-5">
    <div class="opinion p-3 p-md-5">
        <h1 class="text-center fs-3">Your opinion is important to us!</h1>
        <form action="{{route('rating.store')}}" method="POST">
            @csrf
            @honeypot
            <div class="form-group text-center mt-5">
                <label>
                    <input type="radio" name="stars" value="1" />
                    <span class="icon">★</span>
                  </label>
                  <label>
                    <input type="radio" name="stars" value="2" />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                  </label>
                  <label>
                    <input type="radio" name="stars" value="3" />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                  </label>
                  <label>
                    <input type="radio" name="stars" value="4" />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                  </label>
                  <label>
                    <input type="radio" name="stars" value="5" />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                  </label>
            </div>
        </form>
    </div>


</section>
@endsection
@section('scripts')

   <script>
        $(':radio').change(function() {
      console.log('New star rating: ' + this.value);
    });
    </script>
@endsection
