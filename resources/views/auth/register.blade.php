<x-layout :title="__('messages.register')">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <h2 class="text-center mb-4">

                    {{ __('messages.register') }}

                </h2>

                <form method="POST" action="{{ route('register') }}">

                    @csrf

                    <div class="mb-3">

                        <input
                            name="name"
                            class="form-control"
                            placeholder="{{ __('messages.name') }}"
                            value="{{ old('name') }}">

                    </div>

                    <div class="mb-3">

                        <input
                            name="email"
                            type="email"
                            class="form-control"
                            placeholder="{{ __('messages.email') }}"
                            value="{{ old('email') }}">

                    </div>

                    <div class="mb-3">

                        <input
                            name="password"
                            type="password"
                            class="form-control"
                            placeholder="{{ __('messages.password') }}">

                    </div>

                    <div class="mb-4">

                        <input
                            name="password_confirmation"
                            type="password"
                            class="form-control"
                            placeholder="{{ __('messages.confirm_password') }}">

                    </div>

                    <button class="btn btn-success w-100">

                        {{ __('messages.register') }}

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-layout>