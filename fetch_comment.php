<?php
include("ketnoi.php");
$id=$_POST["id"];
?>
<?php
                $sql2 = "SELECT post_comment.id, member.Anh, post_comment.noidung_comment, post_comment.thoigian,member.fullname FROM post_comment,member where 
                post_comment.username=member.username and post_comment.post_comment=$post";
                $result2 = mysqli_query($conn, $sql2); 
                if($result2->num_rows > 0)
                    {
                        while ( $data2 = $result2->fetch_assoc() ) 
                            { 
                                ?>
                                
                                <img src="<?php echo $data2['Anh'] ;?>"  class="rounded-circle" class="rounded-lg" class="img-fluid rounded-circle" 
                                style="width:50px; height:50px;margin-bottom: 50px;"><strong><?php echo $data2['fullname']; ?></strong>
                                <i><small> <?php echo $data2['thoigian']; ?></small></i>

                                <?php echo $data2['noidung_comment']; ?><a href="XuLyXoaComment.php?page=products&action=add&id=<?php echo $data2['id'] ?>
                                " onclick="return confirm ('Bạn có muốn xóa?');">Xóa</a>                               
                                    <?php

                            }
                    } 
                    else
                    {
                    echo "Không có bình luận!";
                    }                 
                    ?>