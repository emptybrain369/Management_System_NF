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
        <div class="col-md-6 bg-primary mt-3 shadow rounded">
            <h5 class="text-warning mb-3 mt-3 text-uppercase"> Add New Member</h5>
            <form name="form1" action= "" method="POST" onsubmit="return check()" enctype="multipart/form-data">
                  <div class="form-group mt-3 text-white">
                      <label for="id">User ID:</label>
                      <input type="number" name="uid" id="id">
                  </div>
                  <div class="form-group mt-3 text-white">
                      <label for="name">Username:</label>
                      <input type="text" name="uname" id="name">
                  </div>
                  <div class="form-group mt-3 text-white">
                      <label for="email">User Email:</label>
                      <input type="email" name="uemail" id="email">
                  </div>
                  <div class="form-group mt-3 text-white">
                      <label for="contract">Contract:</label>
                      <input type="number" name="ucontract" id="contract">
                  </div>
                  <div class="form-group  mt-3 text-white">
                      <label for="password">Password:</label>
                      <input  type="password" name="upassword" id="password">
                  </div>
                  <div class="form-group mt-3 mb-3 text-white">
                      <label for="photo" class="text-uppercase" > Upload Your Photo:</label></br>
                      <input type="file" class="mt-3" name="uphoto" id="photo">
                  </div>
                  <button name="submit" class=" btn btn-secondary btn-sm mb-3">Add Member</button>
            </form>   
            <script>
                function check(){
                var id = document.form1.uid.value;
                var name = document.form1.uname.value;
                var email = document.form1.uemail.value;
                var contract = document.form1.ucontract.value;
                var password = document.form1.upassword.value;
                var photo = document.form1.uphoto.value;

                if(id==""){

                    alert("ID can not be empty");
                    return false;
                }
                if(name==""){   
                    alert("Name can not be empty");
                    return false;
                }
                if(email==""){
                    alert("Email can not be empty");
                    return false;
                }
                if(contract==""){
                    alert("Contact can not be empty");
                    return false;
                }
                if(password==""){
                    alert("Password can not be empty");
                    return false;
                }
                if(photo==""){
                    alert("Photo can not be empty");
                    return false;                    
                }
        }
    </script>    
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

<?php
$con = new mysqli("localhost","root","","user_nf");
if (isset( $_POST['submit'])) {
    $id=$_POST['uid'];
    $name=$_POST['uname'];
    $email=$_POST['uemail'];
    $contract=$_POST['ucontract'];
    $password=$_POST['upassword'];
    $photo=$_FILES['uphoto']['name'];
    $photocopy =$_FILES['uphoto']['tmp_name'];
    move_uploaded_file($photocopy,"images/$photo");
    $data = $con->query("INSERT INTO tbl_user(user_id,name,email,contract,password,photo) VALUES ('$id','$name','$email','$contract','$password','$photo')");
}
?>