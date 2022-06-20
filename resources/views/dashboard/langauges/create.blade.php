@extends('layouts.main')
@section('title','Add Languages')
@section('content')
<section class="dashboard-body p-3">
    <div class="card">
        <div class="card-header">
            <h2 class="fs-5 mt-2 d-inline-block"><span class="profile-icon"><i class="fa-solid fa-globe"></i></span> Languages</h2>


        </div>
        <div class="card-body">
            <form action="{{route('languages.store')}}" method="POST">
                @csrf
                <div class="form-group required row mt-3">
                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="control-label" for="name">Language Name:</label>
                        <input type="text" name="name"  id="name" required value="{{old('name')}}"
                       class="form-control mt-3">
                       @error('name') <span class="error">{{ $message }}</span> @enderror

                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="control-label" for="spoken">Spoken Level:</label>
                        <select class="form-select mt-3" id="spoken" name="spoken" required >
                            <option selected value="">Select spoken level</option>
                            <option value="Basic">Basic</option>
                            <option value="Fluent">Fluent</option>
                            <option value="Native">Native</option>


                          </select>
                          @error('spoken') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="control-label" for="writen">Written Level:</label>
                        <select class="form-select mt-3" id="writen" name="writen" required >
                            <option selected value="">Select spoken level</option>
                            <option value="Basic">Basic</option>
                            <option value="Fluent">Fluent</option>
                            <option value="Native">Native</option>


                          </select>
                          @error('writen') <span class="error">{{ $message }}</span> @enderror
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
