@extends("layouts.main")
@section("title")
{{$room->title}}
@endsection

@section('head')

<link href="{{Asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{Asset('assets/skin/metro-fire/jplayer.metro-fire.css')}}" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="{{Asset('assets/js/jquery.jplayer.min.js')}}"></script>

<script type="text/javascript" src="{{Asset('assets/js/myjs/room.js')}}"></script>

<script type="text/javascript">
	//<![CDATA[
	
	//]]>
</script>

@stop

@section("content")
	
	<div id="page-header">
		<div class="media">
		  <div class="media-left">
		    
		    <img class="media-object" src="http://localhost:8080/Music/public/images/groove_1.png">
		   
		  </div>
		  <div class="media-body">
		    
			<h1 class="media-heading">{{$room->title}}</h1> 
					    
			<p>Status: 
				@if($room->status==0)<span class="label label-warning">not live</span>
				@else
					<span class="label label-info">live</span>
				@endif 
				| Intro: <span class="label label-default">{{$room->intro}}</span>
				| Genres: <span class="label label-default">{{$room->genres}}</span>
				<br>
				| Rank: <span class="label label-default">{{$room->rank}}</span>  
				| Listeners: <span class="label label-default">{{$room->listeners}}</span>   
				| Plays: <span class="label label-default">{{$room->plays}}</span> 
			</p>
			
		  </div>
		  
		  
		  	<div class="media-right">
			  	@if($room->status==0)
			  		<button type="button" class="btn btn-info" disabled="disabled"><span class="glyphicon glyphicon-headphones"></span> Join Room!</button>
			  		
			  	@else
			  		<button type="button" class="btn btn-info" id="r-join"><span class="glyphicon glyphicon-headphones"></span> Join Room!</button>
			  		<button type="button" class="btn btn-info" id="r-leave"> Leave Room!</button>	
			  	@endif
		  	</div>
		 

		</div>
	</div>
	<hr>
	<br>
	
	<div class="col-md-9" id="page-container">
		<h2>Current Song: </h2>
		<div class="row" id="currentsong">
			@if($currentSong!=false)
			@if($room->status==1)
				<div class="media">
				  <div class="media-left">
				    <a href="http://localhost:8080/Music/public/s/{{$currentSong->id}}" target="_blank">
				    <h1><span class="glyphicon glyphicon-cd" aria-hidden="true" ></span></h1>
				    </a>
				  </div>

				  <div class="media-body">
				  	<a href="http://localhost:8080/Music/public/s/{{$currentSong->id}}" target="_blank">
				    	<h4 class="media-heading">{{$currentSong->songname}}</h4>
				    </a>
				    
				    <p>Artist: {{$currentSong->artist}}  |Album: {{$currentSong->album}}</p>
				    <p>Genres: {{$currentSong->genres}}  |Listened: {{$currentSong->listened}}  |Plays: {{$currentSong->plays}}</p>
				  	
			      </div>
			      
				</div>
				<hr>
			@endif
			@endif
		</div>

		<div class="row" id="player">
			<div id="jquery_jplayer_1" class="jp-jplayer"></div>
			<div id="jp_container_1" class="jp-audio">
				
				
				<div class="jp-progress">
					<div class="jp-seek-bar">
						<div class="jp-play-bar">
						</div>
					</div>
					<div class="jp-title"></div>
					<div class="jp-current-time"></div>
					<div class="jp-duration"></div>
				</div>

				<div class="jp-no-solution">
					Media Player Error<br>
					Update your browser or Flash plugin
				</div>
			</div>
		</div>
		<br>
		<div class="row" id="room-suggest-form">
			
			<div class="col-md-12">
			    <input type="text" class="form-control" name="suggest-song" id="suggest-song" placeholder="Suggest song here...">

			    <br>
			    <div class="col-md-10" id="ajax-suggest-song">
				
				</div>
			</div>
		</div>

		
		<div class="row" id="ajax-playlist">
			<hr>
			<h3>Playlist: </h3>
			@if($playlist!=false)
				@foreach($playlist as $song)
				<div class="media">
				  <div class="media-left">
				    <a href="http://localhost:8080/Music/public/s/{{$song->id}}/" target="_blank">
				    <h1><span class="glyphicon glyphicon-cd" aria-hidden="true" ></span></h1>
				    </a>
				  </div>

				  <div class="media-body">
				  	<a href="http://localhost:8080/Music/public/s/{{$song->id}}" target="_blank">
				    	<h4 class="media-heading">{{$song->songname}}</h4>
				    </a>
				    
				    <p>Artist: {{$song->artist}}  |Album: {{$song->album}}</p>
				    <p>Genres: {{$song->genres}}  |Listened: {{$song->listened}}  |Plays: {{$song->plays}}</p>
				  	
			      </div>
			      <div class="media-right media-middle">
			      	<button type="button" class="vote btn btn-info" rel="{{$song->id}}"><span class="glyphicon glyphicon-ok-circle"></span> Vote! <span class="badge">{{$song->pivot->rank}}</span></button>
			      </div>
				</div>
				<hr>
			@endforeach
			@endif
		</div>
	
	</div>
	

	
	<!--{{var_dump($room)}} <br/>
	-->
	



			
			
			
@stop