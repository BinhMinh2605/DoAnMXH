<?php
include("ketnoi.php");
            $error = '';
            $id='';
                if(empty($_POST["id"]))
                {
                    $error .= 'du lieu trong';
                }
                else
                {
                    $id=$_POST['id'];
                  //  $error .= "$id";
                }
            if($error == '')
            {
              $conn->query("DELETE from post_comment where id='$id' ");

         
            $error .= 'tong';
            }

            $data = array('error'  => $error);
            echo json_encode($data);
?>