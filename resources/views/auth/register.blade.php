@extends('layouts.auth')
@section('styles')
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
@section('content')
    <section class="mt-5 p-5">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <livewire:wizard />

                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    @livewireScripts
@endsection
