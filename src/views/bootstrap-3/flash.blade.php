<?php
/** control the error summary */
$showErrorSummary = false;


$sources = array('success', 'errors', 'error', 'warning', 'info', 'notice');
foreach ($sources as $source)
	$messageSources[$source] = Session::get($source, []);

$mapSourceToClass = array(
	'success' => 'success',
	'errors' => 'danger',
	'error' => 'danger',
	'warning' => 'warning',
	'info' => 'info',
	'notice' => 'notice',
);

?>
@if (isset($errors) && $errors->any() && $showErrorSummary)
	@include('laravel-notifications::bootstrap-3/message', ['message' => 'Error occured', 'level' => 'danger', 'body' => 'Your last request got an error.'])
@endif

@foreach ($messageSources as $source => $messages)
	@if (is_array($messages))
		@foreach ($messages as $message)
			@include('laravel-notifications::bootstrap-3/message', ['message' => $message, 'level' => $mapSourceToClass[$source]])
		@endforeach
	@else
		@include('laravel-notifications::bootstrap-3/message', ['message' => $messages, 'level' => $mapSourceToClass[$source]])
	@endif
@endforeach

@if (Session::has('flash_notification') && !empty(Session::get('flash_notification')))
	@if (Session::has('flash_notification.overlay'))
		@include('laravel-notifications::bootstrap-3/modal', ['modalClass' => 'flash-modal', 'title' => Lang::get('laravel-notifications::notifications.modal.title'), 'body' => Session::get('flash_notification.message')])
	@else
		@include('laravel-notifications::bootstrap-3/message', ['message' => Session::get('flash_notification.message'), 'level' => Session::get('flash_notification.level')])
	@endif
@endif
