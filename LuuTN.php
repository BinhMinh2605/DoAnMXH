<?php
 session_start();
include('KetNoi.php');
$user=$_SESSION['username'];

$userChat=$_SESSION['usertimkiem'];


$bodymsg=$_REQUEST['usermsg'];


if ($bodymsg != '') 
{
    $query = "INSERT INTO mess (user_gui,user_nhan,noidung,thoigian)
    VALUE ('$user','$userChat','$bodymsg',now() )";

    if ($conn->query($query) == TRUE)
    {

    }
    else
    {
        echo "Có lỗi";
    }
}
else
{
    echo "Có lỗi";
}
?>