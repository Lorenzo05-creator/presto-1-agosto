<h2>Nuova richiesta revisore</h2>

<p><strong>Nome:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>

<p><strong>Messaggio:</strong></p>
<p>{{ $messageText }}</p>

<a href="{{ route('make.revisor', $user->email) }}">
    Rendi revisore
</a>

