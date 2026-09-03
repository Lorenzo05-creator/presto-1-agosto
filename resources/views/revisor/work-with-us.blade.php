<x-layout :title="__('messages.work_with_us')">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-8 col-lg-7">

                <div
                    class="rounded-4 shadow-lg p-4 p-md-5"
                    style="
                        background-color: #1A1A1A;
                        border: 1px solid #D4AF37;
                    ">

                    <div class="text-center mb-5">

                        <span
                            class="text-uppercase fw-bold"
                            style="
                                color: #D4AF37;
                                letter-spacing: 3px;
                            ">

                            PRESTO MARKETPLACE

                        </span>

                        <h1
                            class="fw-bold mt-3"
                            style="color: #F8F8F8;">

                            {{ __('messages.work_with_us') }}

                        </h1>

                        <p
                            class="mt-3 mb-0"
                            style="color: #B8B8B8;">

                            {{ __('messages.work_with_us_description') }}

                        </p>

                        <div
                            class="mx-auto mt-4"
                            style="
                                width: 80px;
                                height: 3px;
                                background-color: #D4AF37;
                            ">
                        </div>

                    </div>

                    @if(session('success'))

                        <div
                            class="alert text-center"
                            style="
                                background-color: #1A1A1A;
                                color: #D4AF37;
                                border: 1px solid #D4AF37;
                            ">

                            {{ session('success') }}

                        </div>

                    @endif

                    <form
                        method="POST"
                        action="{{ route('become.revisor') }}">

                        @csrf

                        <div class="mb-3">

                            <label
                                class="form-label fw-bold"
                                style="color: #F8F8F8;">

                                {{ __('messages.name') }}

                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ auth()->user()->name }}"
                                disabled
                                style="
                                    background-color: #111111;
                                    color: #B8B8B8;
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
                                type="email"
                                class="form-control"
                                value="{{ auth()->user()->email }}"
                                disabled
                                style="
                                    background-color: #111111;
                                    color: #B8B8B8;
                                    border: 1px solid #333333;
                                ">

                        </div>

                        <div class="mb-4">

                            <label
                                class="form-label fw-bold"
                                style="color: #F8F8F8;">

                                {{ __('messages.revisor_reason') }}

                            </label>

                            <textarea
                                class="form-control"
                                name="message"
                                rows="5"
                                required
                                style="
                                    background-color: #111111;
                                    color: #F8F8F8;
                                    border: 1px solid #333333;
                                ">{{ old('message') }}</textarea>

                            @error('message')

                                <small class="text-danger">

                                    {{ $message }}

                                </small>

                            @enderror

                        </div>

                        <div class="d-grid">

                            <button
                                class="btn fw-bold py-2"
                                style="
                                    background-color: #D4AF37;
                                    color: #111111;
                                    border: none;
                                ">

                                {{ __('messages.send_request') }}

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-layout>