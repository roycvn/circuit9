<?php
        include_once('class_citydata.php');
        $cityinfo=new WeatherData();
        $weather=array_shift($cityinfo->getCityWeather($_POST['city']));
        $coreData=$weather['results']['channel'];
?>

<table>
        <tr>
                <td width='150'><div class='labeltxt'>Weather Reported </div></td>
                <td><div class='labeltxt'>:</div></td>
                <td><?php echo date('dS, M Y h:i:sa',strtotime($weather['created'])); ?></td>
        </tr>
        <tr>
                <td><div class='labeltxt'>Location </div></td>
                <td><div class='labeltxt'>:</div></td>
                <td><?php echo $coreData['location']['city'].' ['.$coreData['location']['region'].'], '.$coreData['location']['country']; ?></td>
        </tr>
        <tr>
                <td><div class='labeltxt'>Weather Type </div></td>
                <td><div class='labeltxt'>:</div></td>
                <td><?php echo $coreData['item']['condition']['text']; ?></td>
        </tr>
        <tr>                                                  
                <td><div class='labeltxt'>Temp. </div></td>
                <td><div class='labeltxt'>:</div></td>
                <td><?php echo $coreData['wind']['chill'].'&degC'; ?></td>
        </tr>
</table>                        
<script type='text/javascript'>
         updateMap(<?php echo $coreData['item']['long']; ?>,<?php echo $coreData['item']['lat']; ?>,<?php echo "'".$coreData['location']['city']."'";?>);
</script>
            