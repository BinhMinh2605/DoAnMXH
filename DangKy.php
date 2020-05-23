<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
</html>

<title>Trang đăng ký</title>
<br>
<br>
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-12">

    <div class="shadow-sm p-3 mb-5 bg-white rounded">
        <h1> Đăng Ký</h1> 
    
        <form action="XuLi.php" method="POST">
        
            <div class="form-group row">
                <label for="inputUsername" class="col-sm-1 col-form-label">UserName:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="txtUsername"  placeholder="User Name">
                </div>
            </div>


            <div class="form-group row">
                <label for="inputPassword" class="col-sm-1 col-form-label">Password:</label>
                <div class="col-sm-9">
                <input type="password" class="form-control" name="txtPassword"  placeholder="Password">
                </div>
            </div>



            <div class="form-group row">
                <label for="inputTenHienThi" class="col-sm-1 col-form-label">Họ Tên:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="txtFullname"  placeholder="Full Name">
                </div>
            </div>


            <div class="form-group row">
                <label for="inputEmail" class="col-sm-1 col-form-label">Email:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="txtEmail"  placeholder="Email">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputBirthday" class="col-sm-1 col-form-label">Birthday:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="txtBirthday"  placeholder="Birthday">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputGioiTinh" class="col-sm-1 col-form-label">GiớiTính:</label>
                <div class="col-sm-9">
              
                        <select name="txtSex">
                            <option value=""></option>
                            <option value="Nam">Nam</option>
                            <option value="Nu">Nữ</option>
                        </select>
                </div>
            </div>

           <div class="col-sm-9">
                <button class="btn btn-primary" type="button">Đăng ký</button>
            </div>

            </div>
            </div>
            </div>
            </div>
        </form>
    </body>
</html>