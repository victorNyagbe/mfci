@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/annexe.css') }}">
@endsection

@section('content')
    @include('includes.menubar')

    <div class="page-header">
        <div class="page-header-cover">
            <h1>Nos annexes</h1>
        </div>
    </div>

    <div class="content-container">
        <div class="annexe-grid">
            @foreach ($annexes as $annexe)
                <div class="annexe-grid-item">
                    <figure class="annexe-image">
                        <img src="{{ asset('storage/app/public/' . $annexe->file) }}" alt="">
                    </figure>
                    <div class="annexe-grid-content">
                        <h3 class="annexe-address">{{ $annexe->address }}</h3>
                        <p class="annexe-contact">{{ $annexe->contact }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('includes.footer')
@endsection

@section('js')

@endsection
