<x-layout :title="__('messages.register')">

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

                            {{ __('messages.register') }}

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

                    <form method="POST" action="{{ route('register') }}">

                        @csrf

                        <div class="mb-3">

                            <label
                                class="form-label fw-bold"
                                style="color: #F8F8F8;">

                                {{ __('messages.name') }}

                            </label>

                            <input
                                name="name"
                                class="form-control"
                                value="{{ old('name') }}"
                                required
                                style="
                                    background-color: #111111;
                                    color: #F8F8F8;
                                    border: 1px solid #333333;
                                ">

                        </div>

                        <div class="mb-3">

                            <label
                                class="form-label fw-bold"
                                style="color: #F8F8F8;">

                                {{ __('messages.email') }}

                            </label>

                            <input
                                name="email"
                                type="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                required
                                style="
                                    background-color: #111111;
                                    color: #F8F8F8;
                                    border: 1px solid #333333;
                                ">

                        </div>

                        <div class="mb-3">

                            <label
                                class="form-label fw-bold"
                                style="color: #F8F8F8;">

                                {{ __('messages.password') }}

                            </label>

                            <input
                                name="password"
                                type="password"
                                class="form-control"
                                required
                                style="
                                    background-color: #111111;
                                    color: #F8F8F8;
                                    border: 1px solid #333333;
                                ">

                        </div>

                        <div class="mb-4">

                            <label
                                class="form-label fw-bold"
                                style="color: #F8F8F8;">

                                {{ __('messages.confirm_password') }}

                            </label>

                            <input
                                name="password_confirmation"
                                type="password"
                                class="form-control"
                                required
                                style="
                                    background-color: #111111;
                                    color: #F8F8F8;
                                    border: 1px solid #333333;
                                ">

                        </div>

                        <button
                            class="btn w-100 fw-bold"
                            style="
                                background-color: #D4AF37;
                                color: #111111;
                                border: none;
                            ">

                            {{ __('messages.register') }}

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-layout>