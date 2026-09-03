<x-layout :title="__('messages.ads')">

    <div class="container py-5">

        <div class="text-center mb-5">

            <span
                class="text-uppercase fw-bold"
                style="
                    color: #D4AF37;
                    letter-spacing: 3px;
                ">

                PRESTO MARKETPLACE

            </span>

            <h1
                class="display-4 fw-bold mt-3"
                style="color: #F8F8F8;">

                {{ __('messages.explore_ads') }}

            </h1>

            <p
                class="fs-5"
                style="color: #B8B8B8;">

                {{ __('messages.search_description') }}

                <strong style="color: #D4AF37;">
                    {{ __('messages.title') }}
                </strong>,

                <strong style="color: #D4AF37;">
                    {{ __('messages.description') }}
                </strong>

                {{ __('messages.or') }}

                <strong style="color: #D4AF37;">
                    {{ __('messages.category') }}
                </strong>.

            </p>

            <div
                class="mx-auto mt-4"
                style="
                    width: 80px;
                    height: 3px;
                    background-color: #D4AF37;
                ">
            </div>

        </div>

        <div
            class="search-box mb-5 rounded-4 shadow-lg p-4"
            style="
                background-color: #1A1A1A !important;
                border: 1px solid #D4AF37;
            ">

            <form
                action="{{ route('articles.index') }}"
                method="GET">

                <div class="input-group input-group-lg">

                    <input
                        type="text"
                        class="form-control"
                        name="search"
                        placeholder="🔎 {{ __('messages.search_placeholder') }}"
                        value="{{ request('search') }}"
                        style="
                            background-color: #111111 !important;
                            color: #F8F8F8 !important;
                            border: 1px solid #333333;
                        "
                    >

                    <button
                        class="btn px-4 fw-bold"
                        style="
                            background-color: #D4AF37;
                            color: #111111;
                            border: none;
                        ">

                        {{ __('messages.search') }}

                    </button>

                </div>

            </form>

        </div>

        @if(request('search'))

            <div
                class="rounded-4 shadow-sm p-4 mb-5"
                style="
                    background-color: #1A1A1A;
                    border-left: 3px solid #D4AF37;
                    color: #F8F8F8;
                ">

                <strong style="color: #D4AF37;">

                    {{ __('messages.search') }}:

                </strong>

                "{{ request('search') }}"

                <br>

                <strong style="color: #D4AF37;">

                    {{ $articles->total() }}

                </strong>

                <span style="color: #B8B8B8;">

                    {{ __('messages.results_found') }}

                </span>

            </div>

        @endif

        @if($articles->count())

            <div class="row gy-4">

                @foreach($articles as $article)

                    <div class="col-lg-4 col-md-6">

                        <x-card :article="$article" />

                    </div>

                @endforeach

            </div>

            <div class="mt-5 d-flex justify-content-center">

                {{ $articles->links() }}

            </div>

        @else

            <div
                class="text-center p-5 rounded-4 shadow-lg"
                style="
                    background-color: #1A1A1A !important;
                    border: 1px solid #D4AF37;
                ">

                <h2
                    class="display-6 mb-3"
                    style="color: #D4AF37;">

                    😕

                </h2>

                <h3
                    class="fw-bold"
                    style="color: #F8F8F8;">

                    {{ __('messages.no_results') }}

                </h3>

                <p
                    class="mt-3"
                    style="color: #B8B8B8;">

                    {{ __('messages.try_other_search') }}

                </p>

                <a
                    href="{{ route('articles.index') }}"
                    class="btn rounded-pill px-4 mt-3 fw-bold"
                    style="
                        background-color: #D4AF37;
                        color: #111111;
                        border: none;
                    ">

                    {{ __('messages.all_ads') }}

                </a>

            </div>

        @endif

    </div>

</x-layout>