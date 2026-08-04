<x-layout title="Home">
    <div class="container">
        <h1 class="mb-4">Ultimi annunci</h1>

        <div class="row">
            @forelse($articles as $article)
                <div class="col-md-4 mb-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <p>Nessun annuncio presente.</p>
            @endforelse
        </div>
    </div>
</x-layout>
