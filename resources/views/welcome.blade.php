@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
@endsection

@section('content')
    <div class="full-banner">
        <div class="swiper" id="bannerSwiper">
            <!-- Additional required wrapper -->
            @include('includes.menubar')
            <div class="swiper-wrapper">
            <!-- Slides -->
                @foreach ($banners as $banner)
                    <div class="swiper-slide full-banner-image" style="background-image: url(storage/app/public/{{ $banner->file }});">

                        <div class="banner-mask">
                            <div>
                                <div class="banner-title">
                                    {{ $banner->title }}
                                </div>
                                <div class="banner-description">
                                    {{ $banner->description }}
                                </div><br /><br />

                                <div class="buttons">
                                    <a href="{{ route('guests.about') }}" class="button bg-light">
                                        En savoir plus &rightarrow;
                                    </a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('guests.donation') }}" class="button">
                                        Nous faire un don
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- @foreach ($banners as $banner)
            @if ($loop->last)
                <div class="full-banner-image" style="background-image: url(storage/app/public/{{ $banner->file }});">

                    @include('includes.menubar')

                    <div class="banner-mask">
                        <div>
                            <div class="banner-title">
                                {{ $banner->title }}
                            </div>
                            <div class="banner-description">
                                {{ $banner->description }}
                            </div><br /><br />

                            <div class="buttons">
                                <a href="{{ route('guests.about') }}" class="button bg-light">
                                    En savoir plus &rightarrow;
                                </a>
                                &nbsp;&nbsp;&nbsp;
                                <a href="{{ route('guests.donation') }}" class="button">
                                    Nous faire un don
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach --}}
    </div>
    <div class="leaders-section" id="leaders-section">
        <div class="section-title">
            Nos leaders
        </div>
        <div class="section-description">
            Parcourez la liste des différents membres et leaders principaux de notre communauté.
        </div><br />

        <div class="section-separator"></div>

        <br /><br />
        <div class="leaders-grid" data-aos="fade-up" data-aos-delay="10">
            @foreach ($members as $member)
                <div class="leader-card">
                    <div class="leader-card-media">
                        <img src="storage/app/public/{{ $member->file }}" alt="{{ $member->name }}" width="100%">
                    </div>
                    <h3><b>{{ $member->name }}</b></h3>
                    <div>{{ $member->description }}</div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-center">
        <a href="{{ route('guests.members') }}" class="button bg-dark" style="display: inline-block">
            Tous les membres
        </a>
    </div><br /><br /><br />

    <div class="container" id="about-section">
        <div class="about-text-container" data-aos="zoom-in">
            <div class="about-text" style="margin-bottom: 1.3rem">
                {!! $content->about !!}
            </div>
            <a href="{{ route('guests.about') }}" style="font-weight: 700;">Lire la suite</a>
        </div>
        <figure class="about-image">
            <img src="{{ asset('storage/app/public/' . $aboutFile->filepath) }}" alt="Image en savoir plus" data-aos="flip-right">
        </figure>
    </div>

    <div class="container" id="activities-section">
        <div class="text-center">
            <div class="section-title">
                Nos activités
            </div>
            <div class="section-description">
                Découvrirez les différentes activités que nous organisons dans nos églises.
            </div><br />

            <div class="section-separator"></div>
        </div><br /><br />

        <div class="activity-testimony">
            <div class="activities-grid" id="activitiesGrid" data-aos="fade-right">
                @foreach ($activities as $activity)
                    <div class="activity-card">
                        <figure class="activity-card-media">
                            <img src="{{ asset('storage/app/public/' . $activity->file) }}" alt="Image de : {{ $activity->title }}" width="100%">
                            <div class="activity-card-content">
                                <h3><b>{{ $activity->title }}</b></h3>
                                <div>{{ $activity->day }}, {{ $activity->date }}</div>
                            </div>
                        </figure>
                    </div>
                @endforeach
            </div>
            <div class="testimonies-grid" data-aos="fade-left">
                <div class="slide-ytb">
                    <iframe src="https://www.youtube.com/embed/{{ $testimony->url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="seemore-container">
            <a href="{{ route('guests.activities') }}" class="seemore-button">Toutes les activités</a>
        </div>
    </div><br /><br /><br />

    <div class="container">
        <div class="text-center">
            <div class="section-title">
                Nos articles
            </div>
            <div class="section-description">
                Découvrirez nos articles et évènements.
            </div><br />

            <div class="section-separator"></div>
        </div><br /><br />

        <div class="articles-grid" data-aos="fade-down">
            @foreach ($articles as $article)
                <div class="article-card">
                    <div class="article-card-media">
                        <img src="storage/app/public/{{ $article->file }}" alt="{{ $article->title }}" width="100%">
                    </div>
                    <div class="article-card-content">
                        <h3 class="article-title"><strong>{{ $article->title }}</strong></h3>
                        <a href="{{ route('guests.articles.show', $article) }}" class="article-link">En savoir plus</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="seemore-container">
            <a href="{{ route('guests.articles.index') }}" class="seemore-button">Tous les articles</a>
        </div>
    </div><br /><br /><br />

    <div class="newsletter-container container">
        <h2 class="newsletter-title">S'abonner au Newsletter</h2>
        <p class="newsletter-description">Pour ne rater aucune de nos informations importantes.</p>
        <form action="{{ route('guests.subscribeToNewsletter') }}" method="post" class="newsletter-form">
            @csrf
            <div class="input-group">
                <input type="email" name="newsletter_email" id="newsletter_email" class="newsletter_email" placeholder="Adresse électronique...">
                <button type="submit" class="newsletter_btn">s'abonner</button>
            </div>
        </form>
    </div>

    <div class="container" id="albums-section">
        <div class="text-center">
            <div class="section-title">
                Media Album
            </div>
            <div class="section-description">
                Notre gallerie d'images, de vidéos et autres médias.
            </div><br />

            <div class="section-separator"></div>
        </div><br /><br />

        <div class="album-grid">
            @foreach ($albums as $album)
                <div class="album-card" data-aos="flip-down">
                    <figure class="album-card-media">
                        <img src="storage/app/public/{{ $album->files[0]->file }}" alt="{{ $album->title }}" width="100%">
                        <div class="album-card-content">
                            <h5><strong>{{ $album->title }}</strong></h5>
                            <a href="{{ route('guests.albums.show', $album) }}" class="see-album">
                                <span>&plus;</span>
                            </a>
                        </div>
                    </figure>
                </div>
            @endforeach
        </div>
        <div class="seemore-container">
            <a href="{{ route('guests.albums.index') }}" class="seemore-button">Tous nos albums</a>
        </div>
    </div><br /><br /><br />

    @include('includes.footer')
