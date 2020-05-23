<?php
$severname="localhost";
$username="root";
$passwordl="";
$database = "mxh";

 $conn=new mysqli($severname,$username,$passwordl,$database);

 if($conn->connect_error)
 {
     die ("". $conn->connect_error);
 }
 else
 {
     echo ("");
 }
 ?>