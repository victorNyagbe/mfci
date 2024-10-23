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
                                Liste des annexes
                            </h1>
                        </td>
                        <td width="20">
                            <a href="{{ route('annexes.create') }}" class="button">
                                Créer
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br />

            <div class="media-cover d-grid-4">
                @foreach ($annexes as $annex)
                    <div class="media-item">
                        <div class="media-image ratio-3-2"
                            style="background-image: url({{ URL::asset('storage/app/public/' . $annex->file) }})">

                        </div>
                        <div style="margin-bottom: 8px;" class="text-ellipsis">
                            {{ $annex->address }}
                        </div>
                        <div class="media-actions">
                            <a href="{{ route('annexes.edit', $annex->id) }}" class="button full-width">
                                Modifier
                            </a>
                            <form action="{{ route('annexes.destroy', $annex->id) }}"
                                onsubmit="return confirm('Êtes-vous sûre de vouloir supprimer cette annexe ? Cette action sera irréversible.')"
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
