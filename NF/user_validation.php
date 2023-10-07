<?php
session_start();
$con = new mysqli("localhost","root","","user_nf");
if(isset($_POST['submit'])){
    $username = $_POST['uname'];
    $password = $_POST['upassword'];
    $data = $con->query("SELECT * FROM tbl_user WHERE name='$username' && password='$password'");
    if($data->num_rows == 1){
        $_SESSION['username'] = $username;
        header("location:user_myprofile.php");
    }
    else{
        header("location:user_login.php");
    }
}
?>