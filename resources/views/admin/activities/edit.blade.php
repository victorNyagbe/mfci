@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/Admin/activites.css') }}">
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
                    <a href="{{ route('activities.index') }}">Activites</a>
                </li>
            </ul>
            <div class="logot-links">
                <a href="#" class="logout">Se déconnecter</a>
            </div>
        </div>

        <div class="wrap-content-body">
            <div class="edit-form-cover">
                <digure class="activity-img">
                    @if ($activity->file)
                        <img src="{{ asset('storage/app/public/' . $activity->file) }}" alt="">
                    @endif
                </digure>
                <form action="{{ route('activities.update', $activity->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h1>Modifier une activité</h1>
                    <p>Renseignez les informations et l'image de l'activité que vous voulez mettre à jour.</p>

                    @if (count($errors) > 0)
                        <div class="error-label">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div><br />
                    @endif

                    <label for="day">Jour de l'activité</label>
                    <select name="day" id="day" required>
                        <option value="Lundi" {{ $activity->day == 'Lundi' ? 'selected' : '' }}>Lundi</option>
                        <option value="Mardi" {{ $activity->day == 'Mardi' ? 'selected' : '' }}>Mardi</option>
                        <option value="Mercredi" {{ $activity->day == 'Mercredi' ? 'selected' : '' }}>Mercredi</option>
                        <option value="Jeudi" {{ $activity->day == 'Jeudi' ? 'selected' : '' }}>Jeudi</option>
                        <option value="Vendredi" {{ $activity->day == 'Vendredi' ? 'selected' : '' }}>Vendredi</option>
                        <option value="Samedi" {{ $activity->day == 'Samedi' ? 'selected' : '' }}>Samedi</option>
                        <option value="Dimande" {{ $activity->day == 'Dimande' ? 'selected' : '' }}>Dimande</option>
                    </select>

                    <label for="title">Titre ou nom de l'activité</label>
                    <input type="text" name="title" id="title" required
                        placeholder="Saisir le titre ou le nom ici ..." value="{{ $activity->title }}" />

                    <label for="date">Date ou heure</label>
                    <input type="text" name="date" id="date" required
                        placeholder="Saisir la date et l'heure de l'évènement ici ..." value="{{ $activity->date }}" />

                    <label for="file" class="input-file">
                        + Choisir une image
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
