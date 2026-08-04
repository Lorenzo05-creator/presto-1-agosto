<x-layout title="Annunci">
    <div class="container">
        <h1 class="mb-4">Tutti gli annunci</h1>

        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-4 mb-3">
                    <x-card :article="$article" />
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>
