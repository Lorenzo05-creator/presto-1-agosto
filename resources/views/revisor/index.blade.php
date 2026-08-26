<x-layout title="Revisione Annunci">

    <div class="container py-5">

        @if($article_to_check)

            <div class="card shadow-lg">

                <div class="card-body p-5">

                    <h2 class="fw-bold mb-4">
                        {{ $article_to_check->title }}
                    </h2>

                    <div class="row mb-4">

                        @forelse($article_to_check->images as $image)

                            <div class="col-md-4 mb-4">

                                <img
                                    src="{{ asset('storage/' . $image->path) }}"
                                    class="img-fluid rounded shadow"
                                    style="height:250px; width:100%; object-fit:cover;"
                                    alt="{{ $article_to_check->title }}">

                            </div>

                        @empty

                            <div class="col-12">

                                <img
                                    src="https://picsum.photos/800/400"
                                    class="img-fluid rounded"
                                    alt="Placeholder">

                            </div>

                        @endforelse

                    </div>

                    <p class="fs-5">
                        {{ $article_to_check->description }}
                    </p>

                    <div class="d-flex gap-2">

                        <form
                            method="POST"
                            action="{{ route('revisor.accept', $article_to_check) }}">

                            @csrf
                            @method('PATCH')

                            <button class="btn btn-success">
                                {{ __('messages.accept') }}
                            </button>

                        </form>

                        <form
                            method="POST"
                            action="{{ route('revisor.reject', $article_to_check) }}">

                            @csrf
                            @method('PATCH')

                            <button class="btn btn-danger">
                                {{ __('messages.reject') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @else

            <div class="card shadow-lg">

                <div class="card-body p-5 text-center">

                    <h3 class="fw-bold">
                        {{ __('messages.no_articles_review') }}
                    </h3>

                    <a
                        href="{{ route('home') }}"
                        class="btn btn-primary mt-3">

                        {{ __('messages.back_home') }}

                    </a>

                </div>

            </div>

        @endif

    </div>

</x-layout>