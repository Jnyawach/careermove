@extends('layouts.admin')
@section('title','Add CV Template')
@section('content')
    <section class="p-5">
        @include('includes.status')
        <h1 class="fs-4">Edit CV Template </h1>
        <hr>
        <small><span class="text-danger">Adding a CV Template should be done by an expert.</span> The template has manually
            created by an expert then reference here</small>
        <h6>Template Creation Process</h6>
        <ol>
            <li>Dynamic PHP Template bundled in a folder</li>
            <li>Upload template manually to the server under the folder
                resources/views/templates</li>
            <li>Creat template using the form below. Template folder name must match the uploaded folder</li>
        </ol>

        <form method="POST" action="{{route('cv_templates.update',$template->id)}}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form-group row required mt-5">
                <div class="col-12 col-md-4">
                    <label class="control-label" for="name">
                        Template Name
                    </label>
                    <input type="text" class="form-control mt-3" name="name"
                           required value="{{$template->name}}">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col-12 col-md-4">
                    <label class="control-label" for="folder">
                        Template Folder Name:
                    </label>
                    <input type="text" class="form-control mt-3" name="folder"
                           required value="{{$template->folder}}">
                    @error('folder') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <label class="control-label" for="status">Status:</label>
                    <select class="form-select mt-3" id="status" name="status" required>
                        <option selected value="1">Active</option>
                        <option value="0">Inactive</option>

                    </select>
                    @error('status') <span class="error">{{ $message }}</span> @enderror
                </div>

            </div>

            <div class="form-group required mt-3">
                <label for="education_summary" class="control-label">Template Description</label>
                <div>
                    <small>Supply a brief description about the template</small>

                </div>

                <textarea class="form-control mt-2" id="description"
                          style="height: 200px" name="description" required>{{$template->description}}</textarea>
                @error('description') <span class="error">{{ $message }}</span> @enderror

            </div>

            <div class="form-group mt-3">
                <label for="formFile" class="form-label">Template Preview Image</label>
                <input class="form-control" type="file" id="formFile" name="template">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create Template</button>




        </form>

    </section>

@endsection


