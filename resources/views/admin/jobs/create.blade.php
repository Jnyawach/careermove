@extends('layouts.admin')
@section('title','Add Job Listing')
@section('styles')

    @livewireStyles

    @endsection
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-12">
                @livewire('job-create',
                ['professions'=>$professions,
                'industries'=>$industries,
                'companies'=>$companies,
                'locations'=>$locations,
                'experiences'=>$experiences,
                'types'=>$types,
                'ranges'=>$ranges])
            </div>

        </div>

    </section>
@endsection
@section('scripts')

    @livewireScripts
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>



@endsection
