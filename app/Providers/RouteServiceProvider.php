<?php namespace Pur\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'Pur\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

        // Pur:
        $router->model('bruker', 'Pur\Bruker');
        $router->model('oppgave', 'Pur\Oppgave');
        $router->model('besvarelser', 'Pur\Besvarelse');
        $router->model('oppgavesett', 'Pur\Oppgavesett');

        // Purmoduler\Regnskap:
        $router->model('bilagssekvens', 'Pur\Purmoduler\Regnskap\Bilagssekvens');
        $router->model('bilagsmaler', 'Pur\Purmoduler\Regnskap\Bilagsmaler');
        $router->model('posteringsmal', 'Pur\Purmoduler\Regnskap\Posteringsmal');
        $router->model('bilag', 'Pur\Purmoduler\Regnskap\Bilag');

	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
