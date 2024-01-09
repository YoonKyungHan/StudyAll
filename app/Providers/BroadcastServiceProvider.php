<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Broadcast::routes();
        require base_path('routes/channels.php');

        Broadcast::channel('main-store-channel', function () {
            return true; // 채널에 접근할 권한이 있는 경우 true를 반환합니다.
        });
    }
}
