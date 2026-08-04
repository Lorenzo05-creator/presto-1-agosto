<x-layout title="Categoria {{ $category->name }}">
    <div class="container">

        <h1 class="mb-4">
            Annunci in categoria: {{ $category->name }}
        </h1>

        <div class="row">
            @forelse($articles as $article)
                <div class="col-md-4 mb-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <p>Nessun annuncio in questa categoria.</p>
            @endforelse
        </div>

    </div>
</x-layout>

