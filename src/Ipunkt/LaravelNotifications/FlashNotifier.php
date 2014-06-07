<?php
/**
 * laravel-notifications
 *
 * @author rok
 * @since 07.06.14
 */

namespace Ipunkt\LaravelNotifications;


use Illuminate\Session\Store;

/**
 * Class FlashNotifier
 *
 * The flash notifier flashes a message with meta information to session storage.
 *
 * @package Ipunkt\LaravelNotifications
 */
class FlashNotifier {

	/**
	 * session store
	 *
	 * @var \Illuminate\Session\Store
	 */
	private $session;

	/**
	 * inject session store
	 *
	 * @param Store $session
	 */
	public function __construct(Store $session)
	{
		$this->session = $session;
	}

	/**
	 * flashes a message
	 *
	 * @param string $message
	 * @return $this
	 */
	public function message($message)
	{
		$this->info($message);

		return $this;
	}

	/**
	 * flashes an info message
	 *
	 * @param string $message
	 * @return $this
	 */
	public function info($message)
	{
		$this->_storeNotificationToSession($message, 'info');

		return $this;
	}

	/**
	 * flashes an info message
	 *
	 * @param string $message
	 * @return $this
	 */
	public function success($message)
	{
		$this->_storeNotificationToSession($message, 'success');

		return $this;
	}

	/**
	 * flashes an info message
	 *
	 * @param string $message
	 * @return $this
	 */
	public function error($message)
	{
		$this->_storeNotificationToSession($message, 'danger');

		return $this;
	}

	/**
	 * adds an overlay message
	 *
	 * @param string $message
	 * @param string $level
	 * @return $this
	 */
	public function overlay($message, $level = 'info')
	{
		$this->_storeNotificationToSession($message, $level, true);

		return $this;
	}

	/**
	 * stores the flash notification to session
	 *
	 * @param string $message
	 * @param string $level
	 * @param bool $overlay
	 */
	private function _storeNotificationToSession($message, $level, $overlay = false)
	{
		$this->session->flash('flash_notification.message', $message);
		$this->session->flash('flash_notification.level', $level);
		if ($overlay)
		{
			$this->session->flash('flash_notification.overlay', true);
		}
	}
}