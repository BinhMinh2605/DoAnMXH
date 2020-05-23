<?php
session_start();
include('thuvien.php');
include('KetNoi.php');
include('menu.php');

//$fullname=$_SESSION['fullname'];




if (isset($_POST['timkiem'])) // Kiểm tra nút có giá trị dữ liệu
{
    $search = addslashes($_POST['txtTenTimKiem']);
        $sql2 = "SELECT username FROM member where fullname like '%$search%'";
        $result = mysqli_query($conn, $sql2);
        if($result->num_rows > 0)
        {
            while ( $data2 = $result->fetch_assoc() ) 
                { 
                $user_timkiem =$data2['username'];
                
                }
                
                  $query = "SELECT fullname,birthday,sex,Anh,email from member where fullname like '%$search%'";
            $sql = mysqli_query($conn,$query);
            if($sql->num_rows > 0)
            { 
                while ( $data= $sql->fetch_assoc() ) 
                {?>
                    <div class="container">
                    <div class="row">
                      <div class="col-3">
                      <div class="shadow p-3 mb-5 bg-white rounded">
                                          <img class="img-fluid rounded-circle" 
                                          style="width:150px; height:150px;margin-bottom: 20px;"
                                          src="<?php echo $data['Anh'] ;?>"  class="rounded-circle" class="rounded-lg" 
                                          alt="User">

                                          
                        <br>
        <strong>Fullname:</strong> <?php echo $data['fullname'];?><br>
        <strong> Email: </strong><?php echo $data['email'];?><br>
        <strong>Birthday:</strong><?php echo $data['birthday'];?><br>
        <strong>Sex:</strong><?php echo $data['sex'];?> <br> 
        </div> 
        
    </div>
                <?php 
                }

            }?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           
           
            <div class="container">
             <form method="POST" id="comment_form">
           
              <div class="form-group">
               <input type="hidden" name="search" id="search" value="<?php echo $search ;?>" />
              
               <button type="submit" name="submit" id="submit" class="btn btn-info" > <div id="display_comment"></div> </button>
            <h2><a href="chat.php?username=<?php echo $user_timkiem;?>"><i class="fab fa-facebook-messenger"></i></a></h2>
              </div>
             </form>
             <span id="comment_message"></span>
             <br />
             <div id="display_comment"></div>
            </div>
           
          
          <script>
          $(document).ready(function(){
           
           $('#submit').click( function(event){
            event.preventDefault();
            var search=$('#search').val('<?php echo $search ;?>');
            $.ajax({
             url:"XuLyKB.php",
             method:"POST",
             data:search,
             dataType:"JSON",
             success:function(data)
             {
              if(data.error != '')
              {
               $('#comment_form')[0].reset();
               $('#comment_message').html(data.error);
               $('#search').val('<?php echo $search ;?>');
               console.log(data);
               load_comment();
              }
             }
            })
           });
          
           load_comment();
          
           function load_comment()
           {
              var search=$("#search").val('<?php echo $search ;?>');
            $.ajax({
             url:"load_trangthaiKB.php",
             method:"POST",
             data:search,
             success:function(data)
             {
              $('#display_comment').html(data);
             }
            })
           }
          
           
          });
          </script>

       
       <?php
       }
        else
        {
            echo "Không có dữ liệu";
        }        
}

else
{
    $search=$_GET['fullname'];
    $query = "SELECT fullname,birthday,sex,Anh,email from member where fullname like '%$search%'";
            $sql = mysqli_query($conn,$query);
            if($sql->num_rows > 0)
            { 
                while ( $data= $sql->fetch_assoc() ) 
                {?>
                    <div class="container">
                    <div class="row">
                      <div class="col-3">
                      <div class="shadow p-3 mb-5 bg-white rounded">
                                          <img class="img-fluid rounded-circle" 
                                          style="width:150px; height:150px;margin-bottom: 20px;"
                                          src="<?php echo $data['Anh'] ;?>"  class="rounded-circle" class="rounded-lg" 
                                          alt="User">

                                          
                        <br>
        <strong>Fullname:</strong> <?php echo $data['fullname'];?><br>
        <strong> Email: </strong><?php echo $data['email'];?><br>
        <strong>Birthday:</strong><?php echo $data['birthday'];?><br>
        <strong>Sex:</strong><?php echo $data['sex'];?> <br> 
        </div> 
        
    </div>
    <?php
                }
            }
}
?>

 

<div class="col-md-9">
  <div class="shadow p-3 mb-5 bg-white rounded">
<!--------------------------------------XUẤT BÀI VIẾT------------------------------------->
<?php
include('KetNoi.php');
$sql = "SELECT post.id_post,post.noidung, post.thoigian,post.anh,post.chedo, member.Anh, member.fullname
FROM post,member where member.username=post.username and member.fullname='$search' "; 

