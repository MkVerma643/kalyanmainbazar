<?php 
   include('check.php');
   include('includes/header.php'); ?>
<!-- End header header -->
<!-- Left Sidebar  -->
<?php include('includes/side_navigation.php');
   $admin_i= $_SESSION['id']; ?>
<!-- End Left Sidebar  -->
<!-- Page wrapper  -->
<div class="page-wrapper">
   <!-- Bread crumb -->
   <div class="row page-titles">
      <div class="col-md-5 align-self-center">
         <h3 class="text-primary">Game Setting</h3>
      </div>
      <div class="col-md-7 align-self-center">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Game Setting</li>
         </ol>
      </div>
   </div>
   <!-- End Bread crumb -->
   <!-- Container fluid  -->
   <div class="container-fluid">
      <!-- Start Page Content -->
<?php 
if(isset($_POST['submit']))
{
   $welcome_msg=$_POST['welcome_msg'];

   $truncate=mysqli_query($con,"TRUNCATE TABLE welcome_msg");

   $a=mysqli_query($con,"INSERT INTO `welcome_msg`(`msg`) VALUES ('".$welcome_msg."')");
   
   if($a==true)
   {
     echo '<script> alert("Welcome Message updated"); </script>';
      echo '<script type="text/javascript">window.location="welcome_msg.php"</script>';
   }
   else
   {
    echo '<script> alert("Something went wrong "); </script>';
      echo '<script type="text/javascript">window.location="game_setting.php"</script>';  
   }
}


?>
      <div class="row" >
      <div class="col-lg-2">
          <?php 
      $qry=mysqli_query($con,"SELECT `msg` FROM `welcome_msg` ");
      $row=mysqli_fetch_assoc($qry);
      ?>
         </div>
         <div class="col-lg-6" style="align-items: center;">
            <div class="card" style="padding-top: 30px">
               <div class="card-body">
                  <div class="basic-form">
                     <form method="post">
                       
                        <div class="form-group">
                           <label> Welcome Message</label>

                           <textarea rows="7" cols="52" name="welcome_msg" id="textarea-input" class="form-control" required="true" style="height: 20%;"><?php echo $row['msg'] ?></textarea>
                           
                        </div>
                        
                        <button name="submit" id="submit" class="btn hideb btn-primary btn-block" bgcolor="blue">submit</button>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-2"></div>
   </div>
   <!-- End Container fluid  -->
   <!-- footer -->
   <?php include('includes/footer.php'); ?>
   <!-- End footer -->
</div>
<!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->
