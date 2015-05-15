@if(Session::has('error_login'))
  <script type="text/javascript">
    $(document).ready(function(){
              alert("{{Session::get('error_login')}}");
            });
  </script>
@endif

@if(Session::has('error_signup'))
  <script type="text/javascript">
    $(document).ready(function(){
              alert("{{Session::get('error_signup')}}");
            });
  </script>
@endif

  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">

      
      <!--
      <a class="navbar-brand" href="">
        <img alt="Brand" src="...">
      </a>

      <a class="navbar-brand bg-primary" href="">MUSIC</a>
    -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="http://localhost:8080/Music/public/"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="http://localhost:8080/Music/public/rooms">Rooms</a></li> 
        <li><a href="http://localhost:8080/Music/public/songs">Songs</a></li>
        <li><a href="http://localhost:8080/Music/public/about">About</a></li> 
      </ul>

      <ul class="nav navbar-nav navbar-right">

        @if (Auth::check())
          <li><a href="http://localhost:8080/Music/public/{{Auth::id()}}">
            <span class="glyphicon glyphicon-user"></span>
            <strong class="text-primary"> {{Auth::user()->username}}</strong>
          </a></li>
          <li><a href="http://localhost:8080/Music/public/upload">
            <span class="glyphicon glyphicon-open"></span>
             Upload
          </a></li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-headphones"></span> Room <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li>
                      <a id="viewroom" href="http://localhost:8080/Music/public/{{Auth::id()}}/room"> View Room</a>
                  </li>
                  @if(Room::find(Auth::id())->status==0)
                  <li>
                      <a id="startroom-head" href="http://localhost:8080/Music/public/{{Auth::id()}}/room/start" data-toggle="modal" data-target="#startModal">
                         Start Room
                      </a>
                  </li> 
                  @else

                   <li>
                      <a id="offroom-head" href="http://localhost:8080/Music/public/{{Auth::id()}}/room/off">
                         Off Room
                      </a>
                  </li> 
                  @endif

                  <li>
                      <a id="settingroom-head" href="http://localhost:8080/Music/public/{{Auth::id()}}/room/setting" data-toggle="modal" data-target="#settingModal">
                         Setting
                      </a>
                  </li>
              </ul>
          </li>
          <li><a href="http://localhost:8080/Music/public/logout"><span class="glyphicon glyphicon-log-out"></span> 
            Logout</a>
          </li>
        @else
          <li><a href="http://localhost:8080/Music/public/register" data-toggle="modal" data-target="#signUpModal"><span class="glyphicon glyphicon-pencil"></span> 
            Sign Up</a>
          </li>
          <li><a href="http://localhost:8080/Music/public/login" data-toggle="modal" data-target="#logInModal"><span class="glyphicon glyphicon-log-in"></span> 
            Login</a>
          </li>
        @endif
        
        
        
      </ul>

      <form class="navbar-form navbar-right" action="http://localhost:8080/Music/public/search" method="get" role="search">
        <div class="form-group">
          <input type="text" class="form-control" name="search" id="search" placeholder="Enter song name..." value="{{Input::old('search')}}">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>
      </form>

    </div>
  </div>
</nav>

@if (Auth::check())
  <!-- Setting Modal -->
  <div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        
      </div>
    </div>
  </div>


  <!-- Start Modal -->
  <div class="modal fade" id="startModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
       
      </div>
    </div>
  </div>

@endif

<!-- Login Modal -->
  <div class="modal fade" id="logInModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        
      </div>
    </div>
  </div>

  <!-- Sign Up Modal -->
  <div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        
      </div>
    </div>
  </div>

<script type="text/javascript" src="{{Asset('assets/js/myjs/head.js')}}"></script>