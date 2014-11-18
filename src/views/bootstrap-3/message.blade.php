<div class="alert alert-{{ $level }}">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h5>{{ $message }}</h5>
	@if (isset($body) && !empty($body)){{ $body }}@endif
</div>
