<?php
        include('config.php');  
                
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
                $label=isset($_POST['label'])?mysql_real_escape_string($_POST['label']):'';
                $query="insert into listings(image,label) values('','".$label."')";
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