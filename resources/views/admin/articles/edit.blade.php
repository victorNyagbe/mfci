@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/Admin/articles.css') }}">
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
                    <a href="{{ route('articles.index') }}">Articles</a>
                </li>
            </ul>
            <div class="logot-links">
                <a href="#" class="logout">Se déconnecter</a>
            </div>
        </div>


        <div class="wrap-content-body">
            <div class="edit-form-cover">
                <figure class="article-img">
                    @if ($article->file)
                        <img src="{{ URL::asset('storage/app/public/' . $article->file) }}" alt="{{ $article->address }}" width="100%">
                    @endif
                </figure>
                <form action="{{ route('articles.update', $article->id) }}" method="post" enctype="multipart/form-data" id="article-form">
                    @csrf
                    @method('PUT')

                    <h1>Modifier un article</h1>
                    <p>Renseignez les informations et l'image de l'article que vous voulez modifier.</p>

                    @if (count($errors) > 0)
                        <div class="error-label">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div><br />
                    @endif



                    <label for="title">Titre de l'article</label>
                    <input type="text" id="title" name="title" required
                        placeholder="Saisir le titre de la bannière ici ..." value="{{ $article->title }}">

                    <label for="description">Description de l'article</label>
                    <textarea name="description" id="description" required rows="3" placeholder="Saisir la description ...">{!! $article->description !!}</textarea>
                    <textarea name="subtitle" id="descriptionText" class="d-none"></textarea>

                    <label for="file" class="input-file">
                        + Choisir une image
                        <input type="file" name="file" accept="image/*" id="file">
                    </label>

                    <button class="button full-width">
                        Mettre à jour
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $('#article-form').on('submit', function(e) {
                const editorCode = $('#description').summernote('code').replace(/<\/?[^>]+(>|$)/g, " ");
                $('#descriptionText').val(editorCode);
                console.log($('#descriptionText').val());

            })

            $('#description').summernote({
                lang: 'fr-FR',
                minHeight: 200,
                tabsize: 2,
                placeholder: 'Veuillez rensigner le texte ici...',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']]
                ]
            });
        });
    </script>
@endsection
