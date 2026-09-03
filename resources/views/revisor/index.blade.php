<x-layout title="Revisione Annunci">

    <div class="container py-5">

        @if($article_to_check)

            <div class="text-center mb-5">

                <span
                    class="text-uppercase fw-bold"
                    style="color: #D4AF37; letter-spacing: 3px;">

                    AREA REVISORE

                </span>

                <h1
                    class="fw-bold mt-2"
                    style="color: #F8F8F8;">

                    Revisione annuncio

                </h1>

                <div
                    class="mx-auto mt-3"
                    style="
                        width: 80px;
                        height: 3px;
                        background-color: #D4AF37;
                    ">
                </div>

            </div>

            <div
                class="rounded-4 shadow-lg overflow-hidden"
                style="
                    background-color: #1A1A1A !important;
                    border: 1px solid #D4AF37;
                    color: #F8F8F8;
                ">

                <div
                    class="p-4 p-md-5"
                    style="background-color: #1A1A1A !important;">

                    <h2
                        class="fw-bold mb-4"
                        style="color: #F8F8F8;">

                        {{ $article_to_check->title }}

                    </h2>

                    <div class="row mb-4">

                        @forelse($article_to_check->images as $image)

                            <div class="col-md-4 mb-4">

                                <div
                                    class="p-3 rounded-4 h-100"
                                    style="
                                        background-color: #111111;
                                        border: 1px solid #333333;
                                    ">

                                    <img
                                        src="{{ asset('storage/' . $image->path) }}"
                                        class="img-fluid rounded shadow"
                                        style="
                                            width: 100%;
                                            max-height: 500px;
                                            object-fit: contain;
                                        "
                                        alt="{{ $article_to_check->title }}">

                                    @if($image->labels)

                                        <div class="mt-3">

                                            <h6
                                                class="fw-bold mb-2"
                                                style="color: #D4AF37;">

                                                Labels riconosciute

                                            </h6>

                                            <div class="d-flex flex-wrap gap-2">

                                                @foreach($image->labels as $label)

                                                    <span
                                                        class="badge"
                                                        style="
                                                            background-color: #D4AF37;
                                                            color: #111111;
                                                        ">

                                                        {{ $label }}

                                                    </span>

                                                @endforeach

                                            </div>

                                        </div>

                                    @endif

                                    @if($image->adult !== null)

                                        <div class="mt-4">

                                            <h6
                                                class="fw-bold mb-2"
                                                style="color: #D4AF37;">

                                                Safe Search

                                            </h6>

                                            <div
                                                class="small"
                                                style="color: #B8B8B8;">

                                                <div class="d-flex justify-content-between py-1">
                                                    <span>Adult</span>
                                                    <strong style="color: #F8F8F8;">
                                                        {{ $image->adult }}
                                                    </strong>
                                                </div>

                                                <div class="d-flex justify-content-between py-1">
                                                    <span>Spoof</span>
                                                    <strong style="color: #F8F8F8;">
                                                        {{ $image->spoof }}
                                                    </strong>
                                                </div>

                                                <div class="d-flex justify-content-between py-1">
                                                    <span>Racy</span>
                                                    <strong style="color: #F8F8F8;">
                                                        {{ $image->racy }}
                                                    </strong>
                                                </div>

                                                <div class="d-flex justify-content-between py-1">
                                                    <span>Medical</span>
                                                    <strong style="color: #F8F8F8;">
                                                        {{ $image->medical }}
                                                    </strong>
                                                </div>

                                                <div class="d-flex justify-content-between py-1">
                                                    <span>Violence</span>
                                                    <strong style="color: #F8F8F8;">
                                                        {{ $image->violence }}
                                                    </strong>
                                                </div>

                                            </div>

                                        </div>

                                    @endif

                                </div>

                            </div>

                        @empty

                            <div class="col-12">

                                <div
                                    class="text-center p-5 rounded-4"
                                    style="
                                        background-color: #111111;
                                        border: 1px solid #333333;
                                        color: #B8B8B8;
                                    ">

                                    Nessuna immagine disponibile

                                </div>

                            </div>

                        @endforelse

                    </div>

                    <div
                        class="mb-5 p-4 rounded-4"
                        style="
                            background-color: #111111;
                            border-left: 3px solid #D4AF37;
                        ">

                        <h5
                            class="fw-bold mb-3"
                            style="color: #D4AF37;">

                            {{ __('messages.description') }}

                        </h5>

                        <p
                            class="fs-5 mb-0"
                            style="color: #B8B8B8;">

                            {{ $article_to_check->description }}

                        </p>

                    </div>

                    <div
                        class="d-flex flex-wrap gap-2 pt-4"
                        style="border-top: 1px solid #333333;">

                        <form
                            method="POST"
                            action="{{ route('revisor.accept', $article_to_check) }}">

                            @csrf
                            @method('PATCH')

                            <button
                                class="btn btn-success rounded-pill px-4 fw-bold">

                                {{ __('messages.accept') }}

                            </button>

                        </form>

                        <form
                            method="POST"
                            action="{{ route('revisor.reject', $article_to_check) }}">

                            @csrf
                            @method('PATCH')

                            <button
                                class="btn btn-danger rounded-pill px-4 fw-bold">

                                {{ __('messages.reject') }}

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @else

            <div
                class="text-center p-5 rounded-4 shadow-lg"
                style="
                    background-color: #1A1A1A !important;
                    border: 1px solid #D4AF37;
                    color: #F8F8F8;
                ">

                <span
                    class="text-uppercase fw-bold"
                    style="
                        color: #D4AF37;
                        letter-spacing: 3px;
                    ">

                    AREA REVISORE

                </span>

                <h3
                    class="fw-bold mt-3"
                    style="color: #F8F8F8;">

                    {{ __('messages.no_articles_review') }}

                </h3>

                <p style="color: #B8B8B8;">

                    Non ci sono altri annunci da revisionare al momento.

                </p>

                <a
                    href="{{ route('home') }}"
                    class="btn rounded-pill px-4 mt-3 fw-bold"
                    style="
                        background-color: #D4AF37;
                        color: #111111;
                        border: none;
                    ">

                    {{ __('messages.back_home') }}

                </a>

            </div>

        @endif

    </div>

</x-layout>