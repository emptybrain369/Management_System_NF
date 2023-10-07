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
    <div class="row align-items-center d-flex flex-column text-center mt-5">
        <div class="col-md-4">
            <h2 class="text-uppercase text-success"><?php echo $_SESSION['username']?></h2>
            <nav class="navbar">
             <a href="user_myprofile.php" class="btn btn-info btn-sm text-white" >My Profile</a> 
             <a href="user_myprojects.php" class="btn btn-info btn-sm text-white" >My Projects</a> 
             <a href="user_logout.php" class="btn btn-info btn-sm text-white" >Logout</a> 
            </nav>
        </div>
        <div class="col-md-4">
            <h2 class="text-primary mb-3">My Profile</h2>
            <?php
            $con = new mysqli("localhost","root","","user_nf");
            $user = $_SESSION['username'];
            $data = $con->query("SELECT * FROM tbl_user WHERE name='$user'");
            ?>
            <table class="table table-success table-striped-columns table-hover table-bordered border-primary">
             <?php
             while($row=$data->fetch_assoc())
             { ?>
                <tr>
                    <td colspan="2"><?php 
                    echo '<img src="images/'.$row["photo"].'." style="width: 100px;height: 100px;">';
                    ?></td>
                </tr>
                <tr> <td>Name:</td><td class="text-uppercase"><?php echo $row["name"] ?></td></tr>
                <tr> <td>Email:</td><td><?php echo $row["email"] ?></td></tr>
                <tr> <td>Contract:</td><td><?php echo $row["contract"] ?></td></tr>
                <tr> <td>Password:</td><td><?php echo $row["password"] ?></td></tr>
                <tr><td colspan="2" ><a class="btn btn-dark btn-sm"  href="user_updateprofile.php?id=<?php echo $row["user_id"] ?>&name=<?php echo $row["name"] ?>&email=<?php echo $row["email"] ?>&contract=<?php echo $row["contract"] ?>&password=<?php echo $row["password"] ?>&img=<?php echo $row["photo"] ?>" >Update Profile</a></td></tr>
                <?php
                }
                ?>
            </table>           
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