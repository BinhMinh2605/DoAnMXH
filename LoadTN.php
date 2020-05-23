<?php
 session_start();
include('KetNoi.php');
$username=$_SESSION['username'];
$userChat=$_SESSION['usertimkiem'];


$sql = "SELECT mess.user_gui, mess.noidung, mess.thoigian FROM mess
 where
 
  (mess.user_gui='$username' and mess.user_nhan='$userChat') or
 (mess.user_gui='$userChat' and mess.user_nhan='$username') ORDER BY mess.id ASC ";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0)
{
                while ( $data = $result->fetch_assoc() ) 
                { 

                  

    // Nếu người gửi là $user thì hiển thị khung tin nhắn màu xanh
    if ($data['user_gui'] == $username) 
    {
        echo  ' 
        <div class="row justify-content-start">
      
                        <div class="alert alert-primary" role="alert">' 
                        . $data["user_gui"] . '/' . $data["noidung"] . '/' . $data["thoigian"] . '
                       </div>
            
            </div>';
    }
    // Ngược lại người gửi không phải là $user thì hiển thị khung tin nhắn màu xám
    else
     {
        echo ' 
        <div class="row justify-content-end">
      
         <div class="alert alert-success" role="alert"> '
          . $data["user_gui"] . ' - ' . $data["noidung"]  . '/' . $data["thoigian"] .
          '</div>
          </div>
        
    ';
    }
}
}
?>