@if (Session::has('flash_notification'))
	@if (Session::has('flash_notification.overlay'))
		@include('bootstrap-3/modal', [
			'modalClass' => 'flash-modal',
			'title' => Lang::get('laravel-notifications::notifications.modal.title'),
			'body' => Session::get('flash_notification.message')
		])
	@else
		<div class="alert alert-{{ Session::get('flash_notification.level') }}">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4>{{ Session::get('flash_notification.message') }}</h4>
		</div>
	@endif
@endif