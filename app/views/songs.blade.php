@extends("layouts.main")
@section("title")
Songs
@endsection

@section("content")
	<div class="container col-md-9">

	<div class="page-header">
  		<h1>SONGS</h1>
	</div>

	<div role="tabpanel">

	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist" id='songTab'>
	    <li role="presentation" class="active"><a href="#hotsongs" aria-controls="hotsongs" role="tab" data-toggle="tab">Hot Songs</a></li>
	    <li role="presentation"><a href="#songs" aria-controls="songs" role="tab" data-toggle="tab">All Songs</a></li>
	  </ul>

	  <br>

	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div role="tabpanel" class="tab-pane active" id="hotsongs">
	    	@foreach($songs as $song)
				<div class="media">
				  <div class="media-left">
				    <a href="s/{{$song->id}}/">
				    <h1><span class="glyphicon glyphicon-cd" aria-hidden="true" ></span></h1>
				    </a>
				  </div>

				  <div class="media-body">
				  	<a href="s/{{$song->id}}">
				    	<h4 class="media-heading">{{$song->songname}}</h4>
				    </a>
				    
				    <p>Artist: {{$song->artist}}  |Album: {{$song->album}}</p>
				    <p>Genres: {{$song->genres}}  |Listened: {{$song->listened}}  |Plays: {{$song->plays}}</p>
				  	
		          </div>
		          <div class="media-right media-middle">
		          	<a class="btn btn-info" href="s/{{$song->id}}"> Play Now!</a>
		          </div>
				</div>
		    	<hr>
			@endforeach	    	
	    </div>


	    <div role="tabpanel" class="tab-pane" id="songs">
	    	@foreach($songs as $song)
				<div class="media">
				  <div class="media-left">
				    <a href="s/{{$song->id}}">
				    <h1><span class="glyphicon glyphicon-cd" aria-hidden="true" ></span></h1>
				    </a>
				  </div>

				  <div class="media-body">
				    <h4 class="media-heading"><a href="s/{{$song->id}}">{{$song->songname}}</a></h4>
				    <p>Artist: {{$song->artist}}  |Album: {{$song->album}}</p>
				    <p>Genres: {{$song->genres}}  |Listened: {{$song->listened}}  |Plays: {{$song->plays}}</p>
				  	
		          </div>
		          <div class="media-right media-middle">
		          	<a class="btn btn-info" href="s/{{$song->id}}"> Play Now!</a>
		          </div>
				</div>
		    	<hr>
			@endforeach
			
	    </div>
	    
	  </div>

	</div>
	</div>

	
@stop