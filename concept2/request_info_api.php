<?php
        $response = file_get_contents('http://localhost/concept2.1/info_api.php');
        $response_data=json_decode($response,true);
?>
<table>
<?php
        foreach($response_data['info'] as $data)
        {
?>
        <tr valign='middle'>
                <td><?php echo '<img src="data:image/gif;base64,' . $data['image'] . '" width="100" height="50" />'; ?></td>
                <td><div class='labeltxt'><?php echo $data['label']; ?></div></td>
        </tr>
<?php
        }
?>
</table>