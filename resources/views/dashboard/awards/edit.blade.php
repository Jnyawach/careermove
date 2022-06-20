@extends('layouts.main')
@section('title','Edit Awards and Certifications')
@section('content')
<section class="dashboard-body p-3">
    <div class="card">
        <div class="card-header">
            <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-award"></i></span> Certifications & Awards</h2>


        </div>
        <div class="card-body">
            <form action="{{route('awards.update', $award->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group required row mt-3">
                    <div class="col-12 col-md-4 col-lg-4">
                        <label class="control-label" for="organization">Awarding Organization:</label>
                        <div>
                            <small>For example:Pioneer International University</small>
                        </div>
                        <input type="text" name="organization"  id="organization" required value="{{$award->organization}}"
                       class="form-control mt-3">
                       @error('organization') <span class="error">{{ $message }}</span> @enderror

                    </div>

                    <div class="col-12 col-md-4 col-lg-4">
                        <label class="control-label" for="title">Awarding title:</label>
                        <div>
                            <small>For example:Cisco Certified Network Associate</small>
                        </div>
                        <input type="text" name="title"  id="title" required value="{{$award->title}}"
                       class="form-control mt-3">
                       @error('title') <span class="error">{{ $message }}</span> @enderror

                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="control-label" for="when">Date:</label>
                        <div>
                            <small>When was the award recieved</small>
                        </div>
                        <input type="date" name="when"  id="when" required value="{{$award->when}}"
                       class="form-control mt-3" style="height: 45px">
                          @error('when') <span class="error">{{ $message }}</span> @enderror
                    </div>

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
