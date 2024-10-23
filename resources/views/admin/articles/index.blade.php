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
                                Liste des articles
                            </h1>
                        </td>
                        <td width="20">
                            <a href="{{ route('articles.create') }}" class="button">
                                Créer
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br />

            <div class="media-cover d-grid-4">
                @foreach ($articles as $article)
                    <div class="media-item">
                        <div class="media-image" style="background-image: url({{ URL::asset('storage/app/public/' . $article->file) }})">

                        </div>
                        <div style="margin-bottom: 8px;" class="text-ellipsis">
                            <b>{{ $article->title }}</b>
                        </div>
                        <div class="media-actions">
                            <a href="{{ route('articles.edit', $article->id) }}" class="button full-width">
                                Modifier
                            </a>
                            <form action="{{ route('articles.destroy', $article->id) }}"
                                onsubmit="return confirm('Êtes-vous sûre de vouloir supprimer cet article ? Cette action sera irréversible.')"
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
