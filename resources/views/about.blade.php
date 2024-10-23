@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
@endsection

@section('content')
    @include('includes.menubar')

    <div class="page-header">
        <div class="page-header-cover">
            <h1>En savoir plus</h1>
        </div>
    </div>

    <div class="content-container container">
        <div class="about-container">
            {!! $content->about !!}
        </div>
    </div>
    @include('includes.footer')
@endsection

@section('js')

@endsection
