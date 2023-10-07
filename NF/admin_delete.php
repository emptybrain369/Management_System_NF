<?php
  session_start();
  $con = new mysqli("localhost","root","","user_nf");
  $id=$_GET['id'];
  $data=$con->query("DELETE FROM tbl_user WHERE user_id='$id'");
     if($data){
        header("Location:admin_view_user.php");
     }
?>