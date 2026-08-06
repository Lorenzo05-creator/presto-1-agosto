<x-layout :title="$article->title">

    <div class="container py-5">

        <h1 class="fw-bold mb-4">
            {{ $article->title }}
        </h1>

        @if($article->images->count())

            <div id="carouselExample" class="carousel slide mb-5">

                <div class="carousel-inner">

                    @foreach($article->images as $key => $image)

                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

                            <img
                                src="{{ asset('storage/'.$image->path) }}"
                                class="d-block w-100 rounded"
                                style="height:500px; object-fit:cover;"
                                alt="{{ $article->title }}">

                        </div>

                    @endforeach

                </div>

                @if($article->images->count() > 1)

                    <button class="carousel-control-prev"
                            type="button"
                            data-bs-target="#carouselExample"
                            data-bs-slide="prev">

                        <span class="carousel-control-prev-icon"></span>

                    </button>

                    <button class="carousel-control-next"
                            type="button"
                            data-bs-target="#carouselExample"
                            data-bs-slide="next">

                        <span class="carousel-control-next-icon"></span>

                    </button>

                @endif

            </div>

        @else

            <img
                src="https://picsum.photos/1200/500"
                class="img-fluid rounded mb-5"
                alt="Placeholder">

        @endif

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

                {{ __('messages.'.$article->category->name) }}

            </a>

        </p>

        <a
            href="{{ route('articles.index') }}"
            class="btn btn-secondary">

            ← {{ __('messages.back_to_ads') }}

        </a>

    </div>

</x-layout>