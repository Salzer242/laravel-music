@extends("layouts.main")
@section("title")
Upload!
@endsection

@section("content")

	

	<div class="col-lg-4 col-sm-offset-4">
		
		<h1>Upload Songs</h1>

		{{ Form::open(array('url'=>'upload','method'=>'post', 'files'=>true)) }}

			<div class="form-group">
			    <label for="songname">Song Name</label>
			    <input type="text" class="form-control" id="songname" name="songname" placeholder="Song Name">
			    @if ($errors->has('songname')) <p class="help-block">{{ $errors->first('songname') }}</p> @endif
			</div>

			<div class="form-group">
			    <label for="artist">Artist</label>
			    <input type="text" class="form-control"= id="artist" name = "artist" placeholder="Artist">
			    @if ($errors->has('artist')) <p class="help-block">{{ $errors->first('artist') }}</p> @endif
			</div>

			<div class="form-group">
			    <label for="album">Album</label>
			    <input type="text" class="form-control" id="album" name="album" placeholder="Album">
			    @if ($errors->has('album')) <p class="help-block">{{ $errors->first('album') }}</p> @endif
			</div>

			<div class="form-group">
				<label for="genres">Genres</label>
		        <select class="form-control" id="genres" class="form-control" name="genres">
				  <option>multi-genre</option>
				  <option>Pop</option>
				  <option>Rock</option>
				  <option>Rap/Hip Hop</option>
				  <option>Country</option>
				  <option>Electronic/Dance</option>
				  <option>R&B/Soul</option>
				  <option>Audiophile</option>
				</select>
			    @if ($errors->has('genres')) <p class="help-block">{{ $errors->first('genres') }}</p> @endif
			</div>

			<div class="form-group">
			  	<label for="image">Song upload</label>
			  	<input type="file" id="image" name="image">
			  	@if ($errors->has('song')) <p class="help-block">{{ $errors->first('song') }}</p> @endif
			</div>
			    
		 	@if(Session::has('success'))

	    		<script> 
		    		$(document).ready(function(){
		    			alert("{{Session::get('success')}}");
		    		});
	    		 </script>        
			
			   	@endif

			@if(Session::has('error'))
	    	

	    		<script> 
		    		$(document).ready(function(){
		    			alert("{{Session::get('error')}}");
		    		});
	    		 </script>        
			
			@endif
			
		  <button type="submit" class="btn btn-success">Upload!</button>
		  
		{{ Form::close() }}


		

	</div>
@stop