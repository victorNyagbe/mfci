@extends('layout.base')

@section('content')
    <div class="auth-cover">
        <form action="{{ route('newPassword.processing') }}" method="post">

            @csrf
            @method('POST')

            <h1>Mot de passe</h1>
            <p>Renseignez votre nouveau mot de passe puis confirmez-le dans les champs.</p>

            @if (count($errors) > 0)
                <div class="error-label">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div><br />
            @endif

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Saisir votre mot de passe ..." />
            <br />
            <label for="passwordConfirm">Confirmer le mot de passe</label>
            <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Confirmer le mot depasse ici ..." />

            <button class="button full-width">
                Se connecter
            </button>
        </form>
    </div>
@endsection
