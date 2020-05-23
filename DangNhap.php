<?php include('thuvien.php');?>
<div class="p-2 mb-2 bg-dark text-white">
<span id="message"></span>
<div class="container">
              <div class="row">

                    <div class="col-7">   
                        <h1><a href="trangchu.php" class="text-danger">ToTo</a></h1>
                     </div>
                    
                     <div class="col-2">   
                     <form id="dangnhap" method='POST'>
                     
                UserName: <input type="text" name="txtUsername" value="vivi" >
                     </div>
           
           <div class="col-2"> 
           Password: <input type="password" name="txtPassword" value="123456">
         
          </div>
          
          <div class="col-1">   
         <h1>  <button type='submit' id="dangnhap" name="dangnhap" class="btn btn-primary btn-sm" >Đăng nhập </button> </h1>
         </div>
         </form>
                    </div>
                   
                    </div>
</div>
</div>


<div class="container">
              <div class="row">
              <div class="col-6">
              <img src="background/anh_nen1.jpg" height='500px' width='500px' >           
</div>
<div class="col-6">
<h1>Đăng ký</h1>
<span id="message2"></span>
<form id="dangky" method='POST'>
<div class="form-group row">
              <input type="text" class="form-control" name="txtUsername"  placeholder="User Name">
            </div>
            <div class="form-group row">
            <input type="password" class="form-control" name="txtPassword"  placeholder="Password">
               
            </div>
            <div class="form-group row">
               
                <input type="text" class="form-control" name="txtFullname"  placeholder="Full Name">
                
            </div>


            <div class="form-group row">
             
                <input type="text" class="form-control" name="txtEmail"  placeholder="Email">
               
            </div>

            <div class="form-group row">
                <input type="date" class="form-control" name="txtBirthday"  placeholder="Birthday">
               
            </div>

            <div class="form-group row">
                        <select name="txtSex">
                            <option value="">--Giới tính</option>
                            <option value="Nam">Nam</option>
                            <option value="Nu">Nữ</option>
                        </select>
              
            </div>

            <div class="form-group row">
                <button type='submit' id="dangky" name="dangky" class="btn btn-primary" type="button">Đăng ký</button>
            <div>
      
</div>
</form>
            
</div>
</div>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
 $('#dangnhap').on('submit', function(event)
 {
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"XuLyDangNhap.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
	{
		if(data.error != '')
		{
			
		$('#dangnhap')[0].reset();
		$('#message').html(data.error);  
		
		}
		else
		{
            location.replace('DaDangNhap.php'); 
         
		}
		
	}
  })
 });

});
</script>

<script type="text/javascript">
$(document).ready(function()
{
 $('#dangky').on('submit', function(event)
 {
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"XuLyDangKy.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
	{
		if(data.error != '')
		{
			
		$('#dangky')[0].reset();
		$('#message2').html(data.error);  
		
		}
		else
		{
            location.replace('DaDangNhap.php'); 
         
		}
		
	}
  })
 });

});
</script>

