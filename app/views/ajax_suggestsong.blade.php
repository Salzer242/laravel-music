
@foreach($songs as $song)
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
      	<button type="button" id="suggest" class="suggest btn btn-info" rel="{{$song->id}}"> Suggest!</a>
      </div>
	</div>
	<hr>
@endforeach	    	