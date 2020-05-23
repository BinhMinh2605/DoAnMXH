<?php
session_start();
include('ketnoi.php');

$error = '';
$username  = '';
$password='';


if(empty($_POST['txtUsername']))
{
    $error .= ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>ERROR!</strong> Không được bỏ trống.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
$data = array('error'  => $error);
}
else
{
    $username = $_POST['txtUsername'];
    $password = $_POST['txtPassword'];
     
    $_SESSION['txtUsername'] =$username;
}
  

if($error=='')
{
    $password = md5($password);
     
    if (mysqli_num_rows(mysqli_query($conn,"SELECT username,password FROM member WHERE username='$username' and password='$password' "))==0) 
    {
        $error .= ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>ERROR!</strong> Tên đăng nhập không tồn tại.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
$data = array('error'  => $error);
    }
     else
     {
      
    //Lưu tên đăng nhập
   $_SESSION['username'] = $_POST['txtUsername'];
   $time = time();
   $time_check = $time-600; 
 
       if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM online WHERE username ='$username' ")) > 0)
       {
   
         $conn->query("UPDATE online SET time='$time' WHERE username = '$username'");
       }
       else
       {
           $conn->query("INSERT INTO online(username, time)VALUES('$username', '$time')");
       }
   $error .= '';
$data = array('error'  => $error);
     }
        
}


echo json_encode($data);