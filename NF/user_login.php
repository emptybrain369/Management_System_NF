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
            <h1 class="text-primary">WELCOME TO NF</h1>
            <a href="user_login.php" class="btn btn-warning btn-sm mt-3">User Login</a>
            <a href="admin_login.php" class="btn btn-info btn-sm mt-3">Admin Login</a>
        </div>
        <div class="col-md-4 bg-success mt-5 shadow rounded">
              <form action="user_validation.php" method="POST">
               <img src="images/NF.jpg" alt="logo" style="width:15%;height:15%;border-radius:50%;margin:25px;border:2px solid blue;">
                 <h6 class="text-white">USER LOGIN</h6>
                  <div class="form-group mt-3 text-white">
                      <label for="name">Username:</label>
                      <input type="text" name="uname" id="name">
                  </div>
                  <div class="form-group mb-5 mt-3 text-white">
                      <label for="password">Password:</label>
                      <input type="text" name="upassword" id="password">
                  </div>
                  <button name="submit" class=" btn btn-secondary btn-sm mb-3 ">Login</button>
            </form>
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