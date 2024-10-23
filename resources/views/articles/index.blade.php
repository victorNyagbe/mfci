@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/articles/index.css') }}">
@endsection

@section('content')
    @include('includes.menubar')

    <div class="page-header">
        <div class="page-header-cover">
            <h1>Nos arrticles</h1>
        </div>
    </div>

    <div class="content-container">
        <div class="articles-container">
            @foreach ($articles as $article)
                <div class="article-item">
                    <figure class="figure article-image">
                        <img src="{{ asset('storage/app/public/' . $article->file) }}" alt="Image article">
                    </figure>
                    <div class="article-content">
                        <h2 class="article-title">{{ $article->title }}</h2>
                        <a href="{{ route('guests.articles.show', $article) }}" class="article-link">En savoir plus</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('includes.footer')
@endsection

@section('js')

@endsection
