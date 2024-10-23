@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/Admin/bannieres.css') }}">
@endsection

@section('content')
    @include('includes.sidebar')

    <div class="wrap-content">

        <div class="app-bar">
            <ul class="app-bar-links">
                <li class="app-bar-link-item">
                    <a href="{{ route('dashboard') }}">Home</a>
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
                                Liste des banières
                            </h1>
                        </td>
                        <td width="20">
                            <a href="{{ route('banners.create') }}" class="button">
                                Créer
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br />

            <div class="media-cover d-grid-4">
                @foreach ($banners as $banner)
                    <div class="media-item">
                        <div class="media-image" style="background-image: url({{ URL::asset('storage/app/public/' . $banner->file) }})">
                            <div class="media-mask align-center">
                                <div>
                                    <div class="text-center">
                                        <h2><b>{{ $banner->title }}</b></h2>
                                        {{ $banner->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="actions-button">
                            <a href="{{ route('banners.edit', $banner->id) }}" class="button-edit">Editer</a>
                            <form action="{{ route('banners.destroy', $banner->id) }}"
                                onsubmit="return confirm('Êtes-vous sûre de vouloir supprimer cette bannière ? Cette action sera irréversible.')"
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
