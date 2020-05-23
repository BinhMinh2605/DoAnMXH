<?php session_start();
include("ketnoi.php"); 
include("thuvien.php"); 
include("menu.php");
$user=$_SESSION['username'];
?>

<div class="card-group">
   <?php $query2=  "SELECT distinct member.fullname,member.username,member.Anh FROM mess,member where 
    ((member.username=mess.user_gui and mess.user_nhan='$user') or (member.username=mess.user_nhan and mess.user_gui='$user') )
     ";
      $sql2 = mysqli_query($conn,$query2);
      if($sql2->num_rows > 0)
      { 
          while ( $data= $sql2->fetch_assoc() ) 
          {?>
     <div class="card">
    <img class="card-img-center">
    <a class="pest_btn" href="chat.php?username=<?php echo $data['username'];?> " 
            data-toggle="tooltip"  data-placement="right" title="<?php echo $data['fullname']?>">
            <?php $link_anh=$data['Anh']; echo "<img src='$link_anh' width='249px'height='180px'  >";?> 

    <div class="card-body">
      <h5 class="card-title"><strong> <?php echo $data['fullname']; ?> </strong></h5>
    
      <p class="card-text"><small class="text-muted"></small></p>
    </div>
  </div> 
  <?php
          }
    }

?>


  
</div>











    