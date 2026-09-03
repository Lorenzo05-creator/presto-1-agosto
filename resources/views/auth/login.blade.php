<x-layout :title="__('messages.login')">

    <div class="container">

        <div class="row justify-content-center align-items-center" style="min-height: 80vh;">

            <div class="col-md-7 col-lg-5">

                <div
                    class="rounded-4 shadow-lg p-4 p-md-5"
                    style="
                        background-color: #1A1A1A;
                        border: 1px solid #D4AF37;
                    ">

                    <div class="text-center mb-4">

                        <span
                            class="text-uppercase fw-bold"
                            style="
                                color: #D4AF37;
                                letter-spacing: 3px;
                            ">

                            PRESTO MARKETPLACE

                        </span>

                        <h2
                            class="fw-bold mt-3"
                            style="color: #F8F8F8;">

                            {{ __('messages.login') }}

                        </h2>

                        <div
                            class="mx-auto mt-3"
                            style="
                                width: 60px;
                                height: 3px;
                                background-color: #D4AF37;
                            ">
                        </div>

                    </div>

                    @error('email')

                        <div
                            class="alert"
                            style="
                                background-color: #2A1111;
                                color: #F8F8F8;
                                border: 1px solid #dc3545;
                            ">

                            {{ __('messages.invalid_credentials') }}

                        </div>

                    @enderror

                    @if ($errors->any())

                        <div
                            class="alert"
                            style="
                                background-color: #2A1111;
                                color: #F8F8F8;
                                border: 1px solid #dc3545;
                            ">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form method="POST" action="{{ route('login') }}">

                        @csrf

                        <div class="mb-3">

                            <label
                                for="email"
                                class="form-label fw-bold"
                                style="color: #F8F8F8;">

                                {{ __('messages.email') }}

                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                style="
                                    background-color: #111111;
                                    color: #F8F8F8;
                                    border: 1px solid #333333;
                                ">

                        </div>

                        <div class="mb-4">

                            <label
                                for="password"
                                class="form-label fw-bold"
                                style="color: #F8F8F8;">

                                {{ __('messages.password') }}

                            </label>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                required
                                style="
                                    background-color: #111111;
                                    color: #F8F8F8;
                                    border: 1px solid #333333;
                                ">

                        </div>

                        <div class="d-grid">

                            <button
                                type="submit"
                                class="btn fw-bold"
                                style="
                                    background-color: #D4AF37;
                                    color: #111111;
                                    border: none;
                                ">

                                {{ __('messages.login') }}

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-layout>