@extends('layouts.employer')
@section('title','Edit Job Listing')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-12">
                @livewire('employer-edit',
                ['professions'=>$professions,
                'industries'=>$industries,
                'companies'=>$companies,
                'locations'=>$locations,
                'experiences'=>$experiences,
                'job'=>$job,
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


