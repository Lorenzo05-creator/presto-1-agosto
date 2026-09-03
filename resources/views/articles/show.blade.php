<x-layout title="{{ $article->title }}">

    <div class="container py-5">

        <div
            class="rounded-4 overflow-hidden shadow-lg"
            style="
                background-color: #1A1A1A;
                border: 1px solid #D4AF37;
            ">

            <div class="p-4 p-md-5">

                <h1
                    class="fw-bold mb-4"
                    style="color: #F8F8F8;">

                    {{ $article->title }}

                </h1>

                <div
                    class="mb-4"
                    style="
                        width: 80px;
                        height: 3px;
                        background-color: #D4AF37;
                    ">
                </div>


                @if($article->images->count())

                    <div
                        id="carouselExample"
                        class="carousel slide mb-5"
                        data-bs-ride="carousel">

                        <div
                            class="carousel-inner rounded-4 overflow-hidden shadow-sm"
                            style="border: 1px solid #333333;">

                            @foreach($article->images as $key => $image)

                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

                                    <img
                                        src="{{ asset('storage/' . $image->path) }}"
                                        class="d-block w-100"
                                        style="height:500px; object-fit:cover;"
                                        alt="{{ $article->title }}">

                                </div>

                            @endforeach

                        </div>

                        @if($article->images->count() > 1)

                            <button
                                class="carousel-control-prev"
                                type="button"
                                data-bs-target="#carouselExample"
                                data-bs-slide="prev">

                                <span class="carousel-control-prev-icon"></span>

                                <span class="visually-hidden">
                                    Previous
                                </span>

                            </button>

                            <button
                                class="carousel-control-next"
                                type="button"
                                data-bs-target="#carouselExample"
                                data-bs-slide="next">

                                <span class="carousel-control-next-icon"></span>

                                <span class="visually-hidden">
                                    Next
                                </span>

                            </button>

                        @endif

                    </div>

                @else

                    <div class="mb-5">

                        <img
                            src="https://picsum.photos/1200/500"
                            class="img-fluid rounded-4 shadow-sm w-100"
                            style="
                                height:500px;
                                object-fit:cover;
                                border: 1px solid #333333;
                            "
                            alt="Placeholder">

                    </div>

                @endif


                <div class="row g-4">

                    <div class="col-lg-8">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #D4AF37;">

                            {{ __('messages.description') }}

                        </h4>

                        <p
                            class="fs-5"
                            style="color: #B8B8B8;">

                            {{ $article->description }}

                        </p>

                    </div>


                    <div class="col-lg-4">

                        <div
                            class="rounded-4 h-100"
                            style="
                                background-color: #111111;
                                border: 1px solid #D4AF37;
                            ">

                            <div class="p-4">

                                <h3
                                    class="fw-bold mb-4"
                                    style="color: #D4AF37;">

                                    € {{ number_format($article->price, 2, ',', '.') }}

                                </h3>

                                <hr style="border-color: #333333;">

                                <div
                                    class="mb-3"
                                    style="color: #B8B8B8;">

                                    <strong style="color: #F8F8F8;">

                                        {{ __('messages.category') }}:

                                    </strong>

                                    <br>

                                    <a
                                        href="{{ route('articles.byCategory', $article->category) }}"
                                        class="text-decoration-none fw-bold"
                                        style="color: #D4AF37;">

                                        {{ __('messages.'.$article->category->name) }}

                                    </a>

                                </div>

                                <div
                                    class="mb-3"
                                    style="color: #B8B8B8;">

                                    <strong style="color: #F8F8F8;">

                                        {{ __('messages.author') }}:

                                    </strong>

                                    <br>

                                    {{ $article->user->name }}

                                </div>

                                <div style="color: #B8B8B8;">

                                    <strong style="color: #F8F8F8;">

                                        Data:

                                    </strong>

                                    <br>

                                    {{ $article->created_at->format('d/m/Y') }}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="mt-5">

                    <a
                        href="{{ route('articles.index') }}"
                        class="btn rounded-pill px-4 fw-bold"
                        style="
                            background-color: #D4AF37;
                            color: #111111;
                            border: none;
                        ">

                        ← {{ __('messages.back_to_ads') }}

                    </a>

                </div>

            </div>

        </div>

    </div>

</x-layout>