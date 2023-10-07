<?php
session_start();
if (!isset($_SESSION['username'])){
  header("Location:user_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NF</title>
    <!-- CSS files -->
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-primary-subtle">
<div class="container">
    <div class="row align-items-center d-flex flex-column text-center mt-3">
        <div class="col-md-4">
            <h2 class="text-uppercase text-success"><?php echo $_SESSION['username']?></h2>
            <nav class="navbar">
             <a href="user_myprofile.php" class="btn btn-info btn-sm text-white" >My Profile</a> 
             <a href="user_myprojects.php" class="btn btn-info btn-sm text-white" >My Projects</a> 
             <a href="user_logout.php" class="btn btn-info btn-sm text-white" >Logout</a> 
            </nav>
        </div>
        <div class="col-md-4 bg-primary mt-3 shadow rounded">
            <?php
            $con = new mysqli("localhost","root","","user_nf");
            @$_GET['id'];
            @$_GET['name'];
            @$_GET['email'];
            @$_GET['contract'];
            @$_GET['password'];
            @$_GET['img'];
            ?>
            <h5 class="text-warning mb-3 mt-3 text-uppercase"> Update My Profile</h5>
            <form method="GET">
                  <div class="form-group mt-3 text-white">
                      <label for="id">User ID:</label>
                      <input type="number" name="uid" id="id" value="<?php echo $_GET['id']?>">
                  </div>
                  <div class="form-group mt-3 text-white">
                      <label for="name">Username:</label>
                      <input type="text" name="uname" id="name" value="<?php echo $_GET['name']?>">
                  </div>
                  <div class="form-group mt-3 text-white">
                      <label for="email">User Email:</label>
                      <input type="email" name="uemail" id="email" value="<?php echo $_GET['email']?>">
                  </div>
                  <div class="form-group mt-3 text-white">
                      <label for="contract">Contract:</label>
                      <input type="number" name="ucontract" id="contract" value="<?php echo $_GET['contract']?>">
                  </div>
                  <div class="form-group  mt-3 text-white">
                      <label for="password">Password:</label>
                      <input  type="password" name="upassword" id="password" value="<?php echo $_GET['password']?>">
                  </div>
                  <div class="form-group mt-3 mb-3 text-white">
                      <label for="photo" class="text-uppercase" > Upload Your Photo:</label></br>
                      <input type="file" class="mt-3" name="uphoto" id="photo" value="<?php echo $_GET['img']?>" style="margin-left:80px;">
                  </div>
                  <button name="update" class=" btn btn-secondary btn-sm mb-3">UPDATE</button>
            </form>   
            <?php
             if (isset($_GET['update'])){
                 $id=$_GET['uid'];
                 $name=$_GET['uname'];
                 $email=$_GET['uemail'];
                 $contract=$_GET['ucontract'];
                 $password=$_GET['upassword'];
                 $img=$_GET['uphoto'];
                 $data = $con->query("UPDATE tbl_user SET user_id='$id',name='$name',email='$email',contract='$contract',password='$password',photo='$img'WHERE user_id='$id'");
                 if (isset($data)){
                      header("Location:user_myprofile.php");
                    }    
                }
            ?>    
        </div>
    </div>
</div>

    <!-- JS files -->
    <!-- Jquery JS -->
    <script src="js/jquery-3.6.3.min.js"></script>
    <!-- FontAwesome JS -->
    <script src="js/all.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Main JS -->
    <script src="js/app.js"></script>
</body>
</html>