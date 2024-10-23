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
                                Liste des membres
                            </h1>
                        </td>
                        <td width="20">
                            <a href="{{ route('members.create') }}" class="button">
                                Créer
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br />

            <div class="media-cover d-grid-4">
                @foreach ($members as $member)
                    <div class="media-item">
                        <div class="media-image" style="background-image: url({{ URL::asset('storage/app/public/' . $member->file) }})">

                        </div>
                        <div style="margin-bottom: 8px;">
                            <h4 class="text-ellipsis">{{ $member->name }}</h4>
                            <div class="text-ellipsis">
                                {{ $member->description }}
                            </div>
                        </div>
                        <div class="media-actions">
                            <a href="{{ route('members.edit', $member->id) }}" class="button full-width">
                                Modifier
                            </a>
                            <form action="{{ route('members.destroy', $member->id) }}"
                                onsubmit="return confirm('Êtes-vous sûre de vouloir supprimer ce membre ? Cette action sera irréversible.')"
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
