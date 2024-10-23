@extends('layout.base')

@section('content')
    @include('includes.sidebar')

    <div class="wrap-content">
        @include('includes.appbar')

        <div class="wrap-content-body">
            <table width="100%">
                <tbody>
                    <tr>
                        <td>
                            <h1>
                                Liste des médias
                            </h1>
                        </td>
                        <td width="20">
                            <a href="{{ route('medias.create') }}" class="button">
                                Créer
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br />

            <div class="media-cover d-grid-4">
                @foreach ($albums as $album)
                    <div class="media-item">
                        <div class="media-image" style="background-image: url({{ URL::asset('storage/app/public/' . $album->files[0]->file) }})">
                            <div class="media-mask">
                                <div class="text-ellipsis">
                                    {{ $album->title }}
                                </div>
                            </div>
                        </div>
                        <div class="media-actions">
                            <a href="{{ route('medias.edit', $album->id) }}" class="button full-width">
                                Modifier
                            </a>
                            <form action="{{ route('medias.destroy', $album->id) }}"
                                onsubmit="return confirm('Êtes-vous sûre de vouloir supprimer cet album ? Cette action sera irréversible.')"
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
