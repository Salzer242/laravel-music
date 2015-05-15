@extends("layouts.modal")
@section("title")
    Setting Room:
@endsection



@section("content")
    <form method="POST" action="http://localhost:8080/Music/public/{{$room->id}}/room/setting" novalidate>
              
      <div class="form-group">
          <label for="title">Title</label>
          <input type="text" id="title" class="form-control" name="title" value="{{$room->title}}">             
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
      </div>

      <div class="form-group">
          <label for="intro">Intro</label>
          <textarea class="form-control" rows="2" id="intro"  name="intro">{{$room->intro}}</textarea> 
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Save changes</button>
      </div>
    </form>
@stop