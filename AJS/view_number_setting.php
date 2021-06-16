<?php
include('check.php');
include('includes/header.php');
date_default_timezone_set("Asia/Kolkata");

?>
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
         <h3 class="text-primary">Details </h3>
      </div>
      <div class="col-md-7 align-self-center">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Details </li>
         </ol>
      </div>
   </div>
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
   <!-- End Bread crumb -->
   <!-- Container fluid  -->
   <div class="container-fluid">
      <!-- Start Page Content -->
      <div class="card">

         <div class="card-body">
            <form method="GET">
               <div class="row">
                  <div class="col-md-3">
                     <div class="form-group">
                        <input type="date" class="form-control" name="game_date" value="<?php if (!empty($_GET['game_date'])) {
                                                                                             echo $_GET['game_date'];
                                                                                          } else {
                                                                                             echo date('Y-m-d');
                                                                                          } ?>">
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <select id='game_selected' name="game_selected" class="form-control">
                           <?php
                           $c_time = date('H:i:s');

                           $no = 0;

                           $gt = mysqli_query($con, "SELECT * From `game_time` ");

                           while ($row = mysqli_fetch_array($gt)) {

                              $no++; ?>
                              <option value='<?php echo $row['game_time'] ?>'><?php echo $row['game_time'] ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <button type="submit" id="search" name="search" class="btn btn-primary">Search</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <?php
      $no = 0;
      if (isset($_GET['search'])) {
         $conditions = [];

         if (!empty($_GET['game_date'])) {
            $conditions[] = "added_date ='" . $_GET['game_date'] . "'";
         }
         if (!empty($_GET['game_selected'])) {
            $conditions[] = "game_time ='" . $_GET['game_selected'] . "'";
         }


         $select = "SELECT * FROM `result_number_setting` ";
         // a smart code to add all conditions, if any
         if ($conditions) {
            $select .= " WHERE  " . implode(" AND ", $conditions);
         } else {
            $select = "SELECT * FROM `result_number_setting` where `added_date`='" . date('Y-m-d') . "' ";
         }

         $query = mysqli_query($con, $select);
      } else {
         $no = 0;
         $select = "SELECT * FROM `result_number_setting` where `added_date`='" . date('Y-m-d') . "' ";
         $query = mysqli_query($con, $select);
      }
      ?>
      <!-- Search End -->
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-title">
               </div>
               <div class="card-body">
                  <div class="table-responsive m-t-40">
                     <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                           <tr>
                              <th style="text-align: center;">No.</th>
                              <th style="text-align: center;">Draw Date</th>
                              <th style="text-align: center;">Draw Time</th>
                              <th style="text-align: center;">Changed Time</th>
                              <th style="text-align: center;">Details</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php

                           while ($row = mysqli_fetch_array($query)) {
                              $no++;

                           ?>
                              <tr>
                                 <td style="text-align: center;"> <?php echo $no; ?></td>
                                 <td style="text-align: center;"><?php echo  date('d-m-Y', strtotime($row['added_date'])); ?></td>
                                 <td style="text-align: center;"><?php echo $row['game_time']; ?></td>
                                 <td style="text-align: center;"><?php echo date('h:i:s-A', strtotime($row['added_time'])); ?></td>
                                 <td style="text-align: center;">
                                    <a href="detail_number.php?id=<?php echo $row['id'] ?>">Click To View</a>
                                 </td>
                              </tr>
                           <?php } ?>
                        </tbody>
                     </table>
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
   <script src="js/lib/datatables/datatables.min.js"></script>
   <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
   <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
   <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
   <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
   <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
   <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
   <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
   <script src="js/lib/datatables/datatables-init.js"></script>