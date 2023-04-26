<?php

namespace Mdabagh\GenerateLog;

use Illuminate\Support\ServiceProvider;

class GenerateLogServiceProvider extends ServiceProvider
{
    public function register()
    {
       
    }
    
    public function boot(){
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
		$this->publishes([
			realpath(__DIR__.'/../migrations') => database_path('migrations')
		], 'migrations');
    }
}