

@extends("layouts.main")

@section("title")
Home!
@endsection
@section("content")
	<script type="text/javascript" src="{{Asset('assets/js/myjs/home.js')}}"></script>

	<div class="container col-md-9">
	<div class="page-header">
  		<h1>HOME</h1>
	</div>

	<div role="tabpanel">

	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist" id='myTab'>
	    <li role="presentation" class="active"><a href="#rooms" aria-controls="rooms" role="tab" data-toggle="tab">Live Rooms</a></li>
	    <li role="presentation"><a href="#songs" aria-controls="songs" role="tab" data-toggle="tab">Hot Songs</a></li>
	    
	  </ul>

	  <br>

	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div role="tabpanel" class="tab-pane active" id="rooms">
	    	@foreach($rooms as $room)
				<div class="media">
				  <div class="media-left">
				    <a href="{{$room->id}}/room">
				    	<img class="media-object" src="http://localhost:8080/Music/public/images/grooves_3.png">
				    </a>
				  </div>

				  <div class="media-body">
				    <h4 class="media-heading"><a href="{{$room->id}}/room">{{$room->title}}</a></h4>
				    <p>Status: 
						@if($room->status==0)<span class="label label-warning">not live</span>
						@else
							<span class="label label-info">live</span>
						@endif 
						| Intro: <span class="label label-default">{{$room->intro}}</span>
						
						<br>
						Genres: <span class="label label-default">{{$room->genres}}</span>
						| Rank: <span class="label label-default">{{$room->rank}}</span>  
						<br>
						Listeners: <span class="label label-default">{{$room->listeners}}</span>   
						| Plays: <span class="label label-default">{{$room->plays}}</span> 
					</p>	
				  	
		          </div>
		          <div class="media-right media-middle">
		          	<a class="btn btn-info" href="{{$room->id}}/room"> Join Now!</a>
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
				    <p>Artist: {{$song->artist}}  |Album: {{$song->album}}  |Genres: {{$song->genres}}</p>
				    <p>Listened: {{$song->listened}}</p>
				  	
		          </div>

		          <div class="media-right media-middle">
		          	<a class="btn btn-info" href="s/{{$song->id}}"> Listen Now!</a>
		          </div>
				</div>
		    	<hr>
			@endforeach
			
	    </div>
	    
	  </div>

	</div>
	</div>

@stop
