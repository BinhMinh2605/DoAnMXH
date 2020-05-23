
<?php 
session_start();
include('menu.php');

?>  

<form action="XuLyDangBaiViet.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
    <div class="container">
     <div class="row">
    <div class="col-md-12 login-sec" > 


<div class="card shadow mb-5 bg-white rounded">
    <div class="card-header">
        <strong>Tạo bài viết</strong>
    </div>

    <div class="card-body">
          
        <div class="col-xs-12 col-sm-12 col-md-12">
            <textarea name="Txtnoidung"  rows="5" placeholder="Bạn đang nghĩ gì ?...." class="form-control"></textarea>
        </div>

    
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                        <input type="file" name="upload" id="upload">  
                </div>
                
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <select name="CheDo"  class="form-control-sm form-control">
                        <option value="1">Công Khai</option>
                        <option value="2">Bạn Bè</option>
                        <option value="3">Chỉ Mình Bạn</option>
                    </select>
                </div>
                
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <button type="submit" name="dangbaiviet" class="btn btn-primary btn-lg btn-block">Đăng Bài</button>
                </div>
            </div>
    </div>
</div>
</div>
</div>
</div>
    </form>

<?php
include('XuatBaiViet.php');
?>
