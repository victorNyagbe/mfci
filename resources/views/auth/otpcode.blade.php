@extends('layout.base')

@section('content')
    <div class="auth-cover">
        <form action="{{ route('otpCode.processing') }}" method="post">
            @csrf
            @method('POST')

            <h1>Code de confirmation</h1>
            <p>Un code ed confirmation a été envoyé à votre adresse e-mail, saisissez-le dans le champs pour continuer.</p>

            @if (count($errors) > 0)
                <div class="error-label">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div><br />
            @endif

            <label for="email">Code de confirmation</label>
            <input type="text" id="email" name="code" autocomplete="off"
                placeholder="Saisir le code de confirmation ..." required value="{{ old('code') }}" />
            <button class="button full-width">
                Soumettre
            </button><br />

            <p>
                <a href="{{ route('login') }}">
                    &LeftArrow;&nbsp;&nbsp;
                    Retour à la connexion
                </a>
            </p>
        </form>
    </div>
@endsection
