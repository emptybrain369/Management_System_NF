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
            <h2 class="text-primary mb-3">My Projects</h2>
            <?php
            $con = new mysqli("localhost","root","","user_nf");
            $user = $_SESSION['username'];
            $data = $con->query("SELECT tbl_project.project_id, tbl_project.projectname, tbl_project.duedate, tbl_user.name
            FROM tbl_project  
            LEFT JOIN tbl_user  
            ON tbl_project.project_id=tbl_user.user_id WHERE tbl_user.name='$user'");
            ?>
            <table class="table table-success table-striped-columns table-hover table-bordered border-primary">
            <tr>
                <td>ID</td>
                <td>Project Name</td>
                <td>Due Date</td>
                <td>User Name</td>
            </tr>
             <?php
             while($row=$data->fetch_assoc())
             { ?>
                <tr>
                    <td><?php echo $row["project_id"] ?> </td>
                    <td><?php echo $row["projectname"] ?> </td>
                    <td><?php echo $row["duedate"] ?> </td>
                    <td><?php echo $row["name"] ?> </td>
                </tr>

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