<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            Presto
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}">
                        {{ __('messages.ads') }}
                    </a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       id="categoriesDropdown"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

                        {{ __('messages.categories') }}

                    </a>

                    <ul class="dropdown-menu">

                        @foreach($categories as $category)

                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('articles.byCategory', $category) }}">
                                    {{ __('messages.'.$category->name) }}
                                </a>
                            </li>

                        @endforeach

                    </ul>

                </li>

                @auth

                    @if(auth()->user()->is_revisor)

                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('revisor.index') }}">

                                {{ __('messages.revisor_area') }}

                                <span class="badge bg-warning text-dark">
                                    {{ \App\Models\Article::toBeRevisedCount() }}
                                </span>

                            </a>

                        </li>

                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles.create') }}">
                            {{ __('messages.new_article') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('work.with.us') }}">
                            {{ __('messages.work_with_us') }}
                        </a>
                    </li>

                    <li class="nav-item">

                        <form action="{{ route('logout') }}" method="POST">

                            @csrf

                            <button class="btn btn-link nav-link">
                                {{ __('messages.logout') }}
                            </button>

                        </form>

                    </li>

                @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            {{ __('messages.login') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            {{ __('messages.register') }}
                        </a>
                    </li>

                @endauth

                <li class="nav-item ms-lg-3 d-flex align-items-center">

                    <a href="{{ route('locale.set', 'it') }}" class="me-2">
                        <img src="https://flagcdn.com/32x24/it.png"
                             width="24"
                             alt="Italiano">
                    </a>

                    <a href="{{ route('locale.set', 'en') }}" class="me-2">
                        <img src="https://flagcdn.com/32x24/gb.png"
                             width="24"
                             alt="English">
                    </a>

                    <a href="{{ route('locale.set', 'es') }}">
                        <img src="https://flagcdn.com/32x24/es.png"
                             width="24"
                             alt="Español">
                    </a>

                </li>

            </ul>

        </div>

    </div>
</nav>