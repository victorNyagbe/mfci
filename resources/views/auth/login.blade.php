@extends('layout.base')

@section('content')
    <div class="auth-cover">
        <form action="{{ route('login.processing') }}" method="post">
            @csrf
            @method('POST')

            <h1>Connexion</h1>
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
            <br />
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Saisir votre mot de passe ..." />
            <br />
            <div>
                <a href="{{ route('forgottenPassword') }}">
                    Mot de passe oublié ?
                    &nbsp;
                    &RightArrow;
                </a>
            </div><br />
            <button class="button full-width">
                Se connecter
            </button>
        </form>
    </div>
@endsection
