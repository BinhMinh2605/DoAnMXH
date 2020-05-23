<?php
include("ketnoi.php");
$id=$_POST['id'];
                $sql2 = "SELECT post_comment.id, member.Anh, post_comment.noidung_comment, post_comment.thoigian,member.fullname FROM post_comment,member where 
                post_comment.username=member.username and post_comment.post_comment='$id'";
                $result2 = mysqli_query($conn, $sql2); 
                if($result2->num_rows > 0)
                    {
                        while ( $data2 = $result2->fetch_assoc() ) 
                            { 
                                ?>


                                <div id="comment-<?php echo $data2["id"];?>" > 
                                <div class="container">
  <div class="media mt-3">
    <div class="media-left">
      <img src="<?php echo $data2['Anh'] ;?>"  class="rounded-circle" class="rounded-lg" class="img-fluid rounded-circle" 
       style="width:50px; height:50px;margin-bottom: 50px;">
       </div>
       <div class="media-body"><h4 class="media-heading">
      <?php echo $data2['fullname']; ?>
       <small><i> <?php echo $data2['thoigian']; ?></i></small></h4>
       <p> <div class="message-content"><?php echo $data2['noidung_comment']; ?></div></p>

 </div>
 </div>
 </div>

         
           <input type="submit" name="delete" id="delete<?php echo $data2['id'];?>" class="btn btn-outline-primary btn-sm" value="Xóa" 
onclick="deletecomment('<?php echo $data2['id'];?>')" /> 
<input type="submit" name="update" id="update<?php echo $data2['noidung_comment'];?>" class="btn btn-outline-danger btn-sm" value="Sửa" 
onclick="updatecomment('<?php echo $data2['id'];?>')" />  

<br>
<smaill>-------------------------------------------------------------------------------------------------</smail>                   

        

       <br><br> 
     <?php
                            }
                    } 
                    else
                    {?>
                <small>  <i> <?php  echo "Không có bình luận!";?> </i> </small>
                   <?php }                 
                    ?>


                   