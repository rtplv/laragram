<header class="main-layout-header">
    <article class="main-layout-header-logo">
        <a href="/">
            <img class="main-layout-header-logo__image"
                 src="{{ asset('/assets/logo.png') }}"
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
        @if($userLoggedIn)
            <button class="main-layout-header-user__create-post-button button">
                <span class="icon is-small">
                  <i class="fas fa-plus"></i>
                </span>
                <span>Новый пост</span>
            </button>
        @endif

        <user-dropdown :user-logged-in="{{ $userLoggedIn ? 'true' : 'false' }}"></user-dropdown>
    </article>
</header>
