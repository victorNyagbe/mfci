{{-- <div class="app-bar">
    <table width=100%>
        <tbody>
            <tr>
                <td>
                    <a href="{{ route('dashboard') }}"><b>Home</b></a>
                </td>
                <td style="text-align: right;">
                    <a href="{{ route('logout') }}">
                        <b>Se déconnecter</b>
                    </a>
                </td>
                <td width="60%" style="text-align: right;">
                    <div class="menu-toggle">
                        <a href="#!">
                            <img src="{{ URL::asset('assets/images/menu.png') }}" alt="menu" width="20">
                        </a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div> --}}

<div class="app-bar">
    <ul class="app-bar-links">
        <li class="app-bar-link-item">
            <a href="{{ route('dashboard') }}">Home</a>
        </li>
        @yield('app-bar-link-items')
    </ul>
    <div class="logot-links">
        <a href="#" class="logout">Se déconnecter</a>
    </div>
</div>
