@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/albums.css') }}">
@endsection

@section('content')
    @include('includes.menubar')

    <div class="page-header">
        <div class="page-header-cover">
            <h1>Nos albums</h1>
        </div>
    </div>

    <div class="content-container">
        <div class="album-grid">
            @foreach ($albums as $album)
                <div class="album-card">
                    <figure class="album-card-media">
                        <img src="storage/app/public/{{ $album->files[0]->file }}" alt="{{ $album->title }}" width="100%">
                        <div class="album-card-content">
                            <h5><strong>{{ $album->title }}</strong></h5>
                            <a href="{{ route('guests.albums.show', $album) }}" class="see-album">
                                <span>&plus;</span>
                            </a>
                        </div>
                    </figure>
                </div>
            @endforeach
        </div>
    </div>

    @include('includes.footer')
@endsection

@section('js')

@endsection
