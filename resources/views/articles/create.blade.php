<x-layout title="Inserisci annuncio">

    <div class="container py-5">

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
                class="display-4 fw-bold mt-2"
                style="color: #F8F8F8;">

                Inserisci annuncio

            </h1>

            <p
                class="fs-5"
                style="color: #B8B8B8;">

                Inserisci tutti i dettagli del tuo annuncio.

            </p>

            <div
                class="mx-auto mt-3"
                style="
                    width: 80px;
                    height: 3px;
                    background-color: #D4AF37;
                ">
            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div
                    class="rounded-4 shadow-lg p-4 p-md-5"
                    style="
                        background-color: #1A1A1A;
                        border: 1px solid #D4AF37;
                    ">

                    <livewire:create-article-form />

                </div>

            </div>

        </div>

    </div>

</x-layout>