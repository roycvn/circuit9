<?php include('class_citydata.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<html>
        <head>
                <title>Weather Report</title>
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
                        .googlemap{width:35%; background:url('loader.gif') no-repeat #fff; background-position:center center;}
                </style>
        </head>
        
        <body class='effects'>
                <h1>Weather Report</h1>
                <div class='container'>
                  <div class='whitebox selectcity fl'>
                          <?php 
                                  //creating object of child class and accessing city list
                                  $cityinfo=new WeatherData();
                                  echo $cityinfo->getCities();
                          ?>
                  </div> 
                  <div class='whitebox weather_report fl'></div>
                  <div class='whitebox googlemap fl'></div>
                  <div class='cl'></div>
                </div>
        </body>
        
        <script type='text/javascript'>
                function getdata(city)
                {
                        $.ajax({
                                url:'ajax.php',
                                data:{'city':city},
                                type:'post',
                                success:function(sdata){$('.weather_report').html(sdata);},
                                error:function(er){$('.er').html(er);}
                        });
                }
                
                function updateMap(lng,lat,city)
                {
                        $('.googlemap').html('<iframe width="100%" height="200px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;q='+city+'&amp;source=s_q&amp;hl=en&amp;geocode=&amp;aq=0&amp;ie=UTF8&amp;center='+lng+','+lat+'&amp;z=12&amp;iwloc=&amp;output=embed"></iframe>');                
                }
                
                $('.selectcity span:first-child').click();
        </script>
</html>