@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/albums.css') }}">
@endsection

@section('content')
    @include('includes.menubar')

    <div class="page-header">
        <div class="page-header-cover">
            <ol class="page-header-breadcrumb">
                <li>
                    <a href="{{ route('guests.albums.index') }}">/ Liste des albums</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="content-container">
        @php
            $imageClasses = ['img-2x2', 'img-1x1', 'img-1x1', 'img-2x2'];
        @endphp

        <h1>{{ $album->title }}</h1>

        <div class="files-grid">
            @foreach ($files as $index => $file)
                @php
                    $class = $imageClasses[$index % count($imageClasses)];
                @endphp
                <img src="{{ asset('storage/app/public/' . $file->file) }}" alt="Image {{ $album->title }}" class="{{ $class }}" loading="lazy">
            @endforeach
        </div>
    </div>

    @include('includes.footer')
@endsection

@section('js')

@endsection
