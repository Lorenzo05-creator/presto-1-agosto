<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        
    }

    
    public function boot(): void
    {
        
        if (Schema::hasTable('categories')) {
            View::share(
                'categories',
                Category::orderBy('name')->get()
            );
        }

       
        Paginator::useBootstrap();
    }
}
