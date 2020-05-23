<?php
include('KetNoi.php');
session_start();

$error = '';
$id='';


if(empty($_POST["idlike"]) )
{
    $error .= 'du liebtbu trong';
}
else
{
    $id=$_POST['idlike'];
}




$user=$_SESSION['username'];
if($error == '')
{

    if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM post_like where username='$user' and post_like='$id'")) > 0)
   {
       
      $sql="DELETE  from post_like where username='$user' and post_like='$id' ";
                if ($conn->query($sql) == TRUE)
                {
                    $error .= 'cap nhat thanh cong';
                    $data = array('error'  => $error);
                }
                else
                {
                    $error .= 'loi';
                    $data = array('error'  => $error);
                }
         
   }

   else
   {
    $conn->query ("INSERT INTO post_like (username,post_like)VALUE ('$user','$id' ) ");
    $error .= 'them tc';
    $data = array('error'  => $error);
   }


}


echo json_encode($data);
  