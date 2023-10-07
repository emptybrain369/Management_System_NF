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
        <div class="col-md-4 bg-primary mt-5 shadow rounded">
            <h6 class="text-light text-uppercase mt-3">assign project</h6>
            <form action="" method="POST">
                  <div class="form-group mt-3 text-white">
                      <label for="id">Member ID:</label>
                      <input type="number" name="mid" id="id">
                  </div>
                  <div class="form-group mt-3 text-white">
                      <label for="pname">Project Name:</label>
                      <input type="text" name="pname" id="pname">
                  </div>
                  <div class="form-group mb-5 mt-3 text-white">
                      <label for="date">Password:</label>
                      <input type="date" name="date" id="date">
                  </div>
                  <button name="submit" class=" btn btn-secondary btn-sm mb-3" onclick="successmsg()">Submit</button>
            </form>
            <?php
             $con = new mysqli("localhost","root","","user_nf");
                if (isset( $_POST['submit'])) {
                    $id=$_POST['mid'];
                    $proname=$_POST['pname'];
                    $date=$_POST['date'];
                    $data = $con->query("INSERT INTO tbl_project(project_id,projectname,duedate) values ('$id','$proname','$date')");
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