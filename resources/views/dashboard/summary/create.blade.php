@extends('layouts.main')
@section('title','Add career Introduction')
@section('content')
<section class="dashboard-body p-3">
    <div class="card">
        <div class="card-header">
            <h2 class="fs-5 mt-2"><span class="profile-icon"><i class="fa-solid fa-book-open"></i></span> Career Introduction</h2>

        </div>
        <div class="card-body p-3">
            <form method="POST" action="{{route('summary.store')}}">
                @csrf
                <div class="form-group required">
                    <label for="summary" class="control-label">Career Intro</label>
                    <div>
                    <small>Short summary what you have done in the past and where you dream to go in the future.</small>
                    </div>

                    <textarea class="form-control mt-2" placeholder="Type summary here" id="summary"
                        style="height: 250px" name="summary" required>{{old('summary')}}</textarea>
                        @error('summary') <span class="error">{{ $message }}</span> @enderror

                </div>
                <hr>
                <div class="form-group mt-3 text-end">
                    <a href="{{route('dashboard.index')}}" class="btn btn-view">Cancel</a>
                    <button type="submit" class="btn btn-secondary">
                        Save
                    </button>

                </div>

            </form>

        </div>
    </div>
</section>
@endsection
