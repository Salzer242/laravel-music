$(document).ready(function()
{	
	var url_roomuser = $("#viewroom").attr('href');
    console.log(url_roomuser);

	$('.modal#startModal').on("keyup","#suggest-song",function(e){		
        e.preventDefault();
        //alert('keyup');
        $.ajax({
            url : "http://localhost:8080/Music/public/search",
            data : {search:$(this).val()},
            dataType: 'json',
            //cache: false,
            success : function(data){
            	//alert(data.html);
                $('#ajax-suggest-song').html(data.html);
                console.log(data);
                //location.reload();
            }
        });

    });    

    //$(".suggest").on("click",function(e){
    $('.modal#startModal').on("click",".suggest",function(e){            
        e.preventDefault();
        var rel = $(this).attr('rel');
        //alert(rel+' suggest');
        var data = {};
        data.song_id = rel;
        
        $.ajax({
            url: url_roomuser+'/addsong',
            data: data,
            dataType: 'json',
            success : function(data){
            	console.log(data);
                $('#ajax-playlist').html(data.html);
            }
        });
        
    });

    $('.modal#startModal').on("click","#startroom",function(e){            
        e.preventDefault();
        //alert(rel+' suggest');
        $.ajax({
            url: url_roomuser+'/start',
            method: 'POST',
            dataType: 'json',
            success : function(data){
                console.log(data);
                location.reload();
            }
        });
        
    });

    $(document).on("click","#offroom-head",function(e){            
        e.preventDefault();
        //alert(rel+' suggest');
        $.ajax({
            url: url_roomuser+'/off',
            dataType: 'json',
            success : function(data){
                console.log(data);
                location.reload();
            }
        });
        
    });
});