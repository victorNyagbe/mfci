@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/Admin/annexes.css') }}">
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
                    <a href="{{ route('annexes.index') }}">Annexes</a>
                </li>
            </ul>
            <div class="logot-links">
                <a href="#" class="logout">Se déconnecter</a>
            </div>
        </div>

        <div class="wrap-content-body">
            <div class="edit-form-cover">
                <figure class="annexe-img">
                    <img src="{{ asset('storage/app/public/' . $annex->file) }}" alt="Annexe adresse">
                </figure>
                <form action="{{ route('annexes.update', $annex->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h1>Modifier une annexe</h1>
                    <p>Renseignez les informations et l'image de l'annexe que vous voulez mettre à jour.</p>

                    @if (count($errors) > 0)
                        <div class="error-label">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div><br />
                    @endif

                    <label for="address">Lieu ou adresse complète</label>
                    <input type="text" name="address" id="address"
                        placeholder="Saisir le lieu ou l'adresse complète ici ..." value="{{ $annex->address }}" />

                    <label for="contact">Contact de l'annexe</label>
                    <input type="text" name="contact" id="contact" placeholder="Saisir le contact ici ..."
                        value="{{ $annex->contact }}" />

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
