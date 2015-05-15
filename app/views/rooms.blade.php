@extends("layouts.main")
@section("title")
Rooms
@endsection

@section("content")
	<div class="container col-md-9">

	<div class="page-header">
  		<h1>ROOMS</h1>
	</div>

	<div role="tabpanel">

	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist" id='myTab'>
	    <li role="presentation" class="active"><a href="#liverooms" aria-controls="liverooms" role="tab" data-toggle="tab">Live Rooms</a></li>
	    <li role="presentation"><a href="#rooms" aria-controls="rooms" role="tab" data-toggle="tab">All Rooms</a></li>
	    
	  </ul>

	  <br>

	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div role="tabpanel" class="tab-pane active" id="liverooms">
	    	@foreach($live as $room)
				<div class="media">
				  <div class="media-left">
				    <a href="{{$room->id}}/room">
				    	<img class="media-object" src="http://localhost:8080/Music/public/images/grooves_3.png">
				    </a>
				  </div>

				  <div class="media-body">
				  	<a href="{{$room->id}}/room">
				    	<h4 class="media-heading">{{$room->title}}</h4>
				    </a>
				    
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
		          <div class="media-right media-middle">
		          	<a class="btn btn-info" href="{{$room->id}}/room"> Join Now!</a>
		          </div>
				</div>
		    	<hr>
			@endforeach

	    	

	    	
	    </div>


	    <div role="tabpanel" class="tab-pane" id="rooms">
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
						| Genres: <span class="label label-default">{{$room->genres}}</span>
						<br>
						| Rank: <span class="label label-default">{{$room->rank}}</span>  
						| Listeners: <span class="label label-default">{{$room->listeners}}</span>   
						| Plays: <span class="label label-default">{{$room->plays}}</span> 
					</p>
				  	
		          </div>
		          <div class="media-right media-middle">
		          	<a class="btn btn-info" href="{{$room->id}}/room"> View !</a>
		          </div>
				</div>
		    	<hr>
			@endforeach
			
	    </div>
	    
	  </div>

	</div>


@stop