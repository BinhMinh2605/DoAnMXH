<?php
session_start();
include("ketnoi.php");
$search=$_POST['search'];
$fullname=$_SESSION['fullname'];
$query2=  "SELECT tinhtrang FROM friend where 
(friend.friend2='$search' or  friend.friend1='$search') 
and (friend.friend1='$fullname' or friend.friend2='$fullname') ";
  $sql2 = mysqli_query($conn,$query2);
  if($sql2->num_rows > 0)
  { 
      while ( $data= $sql2->fetch_assoc() ) 
      {
        
         if($data['tinhtrang']==1) //da gui
         {

            $query2=  "SELECT tinhtrang FROM friend where 
             friend.friend1='$search' and  friend.friend2='$fullname' ";
              $sql2 = mysqli_query($conn,$query2);
              if($sql2->num_rows > 0)
              { 
                  while ( $data= $sql2->fetch_assoc() ) 
                  {
                        echo "Đồng Ý";
                  }
              }
              else
              {
                 echo "Hủy";
              }
         }
         else if($data['tinhtrang']==2) //da la ban be
         {
              echo "Bạn Bè";
         }
     }
  }
  else
  {
    echo "Kết Bạn";
  }
  ?>