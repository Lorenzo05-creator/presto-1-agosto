<x-layout title="Registrazione">
    <div class="container">
        <form method="POST" action="{{ route('register') }}" class="col-md-6 mx-auto">
            @csrf

            <input name="name" class="form-control mb-3" placeholder="Nome">
            <input name="email" type="email" class="form-control mb-3" placeholder="Email">
            <input name="password" type="password" class="form-control mb-3" placeholder="Password">
            <input name="password_confirmation" type="password" class="form-control mb-3" placeholder="Conferma password">

            <button class="btn btn-success w-100">Registrati</button>
        </form>
    </div>
</x-layout>
