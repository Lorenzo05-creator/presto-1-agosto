<div
    class="card h-100 rounded-4 overflow-hidden shadow"
    style="
        background-color: #1A1A1A;
        border: 1px solid #D4AF37;
        color: #F8F8F8;
    ">

    @if($article->images->count())

        <div class="position-relative" style="height:220px;">

            <img
                src="{{ asset('storage/' . $article->images->first()->path) }}"
                class="card-img-top"
                style="height:220px; width:100%; object-fit:cover;"
                alt="{{ $article->title }}">

            <img
                src="{{ asset('images/presto_watermark.png') }}"
                alt="PRESTO"
                style="
                    position:absolute;
                    bottom:10px;
                    right:10px;
                    width:100px;
                    height:auto;
                    z-index:10;
                ">

        </div>

    @else

        <div class="position-relative" style="height:220px;">

            <img
                src="https://picsum.photos/600/400"
                class="card-img-top"
                style="height:220px; width:100%; object-fit:cover;"
                alt="Placeholder">

            <img
                src="{{ asset('images/presto_watermark.png') }}"
                alt="PRESTO"
                style="
                    position:absolute;
                    bottom:10px;
                    right:10px;
                    width:100px;
                    height:auto;
                    z-index:10;
                ">

        </div>

    @endif

    <div class="card-body d-flex flex-column">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <span
                class="badge px-3 py-2"
                style="
                    background-color: #D4AF37;
                    color: #111111;
                ">

                {{ __('messages.'.$article->category->name) }}

            </span>

            <small style="color: #B8B8B8;">
                {{ $article->created_at->format('d/m/Y') }}
            </small>

        </div>

        <h4
            class="fw-bold mb-3"
            style="color: #F8F8F8;">

            {{ $article->title }}

        </h4>

        <h3
            class="fw-bold mb-3"
            style="color: #D4AF37;">

            € {{ number_format($article->price, 2, ',', '.') }}

        </h3>

        <p
            class="flex-grow-1"
            style="color: #B8B8B8;">

            {{ \Illuminate\Support\Str::limit($article->description, 110) }}

        </p>

        <div
            class="d-flex justify-content-between align-items-center mt-4"
            style="
                border-top: 1px solid #333333;
                padding-top: 1rem;
            ">

            <small style="color: #B8B8B8;">

                {{ __('messages.author') }}:
                {{ $article->user->name }}

            </small>

            <a
                href="{{ route('articles.show', $article) }}"
                class="btn rounded-pill px-4 fw-bold"
                style="
                    background-color: #D4AF37;
                    color: #111111;
                    border: none;
                ">

                {{ __('messages.details') }} →

            </a>

        </div>

    </div>

</div>