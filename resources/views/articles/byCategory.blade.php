<x-layout :title="__('messages.category') . ' ' . __('messages.'.$category->name)">

    <div class="container">

        <h1 class="mb-4">
            {{ __('messages.ads_in_category') }}:
            {{ __('messages.'.$category->name) }}
        </h1>

        <div class="row">

            @forelse($articles as $article)

                <div class="col-md-4 mb-3">
                    <x-card :article="$article" />
                </div>

            @empty

                <p>{{ __('messages.no_ads_category') }}</p>

            @endforelse

        </div>

    </div>

</x-layout>