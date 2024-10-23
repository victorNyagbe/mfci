@extends('layout.base')

@section('content')
    @include('includes.sidebar')

    <div class="wrap-content">
        @include('includes.appbar')

        <div class="wrap-content-body">
            <h1>
                Donations
            </h1><br />

            <form action="{{ route('donations.update', $donation->id) }}" method="post">
                @csrf
                @method('PUT')
                <textarea name="donation" id="summernote">{{ $donation->donation }}</textarea><br />

                <button class="button">
                    Soumettre
                    &nbsp;
                    &rightarrow;
                </button>
            </form>

        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                placeholder: 'Saisir un texte sur les donations ici ...'
            })
        })
    </script>
@endsection
