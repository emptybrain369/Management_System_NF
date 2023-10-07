<?php
session_start();
$con = new mysqli("localhost","root","","user_nf");
$id=$_GET['id']; 
$data=$con->query("DELETE FROM tbl_project WHERE project_id='$id'");
     if($data){
        header("Location:admin_projects_status.php");
     }
?>
