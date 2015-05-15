@extends("layouts.main")

@section('head')

<link href="{{Asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{Asset('assets/skin/metro-fire/jplayer.metro-fire.css')}}" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="{{Asset('assets/js/jquery.jplayer.min.js')}}"></script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){

	$("#jquery_jplayer_1").jPlayer({
		ready: function (event) {
			$(this).jPlayer("setMedia", {
				title: "{{$song->songname}}",
				mp3: "{{Asset($song->pathsong)}}"
			}).jPlayer("play");
		},	
		ended: function (event) {
			$(this).jPlayer("play");
		},
		swfPath: "{{Asset('assets/js')}}",
		supplied: "mp3",
		wmode: "window",
		smoothPlayBar: true,
		keyEnabled: true,
		remainingDuration: true,
		toggleDuration: true,
		volume: 1
	});


});
//]]>
</script>
@stop

@section("title")
{{$song->songname}}
@endsection

@section("content")
<div class="col-md-9">
	<div class="row">

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

          
		</div>
    	<hr>
	</div>
	
		<div id="jquery_jplayer_1" class="jp-jplayer"></div>
		<div id="jp_container_1" class="jp-audio">
			
			<div class="jp-controls">
				<a class="jp-play"><i class="fa fa-play"></i></a>
				<a class="jp-pause"><i class="fa fa-pause"></i></a>
			</div>
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
	<br>
	<br>
	</div>
	

@stop