<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;


class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::whereNull('is_accepted')
            ->orderBy('created_at')
            ->first();

        return view('revisor.index', compact('article_to_check'));
    }

    public function accept(Article $article)
    {
        $article->setAccepted(true);
        $article->save();

        return redirect()->back()->with('message', 'Articolo accettato');
    }

    public function reject(Article $article)
    {
        $article->setAccepted(false);
        $article->save();

        return redirect()->back()->with('message', 'Articolo rifiutato');
    }

    
public function becomeRevisor(Request $request)
{
    $request->validate([
        'message' => 'required|string|min:10',
    ]);

    Mail::to('noreply@agenziacom.test')
        ->send(new BecomeRevisor(auth()->user(), $request->message));

    return redirect()
        ->route('work.with.us')
        ->with('success', 'Richiesta inviata con successo');
}

    public function makeRevisor(string $email)
    {
        Artisan::call('app:make-user-revisor', [
            'email' => $email,
        ]);

        return redirect('/')->with('message', 'Utente reso revisore');
    }
}
