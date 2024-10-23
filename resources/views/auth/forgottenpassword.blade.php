@extends('layout.base')

@section('content')
    <div class="auth-cover">
        <form action="{{ route('forgottenPassword.processing') }}" method="post">
            @csrf
            @method('POST')

            <h1>Mot de passe oublié ?</h1>
            <p>Renseignez vos paramètres de connexion pour vous connecter à votre compte.</p>

            @if (count($errors) > 0)
                <div class="error-label">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div><br />
            @endif

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Saisir votre e-mail ..." value="{{ old('email') }}" />
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
