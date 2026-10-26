<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Ép sử dụng HTTPS nếu ứng dụng đang chạy trên môi trường production (Render)
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
