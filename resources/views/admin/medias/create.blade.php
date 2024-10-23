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
                    <a href="{{ route('medias.index') }}">Médias</a>
                </li>
            </ul>
            <div class="logot-links">
                <a href="#" class="logout">Se déconnecter</a>
            </div>
        </div>


        <div class="wrap-content-body">
            <div class="create-form-cover">
                <div></div>
                <form action="{{ route('medias.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <h1>Créer un média</h1>
                    <p>Renseignez les informations du média (album) que vous voulez crééer.</p>

                    @if (count($errors) > 0)
                        <div class="error-label">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div><br />
                    @endif

                    <label for="title">Titre de l'album</label>
                    <input type="text" name="title" id="title" placeholder="Saisir le titre de l'album média ici ..." />

                    <label for="files" class="input-file">
                        + Choisir des fichiers
                        <input type="file" name="files[]" multiple id="files">
                    </label>

                    <button class="button full-width">
                        Publier
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
