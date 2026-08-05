<form wire:submit="store" class="col-md-6">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">

        <label>{{ __('messages.title') }}</label>

        <input
            wire:model="title"
            type="text"
            class="form-control">

        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <div class="mb-3">

        <label>{{ __('messages.description') }}</label>

        <textarea
            wire:model="description"
            class="form-control"
            rows="5"></textarea>

        @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <div class="mb-3">

        <label>{{ __('messages.price') }}</label>

        <input
            wire:model="price"
            type="number"
            step="0.01"
            class="form-control">

        @error('price')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <div class="mb-3">

        <label>{{ __('messages.category') }}</label>

        <select
            wire:model="category_id"
            class="form-control">

            <option value="">
                {{ __('messages.select_category') }}
            </option>

            @foreach($categories as $category)

                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>

            @endforeach

        </select>

        @error('category_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <button
        type="submit"
        class="btn btn-primary">

        {{ __('messages.new_article') }}

    </button>

</form>