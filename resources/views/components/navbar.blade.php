<style>
    .presto-navbar .nav-link:hover {
        color: #D4AF37 !important;
    }

    .presto-navbar .dropdown-item:hover,
    .presto-navbar .dropdown-item:focus {
        background-color: #D4AF37 !important;
        color: #111111 !important;
    }
</style>

<nav
    class="navbar navbar-expand-lg navbar-dark shadow presto-navbar"
    style="
        background-color: #0B0B0B !important;
        border-bottom: 1px solid #D4AF37;
    ">

    <div class="container">

        <a
            class="navbar-brand fw-bold fs-3"
            href="{{ route('home') }}"
            style="
                color: #D4AF37 !important;
                letter-spacing: 1px;
            ">

            Presto

        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
            style="border-color: #D4AF37;">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('articles.index') }}"
                        style="color: #F8F8F8;">

                        {{ __('messages.ads') }}

                    </a>

                </li>

                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="categoriesDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        style="color: #F8F8F8;">

                        {{ __('messages.categories') }}

                    </a>

                    <ul
                        class="dropdown-menu shadow"
                        style="
                            background-color: #151515;
                            border: 1px solid #D4AF37;
                        ">

                        @foreach($categories as $category)

                            <li>

                                <a
                                    class="dropdown-item"
                                    href="{{ route('articles.byCategory', $category) }}"
                                    style="color: #F8F8F8;">

                                    {{ __('messages.'.$category->name) }}

                                </a>

                            </li>

                        @endforeach

                    </ul>

                </li>

                @auth

                    @if(auth()->user()->is_revisor)

                        <li class="nav-item">

                            <a
                                class="nav-link"
                                href="{{ route('revisor.index') }}"
                                style="color: #F8F8F8;">

                                {{ __('messages.revisor_area') }}

                                <span
                                    class="badge"
                                    style="
                                        background-color: #D4AF37;
                                        color: #111111;
                                    ">

                                    {{ \App\Models\Article::toBeRevisedCount() }}

                                </span>

                            </a>

                        </li>

                    @endif

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ route('articles.create') }}"
                            style="color: #F8F8F8;">

                            {{ __('messages.new_article') }}

                        </a>

                    </li>

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ route('work.with.us') }}"
                            style="color: #F8F8F8;">

                            {{ __('messages.work_with_us') }}

                        </a>

                    </li>

                    <li class="nav-item">

                        <form action="{{ route('logout') }}" method="POST">

                            @csrf

                            <button
                                class="btn btn-link nav-link text-decoration-none"
                                style="color: #F8F8F8;">

                                {{ __('messages.logout') }}

                            </button>

                        </form>

                    </li>

                @else

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ route('login') }}"
                            style="color: #F8F8F8;">

                            {{ __('messages.login') }}

                        </a>

                    </li>

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ route('register') }}"
                            style="color: #D4AF37;">

                            {{ __('messages.register') }}

                        </a>

                    </li>

                @endauth

                <li class="nav-item ms-lg-3 d-flex align-items-center">

                    <a
                        href="{{ route('locale.set', 'it') }}"
                        class="me-2">

                        <img
                            src="https://flagcdn.com/32x24/it.png"
                            width="24"
                            alt="Italiano">

                    </a>

                    <a
                        href="{{ route('locale.set', 'en') }}"
                        class="me-2">

                        <img
                            src="https://flagcdn.com/32x24/gb.png"
                            width="24"
                            alt="English">

                    </a>

                    <a href="{{ route('locale.set', 'es') }}">

                        <img
                            src="https://flagcdn.com/32x24/es.png"
                            width="24"
                            alt="Español">

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>