<?php 
session_start(); 
include('KetNoi.php');
?>


<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
       <?php 
      
       if (!isset($_SESSION['username']))
       {
        header('Location: DangNhap.php');
        die();
       }
      
      
        $user= $_SESSION['username'];  
  


$query = "SELECT fullname from member where username='$user'";
            $sql = mysqli_query($conn,$query);
            if($sql->num_rows > 0) 
            { 
                while ( $data= $sql->fetch_assoc() ) 
                {
                   $data['fullname'];
                   $_SESSION['fullname'] =$data['fullname'];

                }
            }  
          $fullname=  $_SESSION['fullname'];
            ?> 

    </body>
</html>


<?php
 //khởi tạo session

$time = time();
$time_check = $time-600; //Ấn định thời gian là 10 phút


//Nếu quá 10 phút, xóa bỏ session
$conn->query("DELETE FROM online WHERE time < $time_check");


?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Trang đăng ký</title>
    </head>
    <body>

    <div class="container">
     <div class="row">
        <div class="col-md-12 login-sec" > 
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">ToTo</a></li>
    <li class="breadcrumb-item"><a href="TrangCaNhan.php">Trang Cá Nhân</a></li>
    <li class="breadcrumb-item"><a href="TrangChu.php">Trang Chù</a></li>
    <li class="breadcrumb-item"><a href="DangXuat.php">Đăng Xuất ( <?php echo $_SESSION['fullname'] ?> )
    </a></li>
  </ol>
</nav>
</html>

<?php
 $query = "SELECT Anh from member where username='$user'";
 $sql = mysqli_query($conn,$query);
 if($sql->num_rows > 0) 
 { 
     while ( $data= $sql->fetch_assoc() ) 
     {
       if($data['Anh']==null )
       {
         echo 'Vui Lòng Chọn Ảnh Đại Diện!';
           ?>
           <br>
           <br>
           <br>
<form action="XuLyUploadAnh.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
<div class="col-5">
<input type="file"name="fileupload" id="fileupload">  
<button type="submit" name="submit" class="btn btn-outline-primary btn-sm">Tải</button>
</div>
</from>
      <?php 
      }
      
       else
       {
        header('Location:TrangChu.php');
       }

     }
 }
?>