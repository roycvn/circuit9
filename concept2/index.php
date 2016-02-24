<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<html>
        <head>
                <title>REST API</title>
                <style type='text/css'>
                        body{background:#fcfcfc; margin:0px; padding:0px; font-family:arial; font-size:12px;} 
                        .effects,*{transition:all .5s ease-in-out; -moz-transition:all .5s ease-in-out; -webkit-transition:all .5s ease-in-out; -o-transition:all .5s ease-in-out; -ms-transition:all .5s ease-in-out;}
                        .fl{float:left;}
                        .fr{float:right;}
                        .cl{clear:both;}
                        h1{background:#4101AF; padding:10px; color:#fff;}
                        .container{margin:10px;}
                        .whitebox{background:#fff; border:1px #eee solid; padding:10px; margin:10px; min-height:200px;}
                        .selectcity{width:20%;}
                        .selectcity span{font-size:14px; background:#fff; color:#333; border-bottom:1px #eee solid; padding:10px; display:block; cursor:pointer;}
                        .selectcity span:last-child{border:none;}
                        .selectcity span:hover{background:#eee; color:#4101af;}
                        .weather_report *{font-size:14px;}
                        .weather_report{width:35%;}
                        .weather_report table tr td{padding:10px;}
                        .weather_report .labeltxt{color:#333;}
                        .weather_report table tr td:last-child{font-weight:bold; color:#333;}
                        .getdata{width:35%; background:#fff;}
                </style>
        </head>
        
        <body class='effects'>
                <h1>REST API</h1>
                <div class='container'>
                 
                  <div class='whitebox weather_report fl'>
                        <div id='container'>
                                <form class='listingsfrm' action='postdata.php' enctype='multipart/form-data'>
                                <div id='listings'>
                                     <table>
                                                <tr><td><div class='labeltxt'>Image</div></td><td>
                                                <input type="file" name='image' />
                                                </td></tr>
                                                <tr><td><div class='labeltxt'>Label</div></td><td>
                                                <input type='text' size='40' name='label' /></td></tr>
                                                <tr><td></td><td>
                                                <input type='submit' value='Save Listing' name='submit'/></td></tr>
                                     </table>                                                
                                     <div id='message'></div>
                                </div>
                                </form>
                        </div>
                  </div>
                  <div class='whitebox getdata fl'></div>
                  <div class='cl'></div>
                </div>
        </body>
<script type='text/javascript'>
$(document).ready(function (e){
  $(".listingsfrm").on('submit',(function(e){
          e.preventDefault();
          $.ajax({
            url: "postdata.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                $("#message").html(data);
                request_rest_api();
            },
            error: function(){} 	        
          });
  }));
});

function request_rest_api()
{
        $.ajax({
                url:'request_info_api.php',
                success:function(data){$('.getdata').html(data);}                
        });
        
}
request_rest_api();
</script>
</html>