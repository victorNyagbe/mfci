@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/members.css') }}">
@endsection

@section('content')
    @include('includes.menubar')

    <div class="page-header">
        <div class="page-header-cover">
            <h1>Nos leaders</h1>
        </div>
    </div>

    <div class="content-container">
        <div class="leaders-grid">
            @foreach ($members as $member)
                <div class="leader-card">
                    <div class="leader-card-media">
                        <img src="storage/app/public/{{ $member->file }}" alt="{{ $member->name }}" width="100%">
                    </div>
                    <div class="leader-card-content">
                        <h3><b>{{ $member->name }}</b></h3>
                        <div>{{ $member->description }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('includes.footer')
@endsection

@section('js')

@endsection
