@extends('layout.base')

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
            <div class="create-form-cover">
                <div></div>
                <form action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <h1>Créer une bannière</h1>
                    <p>Renseignez les informations et l'image de la bannière que vous voulez créer.</p>

                    @if (count($errors) > 0)
                        <div class="error-label">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div><br />
                    @endif

                    <label for="title">Titre principal de la bannière</label>
                    <input type="text" id="title" name="title" required
                        placeholder="Saisir le titre de la bannière ici ...">

                    <label for="description">Titre secondaire de la bannière [Facultatif]</label>
                    <textarea name="description" id="description" required rows="3" placeholder="Saisir un titre secondaire ..."></textarea>

                    <label for="file" class="input-file">
                        + Choisir une image
                        <input type="file" name="file" required accept="image/*" id="file">
                    </label>

                    <button class="button full-width">
                        Publier
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
