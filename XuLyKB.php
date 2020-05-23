 <?php
 session_start();
 include('KetNoi.php');
 $fullname=$_SESSION['fullname'];

 $error = '';

 $search = '';
 

 if(empty($_POST["search"]))
 {
  $error .= 'Không nhận được dữ liệu!';
 }
 else
 {
  $search = $_POST["search"];
 }


 if($error == '')
{
    
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM friend, member where friend.friend1=member.fullname
    and  member.fullname='$fullname' and friend.friend2='$search'")) > 0)
   {
           $sql="DELETE from friend where friend1='$fullname' and friend2='$search' ";
        if ($conn->query($sql) == TRUE)
       {
        $error .= 'Xóa lời mời kết bạn thành công!';
        $data = array('error'  => $error);
       }
       else 
       {
        $error .= 'Có lỗi';
        $data = array('error'  => $error);
       }
    }
    elseif(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM friend where 
      friend.friend1='$search' and  friend.friend2='$fullname' ")) > 0)
    {
        $sql="UPDATE  friend SET tinhtrang=2 where friend2='$fullname' and friend1='$search' ";
        if ($conn->query($sql) == TRUE)
       {
        $error .= 'Đồng ý kết bạn thành công!';
        $data = array('error'  => $error);
       }
       else 
       {
        $error .= 'Có lỗi';
        $data = array('error'  => $error);
       }
    }
    else 
    {
    
     $sql="INSERT INTO friend (friend1,friend2,tinhtrang)VALUE ('$fullname','$search','1')";
     if ($conn->query($sql) == TRUE)
     {
      $error .= 'Gửi lời mời kết bạn thành công!';
      $data = array('error'  => $error);
     }
     else 
     {
      $error .= 'Có lỗi!';
      $data = array('error'  => $error);
     }
    
      
    }
       
    
}
$data = array('error'  => $error);
echo json_encode($data);
  ?>

