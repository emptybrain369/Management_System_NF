<?php
session_start();
$con = new mysqli("localhost","root","","user_nf");
if(isset($_POST['submit'])){
    $username = $_POST['aname'];
    $password = $_POST['apassword'];
    $data = $con->query("SELECT * FROM tbl_admin WHERE username='$username' && password='$password'");
    if($data->num_rows == 1){
        $_SESSION['username'] = $username;
        header("location:admin_view_user.php");
    }
    else{
        header("location:admin_login.php");
    }
}
?>