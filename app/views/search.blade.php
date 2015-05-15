
@extends("layouts.main")

@section("title")
Search!
@endsection

@section("content")

<div class="container col-md-9">

	<div class="page-header">
  		<h1>SONGS</h1>
	</div>

	<div role="tabpanel">

	  

	  	<br>

	  


	    <div role="tabpanel" class="tab-pane" id="songs">
	    	@if($songs->isEmpty())
	    		<div>
	    			No song!!!!
	    		</div>
	    	@else
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
			@endif
			
	    </div>
	    
	  </div>

	</div>
	</div>


@stop





<!--
<p>Gui tam</p>

<br>
<br>
<object width="640" height="385">
-->
<!--<param name="movie" value="http://www.youtube.com/v/kY3eR95EdZc&hl=en_US&start=1868&autoplay=1"></param>-->
<!--
<param name="allowscriptaccess" value="always"></param>
<embed src="http://www.youtube.com/v/kY3eR95EdZc&start=1868&autoplay=1&rel=0&amp;
controls=0" type="application/x-shockwave-flash" allowscriptaccess="always"  width="640" height="385">
</embed>
</object>

<br>
<iframe id="ytplayer" type="text/html" width="640" height="390"
  src="http://www.youtube.com/embed/M7lc1UVf-VE?t=1m1&autoplay=1&origin=http://example.com"
  frameborder="0"/>
</body>
-->