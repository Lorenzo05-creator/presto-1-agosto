<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;


Route::get('/', [PublicController::class, 'home'])->name('home');


Route::get('/articles', [ArticleController::class, 'index'])
    ->name('articles.index');

Route::get('/categories/{category}/articles',
    [ArticleController::class, 'byCategory']
)->name('articles.byCategory');



Route::middleware('auth')->group(function () {

    
    Route::get('/articles/create', [ArticleController::class, 'create'])
        ->name('articles.create');

});

Route::get('/articles/{article}', [ArticleController::class, 'show'])
    ->name('articles.show');




Route::middleware(['auth', 'isRevisor'])->group(function () {


    Route::get('/revisor/dashboard', [RevisorController::class, 'index'])
        ->name('revisor.index');

    
    Route::patch('/revisor/accept/{article}', [RevisorController::class, 'accept'])
        ->name('revisor.accept');

  
    Route::patch('/revisor/reject/{article}', [RevisorController::class, 'reject'])
        ->name('revisor.reject');
});

Route::middleware('auth')->group(function () {

    Route::get('/lavora-con-noi', function () {
        return view('revisor.work-with-us');
    })->name('work.with.us');

    Route::post('/become-revisor', [RevisorController::class, 'becomeRevisor'])
        ->name('become.revisor');
});


Route::get('/make-revisor/{email}', [RevisorController::class, 'makeRevisor'])
    ->name('make.revisor');
