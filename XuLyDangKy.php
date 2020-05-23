<?php session_start();
include('ketnoi.php');

$error = '';
$username  = '';
$password='';
$email='';
$fullname='';
$sex='';   

if(empty($_POST['txtUsername']) || empty($_POST['txtPassword']) ||empty($_POST['txtFullname']) || empty($_POST['txtEmail'])|| empty($_POST['txtBirthday'])||empty($_POST['txtSex']))
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
    $password = md5($_POST['txtPassword']);
    $username=$_POST['txtUsername'];
    $email=$_POST['txtEmail'];

    $fullname=$_POST['txtFullname'];
    $sex=$_POST['txtSex'];
    $birthday=$_POST['txtBirthday'];
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM member WHERE username = '$username' or email = '$email' ")) > 0)
    {
        $error = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR!</strong> Tên đăng ký hoặc email đã tồn tại.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      $data = array('error'  => $error);
    }
    else
    {
        $conn->query("INSERT INTO member (username,password,email,fullname,birthday,sex,Anh)VALUE ('$username','$password','$email','$fullname','$birthday','$sex' ,null)");
        $error = '';
      $data = array('error'  => $error);
    }
}
  
echo json_encode($data);
       
