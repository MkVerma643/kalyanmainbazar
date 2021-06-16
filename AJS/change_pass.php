<?php 
  include('check.php');
   include('includes/header.php');
     date_default_timezone_set("Asia/Kolkata"); 
?>
        <!-- End header header -->
        <!-- Left Sidebar  -->

<?php include('includes/side_navigation.php'); ?>
 
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Change Password</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
<?php 
if(isset($_POST['change_pass']))
{
  $old_pass=$_POST['old_pass'];
  $new_pass=$_POST['new_pass'];
  $check_oldpass=mysqli_query($con,"SELECT * FROM `admin` where `password`='$old_pass'");

  if(mysqli_num_rows($check_oldpass)>0)
  {
   
   $update=mysqli_query($con,"UPDATE `admin` SET `password`='$new_pass' where `password`='$old_pass'");
   
   if(mysqli_affected_rows($con)>0)
   {
     echo '<script> alert("Password Changed."); </script>';
   }
   else
   {
   echo '<script> alert("something wrong"); </script>';
   }

  }
  else
  {
     echo '<script> alert("Please Enter Right Password."); </script>';
  }
}
?>
            <div class="container-fluid">
                <!-- Start Page Content -->
             <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation" id="validation_div">
                                    <form class="form-valide"  method="post"  >
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="old_pass">Old Password<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control valid" id="old_pass" name="old_pass" required="true" aria-describedby="old_pass-error" aria-invalid="false">

                                            </div>
                                        </div>
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="new_pass">New Password<span class="text-danger">*</span> </label>
                                            <div class="col-lg-6">
                                               <input type="text" class="form-control valid" id="new_pass" name="new_pass" required="true" aria-describedby="new_pass-error" aria-invalid="false">

                                            </div>
                                        </div>
                                     
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit"  name="change_pass" id="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
         
              </div>
            <!-- End Container fluid  -->
            <!-- footer -->
          <?php include('includes/footer.php'); ?>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
