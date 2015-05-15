
@foreach($songs as $song)
	<div class="media">
	  <div class="media-left">
	    <a href="s/{{$song->id}}/" target="_blank">
	    <h1><span class="glyphicon glyphicon-cd" aria-hidden="true" ></span></h1>
	    </a>
	  </div>

	  <div class="media-body">
	  	<a href="s/{{$song->id}}" target="_blank">
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
