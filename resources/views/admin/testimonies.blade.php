@extends('layout.base')

@section('css')
    <style>
        .form-content {
            width: 50%
        }

        form {
            display: flex;
            column-gap: .5rem;
        }

        input {
            margin-top: 0;
            margin-bottom: 0;
        }

        button {
            border: none;
            outline: none;
            padding: .2rem 1rem;
            background-color: #cdb606;
            font-family: poppins-regular;
            cursor: pointer;
        }

        .testimonies_container {
            margin-top: 2rem;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 1.5rem;
        }

        .testimony_item {
            width: 100%;
        }

        .testimony_item iframe {
            height: clamp(25vh, 35vh, 40vh);
            width: 100%;
        }

    </style>
@endsection

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
                                Témoignages
                            </h1>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br />

            <div class="form-content">
                <form action="{{ route('testimonies.store') }}" method="POST">
                    @csrf
                    <input type="url" name="youtube_url" id="youtube_url" placeholder="Le lien Youtube...">
                    <button type="submit">Enregistrer</button>
                </form>
            </div>

            <div class="testimonies_container">
                @foreach ($testimonies as $testimony)
                    <div class="testimony_item">
                        <iframe src="https://www.youtube.com/embed/{{ $testimony->url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
    </script>
@endsection
