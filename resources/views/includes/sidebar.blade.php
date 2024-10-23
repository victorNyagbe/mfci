<div class="side-bar">
    <h3>
        <img src="{{ URL::asset('assets/images/logo.png') }}" alt="Logo" width="20">
        &nbsp;&nbsp;
        Mission For Christ Intl
    </h3>
    <br />
    <div class="middle-title">
        <h4>Tabeau de bord</h4>
    </div>

    <ul>
        <li>
            <a href="{{ route('banners.index') }}">
                <div>
                    Gestion des bannières
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('members.index') }}">
                <div>
                    Liste des membres
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('activities.index') }}">
                <div>
                    Liste des activités
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('annexes.index') }}">
                <div>
                    Liste des annexes
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('medias.index') }}">
                <div>
                    Gestion de médias
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('articles.index') }}">
                <div>
                    Gestion des articles
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('testimonies.index') }}">
                <div>
                    Gestion des témoignages
                </div>
            </a>
        </li>
    </ul>
    <br />
    <div class="middle-title">
        <small>Contenu</small>
    </div>

    <ul>
        <li>
            <a href="{{ route('about.index') }}">
                <div>
                    En savoir plus
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('donations.index') }}">
                <div>
                    Donations
                </div>
            </a>
        </li>
    </ul><br />

    <div class="middle-title">
        <small>Compte</small>
    </div>

    <ul>
        <li>
            <a href="{{ route('logout') }}">
                <div>
                    Se déconnecter
                </div>
            </a>
        </li>
    </ul>
</div>
