<?php namespace Pur\Providers;

use Illuminate\Support\ServiceProvider;
use Pur\Purmoduler\Regnskap\Bilag;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        // TODO : Implementer ferdig og flytt til egen service provider for regnskapsmodulen:
		view()->composer('purmoduler.regnskap.besvarelser._rediger', function($view){
            $view->with('bilagssamling', Bilag::all());
        });
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'Pur\Services\Registrar'
		);
	}

}
