<?php
include("ketnoi.php");
$action = $_POST["action"];
if(!empty($action))
 {
    $nd=$_POST["txtmessage"];
    echo $nd;
    $id=$_POST['id'];
    
    switch($action) 
    {
		case "edit":

    $conn->query("UPDATE post_comment SET noidung_comment='$nd' WHERE id='$id' ");
    
        break;
    }
}
  ?>

