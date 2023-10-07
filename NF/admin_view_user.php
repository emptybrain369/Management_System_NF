<?php
session_start();
if (!isset($_SESSION['username'])){
  header("Location:admin_login.php");
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
        <div class="col-md-6">
            <h2 class="text-uppercase text-warning"><?php echo $_SESSION['username']?></h2>
            <nav class="navbar">
             <a href="admin_view_user.php" class="btn btn-success btn-sm text-white" >View Member</a> 
             <a href="admin_add_member.php" class="btn btn-success btn-sm text-white" >Add Member</a> 
             <a href="admin_assign_project.php" class="btn btn-success btn-sm text-white" >Assign Project</a> 
             <a href="admin_projects_status.php" class="btn btn-success btn-sm text-white" >Project Status</a> 
             <a href="user_logout.php" class="btn btn-success btn-sm text-white" >Logout</a> 
            </nav>
        </div>
        <div class="col-md-10">
            <h4 class="text-primary text-uppercase mb-3">All Member Information</h4>
            <?php
            $con = new mysqli("localhost","root","","user_nf");
            $data = $con->query("SELECT * FROM tbl_user ORDER BY 'user_id'");
            ?>
            <table class="table table-success table-striped-columns table-hover table-bordered border-primary">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Contract</td>
                <td>Password</td>
                <td>Photo</td>
                <td>Action</td>
            </tr>
             <?php
                 while($row=$data->fetch_assoc())
             { ?>
                <tr>
                    <td><?php echo $row["user_id"] ?> </td>
                    <td class="text-uppercase"><?php echo $row["name"] ?> </td>
                    <td><?php echo $row["email"] ?> </td>
                    <td><?php echo $row["contract"] ?> </td>    
                    <td><?php echo $row["password"] ?> </td>
                    <td><?php  echo '<img src="images/'.$row["photo"].'." style="width: 50px;height: 50px;">';?> </td>
                    <td><a class="btn btn-danger btn-sm" href="admin_delete.php?id=<?php echo $row["user_id"] ?>"><i class="fas fa-trash"></i></a></td>
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