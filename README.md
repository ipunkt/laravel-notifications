# Notification package for Laravel 4.x

[![Latest Stable Version](https://poser.pugx.org/ipunkt/laravel-notifications/v/stable.svg)](https://packagist.org/packages/ipunkt/laravel-notifications) [![Latest Unstable Version](https://poser.pugx.org/ipunkt/laravel-notifications/v/unstable.svg)](https://packagist.org/packages/ipunkt/laravel-notifications) [![License](https://poser.pugx.org/ipunkt/laravel-notifications/license.svg)](https://packagist.org/packages/ipunkt/laravel-notifications) [![Total Downloads](https://poser.pugx.org/ipunkt/laravel-notifications/downloads.svg)](https://packagist.org/packages/ipunkt/laravel-notifications)

Thanks to Jeffrey Way (https://laracasts.com/lessons/flexible-flash-messages)

## Installation

Add to your composer.json following lines

	"require": {
		"ipunkt/laravel-notifications": "1.*"
	}

Add `'Ipunkt\LaravelNotifications\NotificationsServiceProvider',` to `providers` in `app/config/app.php`.

Add `'Flash' => 'Ipunkt\LaravelNotifications\NotificationsFacade',` to `aliases` in `app/config/app.php`.


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

You can also use translatable messages:

	Flash::message('app.errors.input_invalid');

In your view or layout template (e.g. a blade template) include the view of your choice:

	@include('laravel-notifications::bootstrap-3/flash')

You can publish the views and modify it to your needs (optional):

	$> php artisan view:publish ipunkt/laravel-notifications


## Credits

All credits goes to Jeffrey Way and <https://laracasts.com>.
We add translations for views, translating message string and split various templates as package content.
