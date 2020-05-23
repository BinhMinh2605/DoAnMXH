<?php

include('KetNoi.php');
session_start(); 
$user=$_SESSION['username'];

$NoiDung = addslashes($_POST['Txtnoidung']);
$CheDo = addslashes($_POST['CheDo']);


$target_di   = "AnhTranDongThoiGian/";



if(isset($_POST["dangbaiviet"])) 
{
    $target   = $target_di . basename($_FILES["upload"]["name"]);
            if($_FILES["upload"]["tmp_name"]==NULL) // kh co anh
            {
                $query = "INSERT INTO post (username,noidung,thoigian,anh,chedo)
                VALUE ('$user','$NoiDung',now(), NULL,'$CheDo' )";
                        if ($conn->query($query) == TRUE)
                    {
                        header("Refresh:0; url=TrangChu.php");
                        exit; // dừng các mã chạy phía dưới;
                    }
                    else
                    {
                        echo "that bại". $conn->error;
                    }
                
            }
        else // khac null, co anh
        {
            if(move_uploaded_file($_FILES["upload"]["tmp_name"], $target))
                {
                echo " Đã upload thành công";
                $flag=true;
                if (isset($flag) && $flag == true) 
                {
                header("Location:TrangChu.php");
                }
                $query = "INSERT INTO post (username,noidung,thoigian,anh,chedo)
                VALUE ('$user','$NoiDung',now(), '$target','$CheDo' )";
                if ($conn->query($query) == TRUE)
                    {
                        header("Refresh:0; url=TrangChu.php");
                        exit; // dừng các mã chạy phía dưới;
                    }
                else
                    {
                        echo "that bia". $conn->error;
                    }
            } 
            else
            {
                echo "Có lỗi xảy ra khi upload file.";
            }   
    }  
   
}