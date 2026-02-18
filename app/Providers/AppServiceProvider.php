<?php

namespace App\Providers;

use App\Contracts\WhatsappService;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;
use App\Services\TextMeBotWhatsappService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(WhatsappService::class, TextMeBotWhatsappService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LogViewer::auth(function ($request) {
            return \Illuminate\Support\Facades\Auth::check();
        });
    }
}
