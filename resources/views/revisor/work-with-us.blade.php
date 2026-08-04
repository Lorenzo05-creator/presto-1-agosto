<x-layout title="Lavora con noi">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1 class="mb-4 text-center">Lavora con noi</h1>

                <p class="text-center mb-4">
                    Vuoi collaborare con il team Presto come revisore?
                    Compila il form e invia la tua candidatura.
                </p>

                {{-- FLASH MESSAGE --}}
                @if(session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('become.revisor') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text"
                               class="form-control"
                               value="{{ auth()->user()->name }}"
                               disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email"
                               class="form-control"
                               value="{{ auth()->user()->email }}"
                               disabled>
                    </div>

                    <div class="mb-3">
    <label class="form-label">Perché vuoi diventare revisore?</label>

    <textarea class="form-control"
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
                            Invia richiesta
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-layout>
