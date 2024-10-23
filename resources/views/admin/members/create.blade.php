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
                    <a href="{{ route('members.index') }}">Membres</a>
                </li>
            </ul>
            <div class="logot-links">
                <a href="#" class="logout">Se déconnecter</a>
            </div>
        </div>

        <div class="wrap-content-body">
            <div class="create-form-cover">
                <div></div>
                <form action="{{ route('members.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <h1>Créer un membre</h1>
                    <p>Renseignez les informations et la photo du membre que vous voulez crééer.</p>

                    @if (count($errors) > 0)
                        <div class="error-label">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div><br />
                    @endif

                    <label for="name">Nom complet du membre</label>
                    <input type="text" id="name" required name="name" placeholder="Saisir le nom complet ici ...">

                    <label for="description">Titre ou description</label>
                    <textarea name="description" required id="description" rows="3" placeholder="Saisir la description ici ..."></textarea>

                    <label for="file" class="input-file">
                        + Choisir une photo
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