$result = mysqli_query($conn, $sql);


if($result->num_rows > 0)
{
                while ( $data = $result->fetch_assoc() ) 
                { 
               
                            $post= $data["id_post"];
                            if($data['anh']==NULL)
                            {
                                ?>
                                <img src="<?php echo $data['Anh'] ;?>"  class="rounded-circle" class="rounded-lg" class="img-fluid rounded-circle" 
                                            style="width:50px; height:50px;margin-bottom: 50px;">
                                        <strong> <?php echo $data['fullname']; ?> </strong>
                                        
                                        <i><small>  <?php echo $data['thoigian'];?> </small></i>
                               
                                <br>
                            <?php echo $data['noidung']; 
                            }
                            else
                            {
            ?>
            <img src="<?php echo $data['Anh'] ;?>"  class="rounded-circle" class="rounded-lg" class="img-fluid rounded-circle" 
            style="width:50px; height:50px;margin-bottom: 50px;"><strong> <?php echo $data['fullname']; ?> </strong>
                        <i><small>  <?php echo $data['thoigian'];?> </small></i>
                              <br>
                            <?php echo $data['noidung']; ?>
                            <br>
                            <img src="<?php echo $data['anh'] ;?>"class="rounded mx-auto d-block" alt="Responsive image" 
                            style=".img-fluid. max-width: 100%; height: auto;margin-bottom: 50px;"> 
                        <?php
                             }
                            
                             ?>

<!-----------------xuat like------------------->
<form method="POST" id="like_form<?php echo $data['id_post']; ?>"> 

<input type="hidden" name="idlike" id="idlike<?php echo $data['id_post'];?>" value="<?php echo $data['id_post'];?>" />

<button type="submit" name="like" id="submit<?php echo $data['id_post'];?>"  value="Submit">
<div id="display_like<?php echo $data['id_post']; ?>"></div></button>
</form>


<script type="text/javascript">
$(document).ready(function() 
{
$("#submit<?php echo $data['id_post'];?>").click( function(event)
{
event.preventDefault();
var id=$("#idlike<?php echo $data['id_post'];?>").val('<?php echo $data['id_post'] ?>');
$.ajax({
url:"XuLyLike.php",
method:"POST",
data:id,
dataType:"JSON",
success:function(data)
{
if(data.error != '')
{
 console.log(data);
 $('#idlike<?php echo $data['id_post'];?>').val('<?php echo $data['id_post'];?>');
 load_like();
}
}
})
});

load_like();

function load_like()
{
var id=$("#idlike<?php echo $data['id_post'];?>").val('<?php echo $data['id_post'] ?>');
$.ajax({
url:"load_like.php",
method:"POST",
data:id,
success:function(data)
{
$('#display_like<?php echo $data['id_post']; ?>').html(data);
}
})
}
});
</script>

<!-----------------xuat like------------------->
             
         <!---xuat cometn-->
          <div id="display_comment<?php echo $data['id_post']; ?>">
       
           <?php
include("ketnoi.php");

            $sql2 = "SELECT post_comment.id, member.Anh, post_comment.noidung_comment, post_comment.thoigian,member.fullname FROM post_comment,member where 
            post_comment.username=member.username and post_comment.post_comment='$post'";
            $result2 = mysqli_query($conn, $sql2); 
            if($result2->num_rows > 0)
                {
                    while ( $data2 = $result2->fetch_assoc() ) 
                        { 
                            ?>   
                     
        <div id="comment-<?php echo $data2["id"];?>" > 

  <div class="p-2 mb-2 bg-light text-dark">
      <img src="<?php echo $data2['Anh'] ;?>"  class="rounded-circle" class="rounded-lg" class="img-fluid rounded-circle" 
       style="width:50px; height:50px;margin-bottom: 50px;">
       <strong><?php echo $data2['fullname']; ?></strong>
       <i><small> <?php echo $data2['thoigian']; ?></small></i>
       <div class="container">
       <div class="row justify-content-start">

       <input type="submit" name="delete" id="delete<?php echo $data2['id'];?>" class="btn btn-outline-primary btn-sm" value="Xóa" 
onclick="deletecomment('<?php echo $data2['id'];?>')" />   
<input type="submit" name="update" id="update<?php echo $data2['noidung_comment'];?>" class="btn btn-outline-danger btn-sm" value="Sửa" 
onclick="updatecomment('<?php echo $data2['id'];?>')" />
</div> 
</div>

       <h3><div class="message-content"><?php echo $data2['noidung_comment']; ?></div></h3>


       
   </div>    
                    


                      
</div>     
                     
      <script type="text/javascript"> 

function updatecomment(id) 
{
var currentMessage = $("#comment-" + id + " .message-content").html();

var editMarkUp = '<textarea rows="5" cols="80" id="txtmessage">'+currentMessage+'</textarea><button name="ok" class="btn btn-outline-danger btn-sm" onClick="callCrudAction(\'edit\','+id+')">Save</button><button name="cancel" class="btn btn-outline-primary btn-sm" onClick="cancelEdit(\''+currentMessage+'\','+id+')">Cancel</button>';

$("#comment-" + id + " .message-content").html(editMarkUp);
}

         function deletecomment(id) 
            {

            if(confirm("Are you sure you want to delete this comment?"))
            {
                    $.ajax({
                     url:"XuLyXoaComment.php",
                     method:"POST",
                     data:'id='+id,
                     dataType:"JSON",
                     success:function(data)
                     {
                      if(data.error != '')
                      {
                       
                       console.log(data);
                       $("#comment-"+id).remove();
                      }
                    }
                  });
            }
        }




function callCrudAction(action,id) 
{
var data;
switch(action) 
{
case "edit":
data= 'action='+action+'&id='+ id + '&txtmessage='+ $("#txtmessage").val();
break;
}	 

$.ajax({
url: "XuLyUpdateComment.php",
data:data,
type: "POST",

success:function(data)
{
switch(action)
     {
        
        case "edit":
    $("#comment-"+id + " .message-content").html(data);
    console.log(data);
}
        
}	
});
}
                   </script>
               <?php 
               }
            }
                      ?>

          </div>
          

          


            <!--<span id="comment_message<?php //echo $data['id_post'];?>"></span>-->
         <!----xuat comment-->

<br>
    <form method="POST" id="comment_form<?php echo $data['id_post']; ?>">  
         
   <div class="input-group">           
<input type="text" id="nftext<?php echo $data['id_post']; ?>" name="nftext" placeholder="Comment" class="form-control">
<input type="hidden" name="id" id="id<?php echo $data['id_post'];?>" value="<?php echo $data['id_post'];?>" />
<input type="submit" name="comment" id="sub<?php echo $data['id_post'];?>" class="btn btn-info" value="Đăng" />
                
                </div> 
    </from>
<br><br><br>                

<script type="text/javascript">
$(document).ready(function()
{
$('#sub<?php echo $data['id_post'];?>').click( function(event)
{
event.preventDefault();
var form_data = $('#comment_form<?php echo $data['id_post'] ;?>').serialize();
$.ajax({
url:"XuLyDangComment.php",
method:"POST",
data:form_data,
dataType:"JSON",
success:function(data)
  {
    if(data.error != '')
    {
    $('#comment_form<?php echo $data['id_post'];?>')[0].reset();
    $('#comment_message<?php echo $data['id_post'];?>').html(data.error);
    console.log(data);
    $('#id<?php echo $data['id_post'];?>').val('<?php echo $data['id_post'];?>');
    load_comment();
    
    }
  }
})
});

load_comment();

function load_comment()
{
var id=$("#id<?php echo $data['id_post'];?>").val('<?php echo $data['id_post'] ?>');
$.ajax({ 
url:"load_comment.php",
method:"POST",
data:id,
success:function(data)
{
$('#display_comment<?php echo $data['id_post']; ?>').html(data);

}
})
}
});
</script>         
              <?php
    }
}   
else
{
echo" không bai viet";
}   ?> 
</div>
<!---------------------ket thuc xuat bai viet------------------------------> 
</div>

<div class="col-3">
<?php
$fullname=$_SESSION['fullname'];
$query2="SELECT  member.fullname,member.username,member.Anh FROM friend,member,online where friend.tinhtrang='2' and online.username=member.username 
and ((member.fullname=friend.friend1 and friend.friend2='$fullname') 
or (member.fullname=friend.friend2 and friend.friend1='$fullname') )";
$sql2 = mysqli_query($conn,$query2);
if($sql2->num_rows > 0)
{ 
  while ( $data= $sql2->fetch_assoc() ) 
  {?>
  <table class="table">
<thead>
<tr class="table-secondary">
<th scope="col">
    <a class="pest_btn" href="chat.php?username=<?php echo $data['username'];?>">
<img src="<?php echo $data['Anh'] ;?>" class="rounded-circle" class="rounded-lg" class="img-fluid rounded-circle" 
    style="width:50px; height:50px;margin-bottom: 50px;"> <?php echo $data['fullname']; ?>
</th>
</a>
    </tr>
</thead>
</table> 

<?php
  }

}
  ?> 


</div>
</div>  
</div>    
</div>
  