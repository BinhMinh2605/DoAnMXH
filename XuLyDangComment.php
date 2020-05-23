
<?php
session_start();
include("ketnoi.php");
            $error = '';
            $nftext='';
            

           
               
                if(empty($_POST["id"]) || empty($_POST["nftext"]))
                {
                    $error .= 'du lieu trong';
                }
                else
                {
                    $nftext= $_POST['nftext'];
                   
                    $id=$_POST['id'];
                    
                   
                }

           
                $user=$_SESSION['username'];
            if($error == '')
            {
              $conn->query ("INSERT INTO post_comment (username,post_comment,noidung_comment,thoigian)
              VALUE ('$user','$id','$nftext',NOW()) ");

         
            $error .= 'tc';
            }

            $data = array('error'  => $error);
            echo json_encode($data);






