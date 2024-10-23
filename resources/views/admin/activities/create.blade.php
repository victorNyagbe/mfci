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
                    <a href="{{ route('activities.index') }}">Activites</a>
                </li>
            </ul>
            <div class="logot-links">
                <a href="#" class="logout">Se déconnecter</a>
            </div>
        </div>

        <div class="wrap-content-body">
            <div class="create-form-cover">
                <div></div>
                <form action="{{ route('activities.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <h1>Créer une activité</h1>
                    <p>Renseignez les informations et l'image de l'activité que vous voulez crééer.</p>

                    @if (count($errors) > 0)
                        <div class="error-label">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div><br />
                    @endif

                    <label for="day">Jour de l'activité</label>
                    <select name="day" id="day" required>
                        <option value="Lundi">Lundi</option>
                        <option value="Mardi">Mardi</option>
                        <option value="Mercredi">Mercredi</option>
                        <option value="Jeudi">Jeudi</option>
                        <option value="Vendredi">Vendredi</option>
                        <option value="Samedi">Samedi</option>
                        <option value="Dimande">Dimande</option>
                    </select>

                    <label for="title">Titre ou nom de l'activité</label>
                    <input type="text" name="title" id="title" required
                        placeholder="Saisir le titre ou le nom ici ..." />

                    <label for="date">Date ou heure</label>
                    <input type="text" name="date" id="date" required
                        placeholder="Saisir la date et l'heure de l'évènement ici ..." />

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
