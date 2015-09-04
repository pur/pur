<?php namespace Pur\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Pur\Besvarelse;
use Pur\Oppgave;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

        // Sørger for at moduloppgaver slettes med sin oppgave
        // (kan ikke gjøres med 'on delete cascade' i DB):
        Oppgave::deleting(function ($oppgave) {
            if (!$oppgave->moduloppgave->delete()) return false;
        });

        // Sørger for at moduloppgavesvar slettes med sin besvarelse
        // (kan ikke gjøres med 'on delete cascade' i DB):
        Besvarelse::deleting(function($besvarelse)
        {
            foreach($besvarelse->oppgavesvar as $oppgavesvar)
                if(!$oppgavesvar->moduloppgavesvar->delete()) return false;
        });
	}

}
