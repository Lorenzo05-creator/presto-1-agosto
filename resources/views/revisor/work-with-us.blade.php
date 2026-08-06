<x-layout :title="__('messages.work_with_us')">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1 class="mb-4 text-center">
                    {{ __('messages.work_with_us') }}
                </h1>

                <p class="text-center mb-4">
                    {{ __('messages.work_with_us_description') }}
                </p>

                @if(session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('become.revisor') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">
                            {{ __('messages.name') }}
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ auth()->user()->name }}"
                            disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            {{ __('messages.email') }}
                        </label>

                        <input
                            type="email"
                            class="form-control"
                            value="{{ auth()->user()->email }}"
                            disabled>
                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            {{ __('messages.revisor_reason') }}
                        </label>

                        <textarea
                            class="form-control"
                            name="message"
                            rows="4"
                            required>{{ old('message') }}</textarea>

                        @error('message')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                    <div class="d-grid">

                        <button class="btn btn-primary">

                            {{ __('messages.send_request') }}

                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-layout>