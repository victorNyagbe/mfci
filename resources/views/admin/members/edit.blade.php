@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/Admin/membres.css') }}">
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
                    <a href="{{ route('members.index') }}">Membres</a>
                </li>
            </ul>
            <div class="logot-links">
                <a href="#" class="logout">Se déconnecter</a>
            </div>
        </div>

        <div class="wrap-content-body">
            <div class="edit-form-cover">
                <figure class="member-img">
                    <img src="{{ asset('storage/app/public/' . $member->file) }}" alt="{{ $member->name }}">
                </figure>
                <form action="{{ route('members.update', $member->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h1>Modifier un membre</h1>
                    <p>Renseignez les informations et la photo du membre que vous voulez mettre à jour.</p>

                    @if (count($errors) > 0)
                        <div class="error-label">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div><br />
                    @endif

                    <label for="name">Nom complet du membre</label>
                    <input type="text" id="name" required name="name" placeholder="Saisir le nom complet ici ..." value="{{ $member->name }}" />

                    <label for="description">Titre ou description</label>
                    <textarea name="description" required id="description" rows="3" placeholder="Saisir la description ici ...">{{ $member->description }}</textarea>

                    <label for="file" class="input-file">
                        + Choisir une photo
                        <input type="file" name="file" accept="image/*" id="file">
                    </label>

                    <button class="button full-width">
                        Publier
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
