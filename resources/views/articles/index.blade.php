<x-layout :title="__('messages.ads')">

<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="display-4 fw-bold">
            {{ __('messages.explore_ads') }}
        </h1>

        <p class="text-muted fs-5">
            {{ __('messages.search_description') }}
            <strong>{{ __('messages.title') }}</strong>,
            <strong>{{ __('messages.description') }}</strong>
            {{ __('messages.or') }}
            <strong>{{ __('messages.category') }}</strong>.
        </p>

    </div>

    <div class="search-box mb-5">

        <div class="card-body p-4">

            <form action="{{ route('articles.index') }}" method="GET">

                <div class="input-group input-group-lg">

                    <input
                        type="text"
                        class="form-control"
                        name="search"
                        placeholder="🔎 {{ __('messages.search_placeholder') }}"
                        value="{{ request('search') }}"
                    >

                    <button class="btn btn-primary px-4">

                        {{ __('messages.search') }}

                    </button>

                </div>

            </form>

        </div>

    </div>

    @if(request('search'))

        <div class="alert alert-primary shadow-sm rounded-3">

            <strong>{{ __('messages.search') }}:</strong>

            "{{ request('search') }}"

            <br>

            <strong>{{ $articles->total() }}</strong>

            {{ __('messages.results_found') }}

        </div>

    @endif

    @if($articles->count())

        <div class="row gy-4">

            @foreach($articles as $article)

                <div class="col-lg-4 col-md-6">

                    <x-card :article="$article"/>

                </div>

            @endforeach

        </div>

        <div class="mt-5 d-flex justify-content-center">

            {{ $articles->links() }}

        </div>

    @else

        <div class="card border-0 shadow text-center p-5 rounded-4">

            <h2 class="display-6">
                😕
            </h2>

            <h3 class="fw-bold">

                {{ __('messages.no_results') }}

            </h3>

            <p class="text-muted">

                {{ __('messages.try_other_search') }}

            </p>

            <a
                href="{{ route('articles.index') }}"
                class="btn btn-outline-primary mt-3"
            >

                {{ __('messages.all_ads') }}

            </a>

        </div>

    @endif

</div>

</x-layout>