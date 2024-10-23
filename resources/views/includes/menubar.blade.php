<header class="menu-bar">
    <div class="menu-content">
        <div class="menu-toggler" id="menu-icon-container">
            <i class="fa fa-bars menu-icon"></i>
        </div>
        <div class="logo-link">
            <a href="{{ route('guests.home') }}">
                <img src="{{ URL::asset('assets/images/logo.png') }}" alt="logo" width="40">
            </a>
        </div>
        <ul class="menu-list">
            <li>
                <a href="{{ route('guests.annexe') }}">
                    Nos annexes
                </a>
            </li>
            <li>
                <a href="{{ route('guests.about') }}">
                    En savoir plus
                </a>
            </li>
            <li>
                <a href="{{ route('guests.members') }}">
                    Nos leaders
                </a>
            </li>
            <li>
                <a href="{{ route('guests.activities') }}">
                    Nos activités
                </a>
            </li>
            <li>
                <a href="{{ route('guests.articles.index') }}">
                    Nos articles
                </a>
            </li>
            <li>
                <a href="{{ route('guests.albums.index') }}">
                    Média album
                </a>
            </li>
            <li>
                <a href="{{ route('guests.testimonies') }}">
                    Témoignages
                </a>
            </li>
        </ul>
    </div>
    <div class="donation-content">
        <a href="{{ route('guests.donation') }}" class="button" style="display: inline-block;">
            Nous faire un don
        </a>
    </div>
</header>
