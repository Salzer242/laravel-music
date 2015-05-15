@extends("layouts.modal")
@section("title")
    Start Room:
@endsection



@section("content")
    
        <div class="row">
        <div class="col-md-5">
            <h4>Suggest first song<small>(phải có ít nhất một bài hát trong playlist)</small>:</h4>
            <input type="text" class="form-control" name="suggest-song" id="suggest-song" placeholder="Suggest song here...">            
            <br>
            <div id="ajax-suggest-song">
                
            </div>
        </div>

        <div class="col-md-6">
            <h4>Current playlist: </h4>
             <div id="ajax-playlist">
            @if($playlist==false)
            <p>Empty!!!</p>
            @else
           
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
                    <button type="button" id="suggest" class="suggest btn btn-info" rel="{{$song->id}}"> Suggest!</a>
                  </div>
                </div>
                <hr>
                @endforeach
            
            @endif
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" id="startroom" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Start Room</button>
        </div>    
      

    
    
@stop