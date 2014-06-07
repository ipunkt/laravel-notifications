# Notification package for Laravel 4.x

Thanks to Jeffrey Way (https://laracasts.com/lessons/flexible-flash-messages)

## Installation

Add to your composer.json following lines

	"require": {
		"ipunkt/laravel-notifications": "~1.0"
	}

Add `'Ipunkt\LaravelNotifications\NotificationsServiceProvider',` to `providers` in `app/config/app.php`.

Add `'Flash' => 'Ipunkt\LaravelAnalytics\NotificationsFacade',` to `aliases` in `app/config/app.php`.


## Usage

In controller action use following statement to make a flash notification:

	//	flashing an info message
	Flash::message('Welcome');

	//	flashing an info message
	Flash::info('Welcome');

	//	flashing a success message
	Flash::success('Welcome');

	//	flashing an error message
	Flash::error('Welcome');

	//	flashing an overlaying message
	Flash::overlay('Welcome');

In your view or layout template (e.g. a blade template) include the view of your choice:

	@include('laravel-notifications::bootstrap-3/flash')

Or you can publish the views and modify it to your needs:

	$> php artisan view:publish ipunkt/laravel-notifications


## Credits

All credits goes to Jeffrey Way and <https://laracasts.com>.
We add translations and split various templates as package content.
