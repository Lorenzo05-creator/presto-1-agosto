<x-layout :title="__('messages.home')">

    <div class="container py-5">

        <h1 class="mb-4 fw-bold">
            {{ __('messages.latest_ads') }}
        </h1>

        <div class="row">

            @forelse($articles as $article)

                <div class="col-md-4 mb-4">

                    <x-card :article="$article"/>

                </div>

            @empty

                <div class="col-12">

                    <p class="text-center fs-5">
                        {{ __('messages.no_ads') }}
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</x-layout>