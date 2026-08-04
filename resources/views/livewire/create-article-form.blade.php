<form wire:submit="store" class="col-md-6">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <input wire:model.blur="title" class="form-control mb-2" placeholder="Titolo">
    @error('title') <small class="text-danger">{{ $message }}</small> @enderror

    <textarea wire:model.blur="description" class="form-control mb-2" placeholder="Descrizione"></textarea>
    @error('description') <small class="text-danger">{{ $message }}</small> @enderror

    <input wire:model.blur="price" type="number" step="0.01" class="form-control mb-2" placeholder="Prezzo">
    @error('price') <small class="text-danger">{{ $message }}</small> @enderror

    <select wire:model.blur="category_id" class="form-control mb-3">
        <option value="">Seleziona categoria</option>

       @foreach($categories as $category)

            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <button class="btn btn-primary">Inserisci</button>
</form>
