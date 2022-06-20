@extends('layouts.main')
@section('title','Edit hobbies')
@section('content')
<section class="dashboard-body p-3">
    <div class="card">
        <div class="card-header">
            <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-camera"></i></span> Hobbies</h2>

        </div>
        <div class="card-body p-3">
            <form method="POST" action="{{route('hobbies.update', $hobby->id)}}">
                @method('PATCH')
                @csrf
                <div class="form-group required">
                    <label for="hobbies" class="control-label">Hobbies:</label>
                    <div>
                        <small>Use colon separated points for example,<span> Singing:Painting:Dancing</span></small>
                    </div>

                    <textarea class="form-control mt-2" placeholder="Type your hobbies here" id="hobbies"
                        style="height: 250px" name="hobbies" required>{{$hobby->hobbies}}</textarea>
                        @error('hobbies') <span class="error">{{ $message }}</span> @enderror

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
