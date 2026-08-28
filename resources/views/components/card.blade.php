<div class="card h-100 border-0 shadow rounded-4 overflow-hidden">

    @if($article->images->count())

        <div class="position-relative" style="height:220px;">

            <img
                src="{{ asset('storage/' . $article->images->first()->path) }}"
                class="card-img-top"
                style="height:220px; width:100%; object-fit:cover;"
                alt="{{ $article->title }}">

            <img
                src="{{ asset('images/presto_watermark.png') }}"
                alt="PRESTO"
                style="position:absolute; bottom:10px; right:10px; width:100px; height:auto; z-index:10;">

        </div>

    @else

        <div class="position-relative" style="height:220px;">

            <img
                src="https://picsum.photos/600/400"
                class="card-img-top"
                style="height:220px; width:100%; object-fit:cover;"
                alt="Placeholder">

            <img
                src="{{ asset('images/presto_watermark.png') }}"
                alt="PRESTO"
                style="position:absolute; bottom:10px; right:10px; width:100px; height:auto; z-index:10;">

        </div>

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