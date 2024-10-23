@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/articles/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/testimonies.css') }}">
@endsection

@section('content')
    @include('includes.menubar')

    <div class="page-header">
        <div class="page-header-cover">
            <h1>Nos témoignages</h1>
        </div>
    </div>

    <div class="content-container">
        <div class="testimonies_container">
            @foreach ($testimonies as $testimony)
                <div class="testimony_item">
                    <iframe src="https://www.youtube.com/embed/{{ $testimony->url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            @endforeach
        </div>
    </div>

    @include('includes.footer')
@endsection

@section('js')

@endsection
