<?php

namespace Mdabagh\GenerateLog;

use Illuminate\Support\ServiceProvider;

class GLogServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(GLogFactory::class, function() {
            return new GLogFactory; 
        });

        $this->mergeConfigFrom(__DIR__.'/../config/GLog.php', 'GLog');
    }
    
    public function boot(){
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
		$this->publishes([
			realpath(__DIR__.'/../migrations') => database_path('migrations')
		], 'migrations');
    }
}