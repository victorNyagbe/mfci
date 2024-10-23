@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/Admin/medias.css
    ') }}">
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
                    <a href="{{ route('medias.index') }}">Médias</a>
                </li>
            </ul>
            <div class="logot-links">
                <a href="#" class="logout">Se déconnecter</a>
            </div>
        </div>

        <div class="wrap-content-body">
            <div class="edit-form-cover">
                <div class="files-cover">
                    <div class="album-files-cover">
                        @foreach ($album->files as $file)
                            <div>
                                @if ($file->type == 'image/jpeg' || $file->type == 'image/png')
                                    <img src="{{ URL::asset('storage/app/public/' . $file->file) }}" alt="{{ $album->title }}"
                                        width="100%">
                                @else
                                    <video src="{{ URL::asset('storage/app/public/' . $file->file) }}" width="100%" controls></video>
                                @endif
                                <div class="text-center" style="margin-bottom: 8px;">
                                    <a href="{{ route('media.destroyFile', $file->id) }}"
                                        onclick="return confirm('Êtes-vous sûre de vouloir supprimer ce fichier ? Cette action sera irréversible !')">
                                        <b>Supprimer</b> {{ $file->type }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <form action="{{ route('medias.update', $album->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h1>Modifier un média</h1>
                    <p>Renseignez les informations du média (album) que vous voulez mettre à jour.</p>

                    @if (count($errors) > 0)
                        <div class="error-label">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div><br />
                    @endif

                    <label for="title">Titre de l'album</label>
                    <input type="text" name="title" id="title" value="{{ $album->title }}"
                        placeholder="Saisir le titre de l'album média ici ..." />

                    <label for="files" class="input-file">
                        + Choisir des fichiers
                        <input type="file" name="files[]" id="files">
                    </label>

                    <button class="button full-width">
                        Publier
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
