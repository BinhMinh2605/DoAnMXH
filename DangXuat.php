<?php
session_start();

if (isset($_SESSION['fullname']) && $_SESSION['username']){

   //kiểm tra nếu có session tên us thì xóa nó đi
    unset($_SESSION['fullname']);
    unset($_SESSION['username']);
    unset($_SESSION['usertimkiem']);
  


    echo 'Bạn đã đăng xuất thành công.';
    
    header("Refresh:1; url=DangNhap.php");
}
?>