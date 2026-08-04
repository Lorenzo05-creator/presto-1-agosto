<x-layout title="Dashboard Revisore">
    <div class="container">

        @if($article_to_check)

            <h2>{{ $article_to_check->title }}</h2>

            <div class="row my-3">
                @for($i = 0; $i < 6; $i++)
                    <div class="col-md-4 mb-2">
                        <img src="https://via.placeholder.com/300x200" class="img-fluid">
                    </div>
                @endfor
            </div>

            <p>{{ $article_to_check->description }}</p>

            <form method="POST" action="{{ route('revisor.accept', $article_to_check) }}">
                @csrf
                @method('PATCH')
                <button class="btn btn-success">Accetta</button>
            </form>

            <form method="POST" action="{{ route('revisor.reject', $article_to_check) }}" class="mt-2">
                @csrf
                @method('PATCH')
                <button class="btn btn-danger">Rifiuta</button>
            </form>

        @else
            <p>Nessun articolo da revisionare</p>
            <a href="/" class="btn btn-primary">Torna alla home</a>
        @endif

    </div>
</x-layout>
