<x-layout :title="$article->title">

    <div class="container py-5">

        <h1 class="fw-bold mb-4">
            {{ $article->title }}
        </h1>

        <div id="carouselExample" class="carousel slide mb-4">

            <div class="carousel-inner">

                @for($i = 0; $i < 3; $i++)

                    <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">

                        <img
                            src="https://via.placeholder.com/800x400"
                            class="d-block w-100"
                            alt="Article image">

                    </div>

                @endfor

            </div>

        </div>

        <p class="fs-5">

            {{ $article->description }}

        </p>

        <p>

            <strong>{{ __('messages.price') }}:</strong>

            € {{ number_format($article->price, 2, ',', '.') }}

        </p>

        <p>

            <strong>{{ __('messages.category') }}:</strong>

            <a href="{{ route('articles.byCategory', $article->category) }}">

                {{ $article->category->name }}

            </a>

        </p>

        <a
            href="{{ route('articles.index') }}"
            class="btn btn-secondary">

            ← {{ __('messages.back_to_ads') }}

        </a>

    </div>

</x-layout>