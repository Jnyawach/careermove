@extends('layouts.main')
@section('title','Add Associations')
@section('content')
<section class="dashboard-body p-3">
    <div class="card">
        <div class="card-header">
            <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-user-group"></i></span> Professional Associations</h2>


        </div>
        <div class="card-body">
            <form action="{{route('associations.store')}}" method="POST">

                @csrf
                <div class="form-group required row mt-3">
                    <div class="col-12 col-md-4 col-lg-4">
                        <label class="control-label" for="organization">Association Name:</label>
                        <div>
                            <small>For example:Kenya Institute of Planners</small>
                        </div>
                        <input type="text" name="organization"  id="organization" required value="{{old('organization')}}"
                       class="form-control mt-3">
                       @error('organization') <span class="error">{{ $message }}</span> @enderror

                    </div>

                    <div class="col-12 col-md-4 col-lg-4">
                        <label class="control-label" for="title">Role:</label>
                        <div>
                            <small>For example:Member</small>
                        </div>
                        <input type="text" name="role"  id="role" required value="{{old('role')}}"
                       class="form-control mt-3">
                       @error('role') <span class="error">{{ $message }}</span> @enderror

                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="control-label" for="when">Date:</label>
                        <div>
                            <small>When did you join the association?</small>
                        </div>
                        <input type="date" name="when"  id="when" required value="{{old('when')}}"
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
