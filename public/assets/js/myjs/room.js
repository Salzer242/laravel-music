var pathname = window.location.pathname; // Returns path only
    
var url_room = window.location.href;     // Returns full url-room

$(document).ready(function(){

    
    
    //var url_room = "http://localhost:8080/Music/public";    
    
    //$(document).on("click","#r-start",function(e){
        //e.preventDefault();

        //$.ajax({
            //url-room: url-room+'/start',
            //dataType: 'json',
            //success : function(data){
                //alert(data.data);
                //location.reload();
            //}
        //});
        
    //});

	$('#r-leave').hide();
    $('#player').hide();



	$(document).on('click','#r-join',function(){
		$(this).hide();
		$('#r-leave').show();

        $('#player').show();
        getCurrentSong();
        
       
        $('#currentsong').hide();
	});

	$(document).on('click','#r-leave',function(){
		$(this).hide();
		$('#r-join').show();
        $("#jquery_jplayer_1").jPlayer('pause')
        $('#player').hide();
        $('#currentsong').show();
	});

	
	$('#room-setting').hide();

	$('#r-setting').click(function(){
		$('#room-setting').toggle();
	});

	$(document).on("keyup","#suggest-song",function(e){		
        e.preventDefault();
        //alert('keyup');
        $.ajax({
            url : "http://localhost:8080/Music/public/search",
            data : {search:$("#suggest-song").val()},
            dataType: 'json',
            //cache: false,
            success : function(data){
            	//alert(data.html);
                $('#ajax-suggest-song').html(data.html);
                //console.log(data);
            }
        });

    });    

    //$(".suggest").on("click",function(e){
    $(document).on("click",".suggest",function(e){            
        e.preventDefault();
        var rel = $(this).attr('rel');
        //alert(rel+' suggest');
        var data = {};
        data.song_id = rel;
        
        $.ajax({
            url: url_room+'/addsong',
            data: data,
            dataType: 'json',
            success : function(data){

                $('#ajax-playlist').html(data.html);
                if(data.error==true) alert("Bai hat nay da co trong danh sach!!!");
            }
        });
        
    });

    //$(".vote").on("click",function(e){
    $(document).on("click",".vote",function(e){
        e.preventDefault();
        var rel = $(this).attr('rel');
        //alert(rel+' vote');
        var data = {};
        data.song_id = rel;

        $.ajax({
            url: url_room+'/votesong',
            data: data,
            dataType: 'json',
            success : function(data){
                console.log(data);
                $('#ajax-playlist').html(data.html);
            }
        });
    });    

    $("#jquery_jplayer_1").jPlayer({
        ready: function (event) {
            
            
            
        },  
        ended: function (event) {
            getCurrentSong();
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

    //console.log(getCurrentSong());
});

function getCurrentSong(){
        

        $.ajax({
            
            url: url_room+'/currentsong',
            dataType: 'json',
            success : function(data){
                
                //console.log(data);
                data=data.data;
                console.log(data);
                var currentSong=data.currentSong;

                if(currentSong==null) location.reload();
                $("#jquery_jplayer_1").jPlayer("setMedia", {
                    title: currentSong.songname,
                    mp3: "http://localhost:8080/Music/public/"+currentSong.pathsong
                }).jPlayer("play",data.timestart);
                
            }
        });
       
    }