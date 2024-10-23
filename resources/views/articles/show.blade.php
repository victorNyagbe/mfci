@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/articles/index.css') }}">
@endsection

@section('content')
    @include('includes.menubar')

    <div class="page-header">
        <div class="page-header-cover">
            <ol class="page-header-breadcrumb">
                <li>
                    <a href="{{ route('guests.articles.index') }}">/ Liste des articles</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="content-container">
        <div class="article-show">
            <div class="current-article">
                <h1 class="article-title">{{ $article->title }}</h1>
                <figure class="article-image show">
                    <img src="{{ asset('storage/app/public/' . $article->file) }}" alt="image de ' {{ $article->title }} '" class="article-image-show">
                </figure>
                <div class="article-body">{!! $article->description !!}</div>
            </div>
            <div class="other-article">
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
    </div>

    @include('includes.footer')
@endsection

@section('js')

@endsection
