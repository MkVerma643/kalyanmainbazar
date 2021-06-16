<?php 
   include('check.php'); 
   include('includes/header.php'); 
   $admin_id=$_SESSION['id'];
   date_default_timezone_set("Asia/kolkata");
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
         <h3 class="text-primary">Dashboard </h3>
      </div>
      <div class="col-md-7 align-self-center">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
         </ol>
      </div>
   </div>
  
   <!-- End Bread crumb -->
   <!-- Container fluid  -->
   <div class="container-fluid">
      <!-- Start Page Content -->
      <div class="col-lg-12">
         <div class="row">
                   
            <div class="col-md-3">
               <a  href="game_setting.php">
                  <div class="card p-20">
                     <div class="media">
                        <div class="media-left meida media-middle">
                           <span><i class="fa fa-cog" aria-hidden="true" style="font-size: 300%"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                           <p class="m-b-0">Result Setting</p>
                        </div>
                     </div>
                  </div>
               </a>
            </div>
            <div class="col-md-3">
               <a href="result_number.php">
                  <div class="card p-20">
                     <div class="media">
                        <div class="media-left meida media-middle">
                           <span><i class="fa fa-cog" aria-hidden="true" style="font-size: 300%"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                           <p class="m-b-0">Result Number Setting</p>
                        </div>
                     </div>
                  </div>
               </a>
            </div>
            <div class="col-md-3">
               <a href="view_number_setting.php">
                  <div class="card p-20">
                     <div class="media">
                        <div class="media-left meida media-middle">
                           <span><i class="fa fa-info-circle" aria-hidden="true" style="font-size: 300%"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                           <p class="m-b-0">Details</p>
                        </div>
                     </div>
                  </div>
               </a>
            </div>
             <div class="col-md-3">
               <a href="change_pass.php">
                  <div class="card p-20">
                     <div class="media">
                        <div class="media-left meida media-middle">
                           <span><i class="fa fa-unlock-alt" aria-hidden="true" style="font-size: 300%"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                           <p class="m-b-0">Change Password</p>
                        </div>
                     </div>
                  </div>
               </a>
            </div>
   
         </div>
         <div class="row">
                   
            <div class="col-md-3">
               <a  href="welcome_msg.php">
                  <div class="card p-20">
                     <div class="media">
                        <div class="media-left meida media-middle">
                           <span><i class="fa fa-envelope" aria-hidden="true" style="font-size: 300%"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                           <p class="m-b-0">Welcome massage</p>
                        </div>
                     </div>
                  </div>
               </a>
            </div>
   
   <div class="col-md-3">
               <a  href="result_generate.php">
                  <div class="card p-20">
                     <div class="media">
                        <div class="media-left meida media-middle">
                           <span><i class="fa fa-list-alt" aria-hidden="true" style="font-size: 300%"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                           <p class="m-b-0">Delclare Result</p>
                        </div>
                     </div>
                  </div>
               </a>
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

