<?php
/**
 * mitarbeiterbereich2
 *
 * @author rok
 * @since 07.03.14
 */

namespace Ipunkt\LaravelNotifications;


use Illuminate\Support\Facades\Facade;

class NotificationsFacade extends Facade {

	/**
	 * facade accessor
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'flash.notifications';
	}

}