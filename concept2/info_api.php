<?php
        include('config.php');
        $query="select * from listings";
        $execute=mysql_query($query) or die(mysql_error());
        $result =array();
        while($r = mysql_fetch_array($execute)){
          extract($r);
          $result[] = array("image" => $image, "label" => $label); 
        }
        $json = array("status" => 1, "info" => $result);
        @mysql_close($conn);
        header('Content-type: application/json');
        echo json_encode($json);
?>