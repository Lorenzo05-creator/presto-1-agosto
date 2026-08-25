<x-layout title="{{ $article->title }}">

    <div class="container py-5">

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

            <div class="card-body p-4 p-md-5">

                {{-- TITOLO --}}

                <h1 class="fw-bold mb-4">
                    {{ $article->title }}
                </h1>


                {{-- IMMAGINI --}}

                @if($article->images->count())

                    <div id="carouselExample"
                         class="carousel slide mb-5"
                         data-bs-ride="carousel">

                        <div class="carousel-inner rounded-4 overflow-hidden shadow-sm">

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
                            style="height:500px; object-fit:cover;"
                            alt="Placeholder">

                    </div>

                @endif


                {{-- INFORMAZIONI ANNUNCIO --}}

                <div class="row g-4">

                    <div class="col-lg-8">

                        <h4 class="fw-bold mb-3">
                            {{ __('messages.description') }}
                        </h4>

                        <p class="fs-5 text-muted">
                            {{ $article->description }}
                        </p>

                    </div>


                    <div class="col-lg-4">

                        <div class="card border-0 shadow-sm rounded-4">

                            <div class="card-body p-4">

                                <h3 class="text-success fw-bold mb-4">

                                    € {{ number_format($article->price, 2, ',', '.') }}

                                </h3>


                                <div class="mb-3">

                                    <strong>
                                        {{ __('messages.category') }}:
                                    </strong>

                                    <br>

                                    <a
                                        href="{{ route('articles.byCategory', $article->category) }}"
                                        class="text-decoration-none">

                                        {{ __('messages.'.$article->category->name) }}

                                    </a>

                                </div>


                                <div class="mb-3">

                                    <strong>
                                        {{ __('messages.author') }}:
                                    </strong>

                                    <br>

                                    {{ $article->user->name }}

                                </div>


                                <div>

                                    <strong>
                                        Data:
                                    </strong>

                                    <br>

                                    {{ $article->created_at->format('d/m/Y') }}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- TORNA AGLI ANNUNCI --}}

                <div class="mt-5">

                    <a
                        href="{{ route('articles.index') }}"
                        class="btn btn-secondary rounded-pill px-4">

                        ← {{ __('messages.back_to_ads') }}

                    </a>

                </div>

            </div>

        </div>

    </div>

</x-layout>