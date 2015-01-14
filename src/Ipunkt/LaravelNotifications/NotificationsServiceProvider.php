<?php namespace Ipunkt\LaravelNotifications;

use Illuminate\Support\ServiceProvider;

class NotificationsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('ipunkt/laravel-notifications');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$app = $this->app;
		$this->app->bindShared('flash.notifications', function() use ($app) {

			//	return an instance
			return $app->make('Ipunkt\LaravelNotifications\FlashNotifier');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('flash.notifications');
	}

}
