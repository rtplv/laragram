<header class="main-layout-header">
    <article class="main-layout-header-logo">
        <a href="/">
            <img class="main-layout-header-logo__image"
                 src="{{ asset('assets/logo.png') }}"
                 alt="Laragram">
        </a>
    </article>

    @if(\Illuminate\Support\Facades\Auth::check())
        <nav class="main-layout-header-navigation">
            <ul class="ui-navbar">
                <li>
                    <a href="/feed">
                        Лента
                    </a>
                </li>
            </ul>
        </nav>
    @endif

    <article class="main-layout-header-user">
{{--        <a class="main-layout-header-user__link ui-link"--}}
{{--           href="#">--}}
{{--            Ruslan Tupolev--}}
{{--            <i class="main-layout-header-user__link-icon fas fa-chevron-down"></i>--}}
{{--        </a>--}}
        <user-dropdown></user-dropdown>
    </article>
</header>
