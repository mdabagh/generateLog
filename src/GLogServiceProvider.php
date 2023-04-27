<?php

namespace Mdabagh\GenerateLog;

use Illuminate\Support\ServiceProvider;

class GLogServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(GLogInterface::class, function() {
            $state = config('GenerateLog.state_active');
            return new $state; 
        });
    }
    
    public function boot(){
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
		$this->publishes([
			realpath(__DIR__.'/../migrations') => database_path('migrations')
		], 'migrations');
    }
}