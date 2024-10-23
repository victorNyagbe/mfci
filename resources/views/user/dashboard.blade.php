@extends('layout.base')

@section('content')
    @include('includes.sidebar')

    <div class="wrap-content">
        @include('includes.appbar')

        <div class="dashboard-welcome">
            <div class="text-center">
                <img src="{{ URL::asset('assets/images/logo.png') }}" alt="Logo" width="80"><br /><br />
                <h2>Bienvenue sur votre interface d'administration.</h2>
            </div>
        </div>
    </div>
@endsection
