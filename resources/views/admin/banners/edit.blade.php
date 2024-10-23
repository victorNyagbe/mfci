@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/Admin/bannieres.css') }}">
@endsection

@section('content')
    @include('includes.sidebar')

    <div class="wrap-content">
        <div class="app-bar">
            <ul class="app-bar-links">
                <li class="app-bar-link-item">
                    <a href="{{ route('dashboard') }}">Accueil</a>
                </li>
                <li class="app-bar-link-item">
                    <a href="{{ route('banners.index') }}">Bannières</a>
                </li>
            </ul>
            <div class="logot-links">
                <a href="#" class="logout">Se déconnecter</a>
            </div>
        </div>

        <div class="wrap-content-body">
            <div class="edit-form-cover">
                <figure class="banner-img">
                    <img src="{{ asset('storage/app/public/' . $banner->file) }}" alt="Image de banniere">
                </figure>
                <form action="{{ route('banners.update', $banner->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <h1>Modifier une bannière</h1>

                    @if (count($errors) > 0)
                        <div class="error-label">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div><br />
                    @endif

                    <label for="title">Titre principal de la bannière</label>
                    <input type="text" id="title" name="title" required
                        placeholder="Saisir le titre de la bannière ici ..." value="{{ $banner->title }}">

                    <label for="description">Titre secondaire de la bannière [Facultatif]</label>
                    <textarea name="description" id="description" required rows="3" placeholder="Saisir un titre secondaire ...">{!! $banner->description !!}</textarea>

                    <label for="file" class="input-file">
                        + Choisir une image
                        <input type="file" name="file" accept="image/*" id="file">
                    </label>

                    <button type="submit" class="button full-width">
                        Publier
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
