<?php
include('check.php');
include('includes/header.php'); ?>
<!-- End header header -->
<!-- Left Sidebar  -->
<?php include('includes/side_navigation.php');
$admin_id = $_SESSION['id']; ?>
<!-- End Left Sidebar  -->
<!-- Page wrapper  -->
<div class="page-wrapper">
   <!-- Bread crumb -->
   <div class="row page-titles">
      <div class="col-md-5 align-self-center">
         <h3 class="text-primary">Details</h3>
      </div>
      <div class="col-md-7 align-self-center">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Details</li>
         </ol>
      </div>
   </div>
   <?php
   if (isset($_GET['id'])) {
      $select = "SELECT * FROM `result_number_setting` where `id`='" . $_GET['id'] . "' ";
      $query = mysqli_query($con, $select);
      $row = mysqli_fetch_array($query);
   }

   ?>
   <!-- End Bread crumb -->
   <!-- Container fluid  -->
   <div class="container-fluid">
      <!-- Start Page Content -->

      <div class="row">
         <div class="col-lg-2">
         </div>
         <div class="col-lg-6" style="align-items: center;">
            <div class="card" style="padding-top: 30px">
               <div class="card-body">
                  <div class="basic-form">

                     <div class="form-group">
                        <center><?php echo date('d-m-Y', strtotime($row['added_date'])); ?></center>
                     </div>
                     <div class="form-group">
                        <center>DrawTime - <?php echo $row['game_time']; ?></center>
                     </div>
                     <div class="form-group">

                        <center>Changed Time - <?php echo $row['added_time']; ?></center>
                     </div>
                     <div class="form-group">

                        <center>New Main Bazar - <?php echo $row['setted_bazar_pana']; ?></center>
                     </div>
                     <div class="form-group">

                        <center>New Kalyan pana - <?php echo $row['setted_kalyan_pana']; ?></center>
                     </div>

                     <div class="form-group">

                        <center>
                           <?php
                           if (!empty($row['batch_1'])) {
                              echo '<span>Game10 - </span>';
                              $batch_1 = explode(",", $row['batch_1']);
                              foreach ($batch_1 as $no) {
                                 if (strlen($no) > 2) {
                                    echo $no . " ";
                                 }
                              }
                           }

                           ?>
                        </center>
                     </div>
                     <div class="form-group">
                        <center>

                           <?php
                           if (!empty($row['batch_2'])) {
                              echo '<span>Game30 - </span>';
                              $batch_2 = explode(",", $row['batch_2']);
                              foreach ($batch_2 as $no_2) {
                                 if (strlen($no_2) > 2) {
                                    echo $no_2 . " ";
                                 }
                              }
                           }

                           ?>
                        </center>
                     </div>
                     <div class="form-group">
                        <center>
                           <?php
                           if (!empty($row['batch_3'])) {
                              echo '<span>Game50 - </span>';
                              $batch_3 = explode(",", $row['batch_3']);
                              foreach ($batch_3 as $no_3) {
                                 if (strlen($no_3) > 2) {
                                    echo $no_3 . " ";
                                 }
                              }
                           }

                           ?>
                        </center>
                     </div>
                  </div>

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
<script type="text/javascript">
   function onlyAlphabets(e, t) {
      return (e.charCode > 64 && e.charCode < 91) || (e.charCode > 96 && e.charCode < 123) || e.charCode == 32 || e.key === "Backspace";
   }
</script>