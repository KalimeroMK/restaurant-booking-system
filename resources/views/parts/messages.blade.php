@if(count($errors))
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

			@foreach($errors->all() as $error)
				<div class="alert alert-danger alert-dismissible">
			    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    	<strong>Worning! </strong> {{ $error }}	  
			    </div>
			@endforeach

		</div>	
	</div>	
@endif

@if(Session::has('success'))
	<div class="row">
	    <div class="col-lg-12 col-md-12 col-sm-12">
		    <div class="alert alert-success alert-dismissible">
		        <button type="button" class="close" data-dismiss="alert">&times;</button>
		        <strong>Success !!</strong> {{ Session::get('success') }}
		    </div>
		</div>	
	</div>	
@endif


