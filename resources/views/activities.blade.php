@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/activities.css') }}">
@endsection

@section('content')
    @include('includes.menubar')

    <div class="page-header">
        <div class="page-header-cover">
            <h1>Nos activités</h1>
        </div>
    </div>

    <div class="content-container">
        <div class="activities-container">
            @foreach ($activities as $activity)
                <div class="activity-item">
                    <figure class="activity-image">
                        <img src="{{ asset('storage/app/public/' . $activity->file) }}" alt="Image de : {{ $activity->title }}">
                    </figure>
                    <div class="activity-content">
                        <h2 class="activity-title">{{ $activity->title }}</h2>
                        <div>{{ $activity->day }}, {{ $activity->date }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('includes.footer')
@endsection

@section('js')

@endsection
