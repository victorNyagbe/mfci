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
                    <a href="{{ route('annexes.index') }}">Annexes</a>
                </li>
            </ul>
            <div class="logot-links">
                <a href="#" class="logout">Se déconnecter</a>
            </div>
        </div>

        <div class="wrap-content-body">
            <div class="create-form-cover">
                <div></div>
                <form action="{{ route('annexes.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <h1>Créer une annexe</h1>
                    <p>Renseignez les informations et l'image de l'annexe que vous voulez crééer.</p>

                    @if (count($errors) > 0)
                        <div class="error-label">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div><br />
                    @endif

                    <label for="address">Lieu ou adresse complète</label>
                    <input type="text" name="address" id="address" placeholder="Saisir le lieu ou l'adresse complète ici ..." />

                    <label for="contact">Contact de l'annexe</label>
                    <input type="text" name="contact" id="contact" placeholder="Saisir le contact ici ..." />

                    <label for="file" class="input-file">
                        + Choisir une image
                        <input type="file" name="file" accept="image/*" required id="file">
                    </label>

                    <button type="submit" class="button full-width">
                        Publier
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
