<div class="card h-100 shadow-sm">
    <div class="card-body">
        <h5>{{ $article->title }}</h5>

        <p class="text-muted">
            € {{ $article->price }}
        </p>

        <p class="small">
            Categoria:
            <a href="{{ route('articles.byCategory', $article->category) }}">
                {{ $article->category->name }}
            </a>
        </p>

        <a href="{{ route('articles.show', $article) }}"
           class="btn btn-sm btn-primary">
            Dettaglio
        </a>
    </div>
</div>
