<form wire:submit="store" class="col-md-8 mx-auto">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Titolo --}}
    <div class="mb-3">

        <label class="form-label">
            {{ __('messages.title') }}
        </label>

        <input
            wire:model="title"
            type="text"
            class="form-control">

        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    {{-- Descrizione --}}
    <div class="mb-3">

        <label class="form-label">
            {{ __('messages.description') }}
        </label>

        <textarea
            wire:model="description"
            rows="5"
            class="form-control"></textarea>

        @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    {{-- Prezzo --}}
    <div class="mb-3">

        <label class="form-label">
            {{ __('messages.price') }}
        </label>

        <input
            wire:model="price"
            type="number"
            step="0.01"
            class="form-control">

        @error('price')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    {{-- Categoria --}}
    <div class="mb-4">

        <label class="form-label">
            {{ __('messages.category') }}
        </label>

        <select
            wire:model="category_id"
            class="form-select">

            <option value="">
                {{ __('messages.select_category') }}
            </option>

           @foreach($categories as $category)

    <option value="{{ $category->id }}">
        {{ __('messages.'.$category->name) }}
    </option>

@endforeach

        </select>

        @error('category_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

   {{-- Upload immagini --}}
<div class="mb-4">

    <label class="form-label fw-bold">
        {{ __('messages.images') }}
    </label>

    <input
        id="images"
        type="file"
        wire:model.live="temporary_images"
        multiple
        hidden>

    <label
        for="images"
        class="btn btn-outline-primary w-100">

        {{ __('messages.choose_images') }}

    </label>

    <small class="text-muted d-block mt-2">
        {{ count($images) }}
        {{ __('messages.selected_images') }}
    </small>

    @error('temporary_images.*')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror

</div>

    {{-- Anteprima --}}
    @if(count($images))

        <div class="row mb-4">

            @foreach($images as $key => $image)

                <div class="col-md-3 mb-3">

                    <div class="card shadow-sm">

                        <img
                            src="{{ $image->temporaryUrl() }}"
                            class="card-img-top"
                            style="height:200px; object-fit:cover;">

                        <div class="card-body text-center">

                            <button
                                type="button"
                                wire:click="removeImage({{ $key }})"
                                class="btn btn-danger btn-sm">

                                Elimina

                            </button>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

    <button
        type="submit"
        class="btn btn-primary w-100">

        {{ __('messages.new_article') }}

    </button>

</form>