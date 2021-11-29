<?php

namespace App\Providers;

use App\Models\UploadFile;
use App\Observers\UploadFileObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerObservers();
    }

    private function registerObservers()
    {
        UploadFile::observe(UploadFileObserver::class);
    }
}
