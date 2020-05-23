<?php
session_start();
include("ketnoi.php");
$id=$_POST['idlike'];
$username=$_SESSION['username'];

$sql3="SELECT post_like.username FROM post_like,post 
where post_like.post_like=post.id_post and post_like.post_like='$id' and
 post_like.username='$username' group by post_like.username";  
 $result3 = mysqli_query($conn, $sql3);
                if($result3->num_rows > 0)
                {
                     while ( $data3 = $result3->fetch_assoc() ) 
                                {       
                                    if($data3['username']==$username)
                                    {?>
                                        <i class="fas fa-thumbs-up"></i> </i>
                                   <?php }
                                    else
                                    {?>
                                        <i class="far fa-thumbs-up"></i> </i>
                                   <?php }
                                   
                             
                                
                               
                                }
                } 
                else
                {?>
                    <i class="far fa-thumbs-up"></i>
              <?php  } 

$sql3="SELECT count(*) as'tong' FROM post_like,post 
where post_like.post_like=post.id_post and post_like.post_like='$id' ";  
 $result3 = mysqli_query($conn, $sql3);
                if($result3->num_rows > 0)
                {
                     while ( $data3 = $result3->fetch_assoc() ) 
                                {     
                                   echo $data3['tong'];
                                 
                                }
                } 
                else
                {
                     echo $data3['tong']=0;
                }  

 
