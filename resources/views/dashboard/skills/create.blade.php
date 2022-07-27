@extends('layouts.main')
@section('title','Add life Skills')
@section('content')
<section class="dashboard-body p-3">
    <div class="card">
        <div class="card-header">
            <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-trophy"></i></span> Skills Set</h2>

        </div>
        <div class="card-body p-3">
            <form method="POST" action="{{route('skills.store')}}">
                @csrf
                <div class="form-group required">
                    <label for="skills" class="control-label">Soft Skills set:</label>
                    <div>
                        <small>Use colon separated points for example,<span> Graphic design: Painting: Creative thinking</span></small>
                    </div>

                    <textarea class="form-control mt-2" placeholder="Type your skills here" id="skills"
                        style="height: 250px" name="skills" required>{{old('skills')}}</textarea>
                        @error('skills') <span class="error">{{ $message }}</span> @enderror

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
