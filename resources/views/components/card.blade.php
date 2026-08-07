<div class="card article-card h-100 border-0 shadow-sm">

    @if($article->images->count())

        <img
            src="{{ $article->images->first()->getUrl(300,300) }}"
            class="card-img-top"
            style="height:220px; object-fit:cover;"
            alt="{{ $article->title }}">

    @else

        <img
            src="https://picsum.photos/600/400"
            class="card-img-top"
            style="height:220px; object-fit:cover;"
            alt="Placeholder">

    @endif

    <div class="card-body d-flex flex-column">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <span class="badge bg-primary px-3 py-2">
                {{ __('messages.'.$article->category->name) }}
            </span>

            <small class="text-muted">
                {{ $article->created_at->format('d/m/Y') }}
            </small>

        </div>

        <h4 class="fw-bold mb-3">
            {{ $article->title }}
        </h4>

        <h3 class="text-success fw-bold mb-3">
            € {{ number_format($article->price, 2, ',', '.') }}
        </h3>

        <p class="text-muted flex-grow-1">
            {{ \Illuminate\Support\Str::limit($article->description, 110) }}
        </p>

        <div class="d-flex justify-content-between align-items-center mt-4">

            <small class="text-secondary">
                {{ __('messages.author') }}:
                {{ $article->user->name }}
            </small>

            <a
                href="{{ route('articles.show', $article) }}"
                class="btn btn-primary rounded-pill px-4">

                {{ __('messages.details') }} →

            </a>

        </div>

    </div>

</div>