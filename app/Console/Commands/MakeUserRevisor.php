<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class MakeUserRevisor extends Command
{
    protected $signature = 'app:make-user-revisor {email}';
    protected $description = 'Rende un utente revisore';

    public function handle(): void
    {
        $user = User::where('email', $this->argument('email'))->first();

        if (!$user) {
            $this->error('Utente non trovato');
            return;
        }

        $user->is_revisor = true;
        $user->save();

        $this->info('Utente reso revisore con successo');
    }
}
