<?php

$fullname=$_SESSION['fullname'];
?>
<!DOCTYPE html>
<body >
<form action="XuLyTimKiem.php" method="post" enctype="multipart/form-data">
<div class="web_header">
        <div class="p-2 mb-2 bg-dark text-white">

             <div class="container">
              <div class="row">

              <div class="col-0.5">   
                        <h1><a href="trangchu.php" class="text-danger">ToTo</a></h1>
                     </div>

                     <div class="col-6">
                        <div class="input-group"> 
                          <input type="text" id="ten" name="txtTenTimKiem" placeholder="Tìm kiếm" class="form-control">
                            <button type="submit" class="btn btn-primary" name ="timkiem"><i class="fas fa-search"></i></button>
                        </div>
                     </div>
                    
                     
                     <div class="col-4">     
                    
                    <a href="TrangCaNhan.php"><i class="fas fa-user"></i>Hi!</a>
                    <a href="TrangChu.php">Trang Chủ</a>
                   
                    <a href="mess.php"><i class="fab fa-facebook-messenger"></i></a>
                    <a href="dangxuat.php"><i class="fas fa-sign-out-alt"></i></a>
                 
              </div>


            </div>
             </div>  
      </div>
     </div>   



</form>
</body>
</html>
</html>
</head>
