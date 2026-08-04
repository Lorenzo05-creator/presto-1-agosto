<x-layout :title="$article->title">
    <div class="container">

        <h1>{{ $article->title }}</h1>

        
        <div id="carouselExample" class="carousel slide mb-4">
            <div class="carousel-inner">
                @for($i = 0; $i < 3; $i++)
                    <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                        <img src="https://via.placeholder.com/800x400"
                             class="d-block w-100">
                    </div>
                @endfor
            </div>
        </div>

        <p>{{ $article->description }}</p>

        <p><strong>Prezzo:</strong> € {{ $article->price }}</p>

        <p>
            <strong>Categoria:</strong>
            <a href="{{ route('articles.byCategory', $article->category) }}">
                {{ $article->category->name }}
            </a>
        </p>

        <a href="{{ route('articles.index') }}"
           class="btn btn-secondary">
            Torna agli annunci
        </a>

    </div>
</x-layout>
