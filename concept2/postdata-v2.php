<?php
        include('config.php');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        echo '<pre>'; print_r($_FILES); echo '</pre>';
        //$data = base64_encode(file_get_contents($_FILES['user_file']['tmp_name']));
        @$image = $request->image['tmp_name'];
        @$label = $request->label;
    
        if($request)
        {
                $query="insert into listings(image,label) values('".$image."','".$label."')";
                $execute=mysql_query($query) or die(mysql_error());
                if($execute)
                {
                        $json=array('status'=>1,'message'=>'Done Listing Added');
                }
                else
                {
                        $json=array('status'=>0,'message'=>'Unable to Add New Listing');
                }
        }
        else
        {
                $json=array('status'=>0,'message'=>'Unable to process your request');
        }
        
        @mysql_close($connection);
        header('Content-type: application/json');
        echo json_encode($json);
?>