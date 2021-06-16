
<?php
   session_start();
   require_once("includes/db.php");
   
   if (isset($_POST['submit'])) {
   
       $username = mysqli_real_escape_string($con, $_POST['username']);
   
       $Password = mysqli_real_escape_string($con, $_POST['password']);
       $login="select `id` from `admin` where `username`='". $username ."' and `password`='" . $Password . "' ";
        
       $check_query = mysqli_query($con,$login);
       $check_row_count = mysqli_num_rows($check_query);
       
       if ($check_row_count == 1) {
         $data = mysqli_fetch_array($check_query);

           $_SESSION['id']= $data['id'];
           echo '<script> location="dashboard.php";</script>'; 
       } else {
   
           echo"<script>alert('Wrong username or password.')</script>";
           echo '<script> location="index.php";</script>';
   
       }
       
   }
   ?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- Favicon icon -->
     
      <title></title>
      <!-- Bootstrap Core CSS -->
      <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="css/helper.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
   
   </head>
   <body class="fix-header fix-sidebar">
     
      <!-- Preloader - style you can find in spinners.css -->
      <div class="preloader">
         <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
         </svg>
      </div>
      <!-- Main wrapper  -->
      <div id="main-wrapper">
         <div class="unix-login">
            <div class="container-fluid">
               <div class="row justify-content-center">
                  <div class="col-lg-4">
                     <div class="login-content card">
                        <div class="login-form">
                          <center><h3>Admin Login</h3></center>
                           <form method="post" style="margin-top:30px;">
                              
                              <div class="form-group">
                                 <input type="text" class="form-control" name="username" placeholder="Username">
                              </div>
                              <div class="form-group">
                                 <input type="password" class="form-control" name="password" placeholder="Password">
                              </div>
                              <button type="submit" name="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- End Wrapper -->
      <!-- All Jquery -->
      <script src="js/lib/jquery/jquery.min.js"></script>
      <!-- Bootstrap tether Core JavaScript -->
      <script src="js/lib/bootstrap/js/popper.min.js"></script>
      <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
      <!-- slimscrollbar scrollbar JavaScript -->
      <script src="js/jquery.slimscroll.js"></script>
      <!--Menu sidebar -->
      <script src="js/sidebarmenu.js"></script>
      <!--stickey kit -->
      <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
      <!--Custom JavaScript -->
      <script src="js/scripts.js"></script>
   </body>
</html>