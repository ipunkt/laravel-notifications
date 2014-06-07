<?php
/**
 * laravel-notifications
 *
 * @author rok
 * @since 07.06.14
 */

namespace Ipunkt\LaravelNotifications;


use Illuminate\Session\Store;
use Illuminate\Translation\Translator;

/**
 * Class FlashNotifier
 *
 * The flash notifier flashes a message with meta information to session storage.
 * He can translate it by default
 *
 * @package Ipunkt\LaravelNotifications
 */
class FlashNotifier
{

	/**
	 * session store
	 *
	 * @var \Illuminate\Session\Store
	 */
	private $session;
	/**
	 *
	 *
	 * @var \Illuminate\Translation\Translator
	 */
	private $translator;

	/**
	 * inject session store and translator
	 *
	 * @param Store $session
	 * @param Translator $translator
	 */
	public function __construct(Store $session, Translator $translator)
	{
		$this->session = $session;
		$this->translator = $translator;
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
		$message = $this->translateMessage($message);

		$this->session->flash('flash_notification.message', $message);
		$this->session->flash('flash_notification.level', $level);
		if ($overlay) {
			$this->session->flash('flash_notification.overlay', true);
		}
	}

	/**
	 * tries to translate the message if existing, otherwise returns the original message string
	 *
	 * @param string $message
	 * @return string
	 */
	private function translateMessage($message)
	{
		if ($this->translator->has($message))
		{
			return $this->translator->get($message);
		}

		return $message;
	}

	/**
	 * setting up view namespace to handle as hint path
	 *
	 * optional helper function
	 */
	public static function setupViewNamespace()
	{
		\Illuminate\Support\Facades\View::addNamespace('ipunkt/laravel-notifications', app_path('../vendor/ipunkt/laravel-notifications/src/views'));
	}
}