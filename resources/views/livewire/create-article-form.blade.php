<form wire:submit="store" class="col-md-8 mx-auto">

    @if(session('success'))

        <div
            class="alert rounded-3"
            style="
                background-color: #1A1A1A;
                color: #D4AF37;
                border: 1px solid #D4AF37;
            ">

            {{ session('success') }}

        </div>

    @endif

    <div class="mb-3">

        <label
            class="form-label fw-bold"
            style="color: #F8F8F8;">

            {{ __('messages.title') }}

        </label>

        <input
            wire:model="title"
            type="text"
            class="form-control"
            style="
                background-color: #111111;
                color: #F8F8F8;
                border: 1px solid #333333;
            ">

        @error('title')

            <small class="text-danger">
                {{ $message }}
            </small>

        @enderror

    </div>

    <div class="mb-3">

        <label
            class="form-label fw-bold"
            style="color: #F8F8F8;">

            {{ __('messages.description') }}

        </label>

        <textarea
            wire:model="description"
            rows="5"
            class="form-control"
            style="
                background-color: #111111;
                color: #F8F8F8;
                border: 1px solid #333333;
            "></textarea>

        @error('description')

            <small class="text-danger">
                {{ $message }}
            </small>

        @enderror

    </div>

    <div class="mb-3">

        <label
            class="form-label fw-bold"
            style="color: #F8F8F8;">

            {{ __('messages.price') }}

        </label>

        <input
            wire:model="price"
            type="number"
            step="0.01"
            class="form-control"
            style="
                background-color: #111111;
                color: #F8F8F8;
                border: 1px solid #333333;
            ">

        @error('price')

            <small class="text-danger">
                {{ $message }}
            </small>

        @enderror

    </div>

    <div class="mb-4">

        <label
            class="form-label fw-bold"
            style="color: #F8F8F8;">

            {{ __('messages.category') }}

        </label>

        <select
            wire:model="category_id"
            class="form-select"
            style="
                background-color: #111111;
                color: #F8F8F8;
                border: 1px solid #333333;
            ">

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

            <small class="text-danger">
                {{ $message }}
            </small>

        @enderror

    </div>

    <div class="mb-4">

        <label
            class="form-label fw-bold"
            style="color: #F8F8F8;">

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
            class="btn w-100 fw-bold"
            style="
                color: #D4AF37;
                border: 1px solid #D4AF37;
                background-color: transparent;
            ">

            {{ __('messages.choose_images') }}

        </label>

        <small
            class="d-block mt-2"
            style="color: #B8B8B8;">

            {{ count($images) }}
            {{ __('messages.selected_images') }}

        </small>

        @error('temporary_images.*')

            <small class="text-danger">

                {{ $message }}

            </small>

        @enderror

    </div>

    @if(count($images))

        <div class="row mb-4">

            @foreach($images as $key => $image)

                <div class="col-md-3 mb-3">

                    <div
                        class="card h-100"
                        style="
                            background-color: #111111;
                            border: 1px solid #D4AF37;
                        ">

                        <img
                            src="{{ $image->temporaryUrl() }}"
                            class="card-img-top"
                            style="
                                height: 200px;
                                object-fit: cover;
                            ">

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
        class="btn w-100 fw-bold"
        style="
            background-color: #D4AF37;
            color: #111111;
            border: none;
        ">

        {{ __('messages.new_article') }}

    </button>

</form>