<x-layout :title="__('messages.category') . ' ' . __('messages.'.$category->name)">

    <div class="container py-5">

        <div class="text-center mb-5">

            <span
                class="text-uppercase fw-bold"
                style="
                    color: #D4AF37;
                    letter-spacing: 3px;
                ">

                {{ __('messages.category') }}

            </span>

            <h1
                class="fw-bold mt-3"
                style="color: #F8F8F8;">

                {{ __('messages.ads_in_category') }}:
                {{ __('messages.'.$category->name) }}

            </h1>

            <div
                class="mx-auto mt-4"
                style="
                    width: 80px;
                    height: 3px;
                    background-color: #D4AF37;
                ">
            </div>

        </div>

        @if($articles->count())

            <div class="row gy-4">

                @foreach($articles as $article)

                    <div class="col-lg-4 col-md-6">

                        <x-card :article="$article" />

                    </div>

                @endforeach

            </div>

        @else

            <div
                class="text-center p-5 rounded-4 shadow-lg"
                style="
                    background-color: #1A1A1A;
                    border: 1px solid #D4AF37;
                ">

                <h3
                    class="fw-bold"
                    style="color: #F8F8F8;">

                    {{ __('messages.no_ads_category') }}

                </h3>

                <p
                    class="mt-3"
                    style="color: #B8B8B8;">

                    Non ci sono ancora annunci disponibili in questa categoria.

                </p>

                <a
                    href="{{ route('articles.index') }}"
                    class="btn rounded-pill px-4 mt-3 fw-bold"
                    style="
                        background-color: #D4AF37;
                        color: #111111;
                        border: none;
                    ">

                    {{ __('messages.ads') }}

                </a>

            </div>

        @endif

    </div>

</x-layout>