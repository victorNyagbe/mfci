@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
@endsection

@section('content')
    @include('includes.menubar')

    <div class="page-header">
        <div class="page-header-cover">
            <h1>Faire un don</h1>
        </div>
    </div>

    <div class="content-container">
        <div class="about-container">
            {!! $content->donation !!}
        </div>
    </div>
    @include('includes.footer')
@endsection

@section('js')

@endsection
