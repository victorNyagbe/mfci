@extends('layout.base')

@section('content')
    @include('includes.sidebar')

    <div class="wrap-content">
        <div class="app-bar">
            <ul class="app-bar-links">
                <li class="app-bar-link-item">
                    <a href="{{ route('dashboard') }}">Accueil</a>
                </li>
            </ul>
            <div class="logot-links">
                <a href="#" class="logout">Se déconnecter</a>
            </div>
        </div>

        <div class="wrap-content-body">
            <table width="100%">
                <tbody>
                    <tr>
                        <td>
                            <h1>
                                Liste des activités
                            </h1>
                        </td>
                        <td width="20">
                            <a href="{{ route('activities.create') }}" class="button">
                                Créer
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br />

            <div class="media-cover d-grid-4">
                @foreach ($activities as $activity)
                    <div class="media-item">
                        <div class="media-image" style="background-image: url({{ URL::asset('storage/app/public/' . $activity->file) }})">

                        </div>
                        <div style="margin-bottom: 8px;" class="text-ellipsis">
                            {{ $activity->title }}
                        </div>
                        <div class="media-actions">
                            <a href="{{ route('activities.edit', $activity->id) }}" class="button full-width">
                                Modifier
                            </a>
                            <form action="{{ route('activities.destroy', $activity->id) }}"
                                onsubmit="return confirm('Êtes-vous sûre de vouloir supprimer cette activité ? Cette action sera irréversible.')"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button full-width bg-dark">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
