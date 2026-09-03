<x-layout :title="__('messages.home')">

    <div class="container py-5">

        <div class="text-center mb-5">

            <span
                class="text-uppercase fw-bold"
                style="color: #D4AF37; letter-spacing: 3px;">

                Presto Marketplace

            </span>

            <h1
                class="mt-2 fw-bold"
                style="color: #F8F8F8;">

                {{ __('messages.latest_ads') }}

            </h1>

            <div
                class="mx-auto mt-3"
                style="
                    width: 80px;
                    height: 3px;
                    background: #D4AF37;
                ">
            </div>

        </div>

        <div class="row">

            @forelse($articles as $article)

                <div class="col-md-4 mb-4">

                    <x-card :article="$article"/>

                </div>

            @empty

                <div class="col-12">

                    <div
                        class="text-center p-5 rounded"
                        style="
                            background: #1A1A1A;
                            border: 1px solid #D4AF37;
                        ">

                        <p
                            class="fs-5 mb-0"
                            style="color: #B8B8B8;">

                            {{ __('messages.no_ads') }}

                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</x-layout>