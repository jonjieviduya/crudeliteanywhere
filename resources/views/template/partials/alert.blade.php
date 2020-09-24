@if(session()->has('primary-alert'))
	<div class="alert alert-primary text-center alert-dismissible fade show rounded-0" role="alert">
	    {{ session()->get('primary-alert') }}
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	    </button>
	</div>
@endif
