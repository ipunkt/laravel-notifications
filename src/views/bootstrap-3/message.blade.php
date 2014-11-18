<?php

//	a view error bag is for form validation errors, no our business at all
//	-> these should be displayed at the field
if ($message instanceof Illuminate\Support\ViewErrorBag) {
	return;
}

?><div class="alert alert-{{ $level }}">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h5>{{ $message }}</h5>
	@if (isset($body) && !empty($body)){{ $body }}@endif
</div>
