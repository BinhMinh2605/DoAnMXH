<?php
include('KetNoi.php');
session_start();
$username=$_SESSION['username'];


$target_dir    = "uploads/";
//Vị trí file lưu tạm trong server
$target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);
$allowUpload   = true;

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$maxfilesize   = 800000; //(bytes)

$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


if(isset($_POST["submit"])) 
{
    //Kiểm tra xem có phải là ảnh
    $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
    if($check !== false) 
    {
        echo "Đây là file ảnh - " . $check["mime"] . ".";
        $allowUpload = true;
    } 
    else 
    {
        echo "Không phải file ảnh.";
        $allowUpload = false;
    }
}


// Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
if ($_FILES["fileupload"]["size"] > $maxfilesize)
{
    echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
    $allowUpload = false;
}


// Kiểm tra kiểu file
if (!in_array($imageFileType,$allowtypes ))
{
    echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
    $allowUpload = false;
}

// Check if $uploadOk is set to 0 by an error
if ($allowUpload) {
    if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
    {
        echo " Đã upload thành công";
        $flag=true;
        if (isset($flag) && $flag == true) 
        {
           header("Location:TrangCaNhan.php");
        }
        $query = "UPDATE member SET Anh='$target_file' WHERE username='$username'";
        if ($conn->query($query) == TRUE)
       {
           echo "thanh cong";
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
else
{
    echo "Không upload được file!";
}
?>