@endsection

@section('js')
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script>
        const swiper = new Swiper('#bannerSwiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            effect: "fade",
            fadeEffect: {
                crossFade: true
            },
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },

            // If we need pagination
            pagination: {
            el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
            el: '.swiper-scrollbar',
            },
        });


        window.addEventListener("scroll", function (e) {
            const leaderSection = document.querySelector('.leaders-section');

            const leaderScrollY = window.scrollY;
            const leaderScrollThreshold = 500;

            if (leaderScrollY > leaderScrollThreshold) {
                leaderSection.style.zIndex = -1;
            } else {
                leaderSection.style.zIndex = 1;
            }
        })

        window.onload = function () {
            let activitiesGrid = document.getElementById('activitiesGrid');
            let ytbIframe = document.querySelector('.slide-ytb iframe');

            let activitiesGridHeight = activitiesGrid.offsetHeight;

            ytbIframe.style.height = activitiesGridHeight + 'px';


        }

        window.onresize = function () {
            let activitiesGrid = document.getElementById('activitiesGrid');
            let ytbIframe = document.querySelector('.slide-ytb iframe');

            let activitiesGridHeight = activitiesGrid.offsetHeight;

            ytbIframe.style.height = activitiesGridHeight + 'px';

            if (window.innerWidth < 769) {
                ytbIframe.style.height = '100%';
            }
        }

        if (window.matchMedia('(max-width: 769px)').matches) {
            let ytbIframe = document.querySelector('.slide-ytb iframe');
            ytbIframe.style.height = '100%';
        }
    </script>
@endsection
