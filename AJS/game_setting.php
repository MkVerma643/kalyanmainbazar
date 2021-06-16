<?php 
  include('check.php');
   include('includes/header.php'); ?>
<!-- End header header -->
<!-- Left Sidebar  -->
<?php include('includes/side_navigation.php');
   $admin_id= $_SESSION['id']; ?>
<!-- End Left Sidebar  -->
<!-- Page wrapper  -->
<div class="page-wrapper">
   <!-- Bread crumb -->
   <div class="row page-titles">
      <div class="col-md-5 align-self-center">
         <h3 class="text-primary">Result Setting</h3>
      </div>
      <div class="col-md-7 align-self-center">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Result Setting</li>
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
   $start_time=$_POST['start_time'];
   $end_time=$_POST['end_time'];
   $interval=$_POST['interval'];
  
   
   $truncate=mysqli_query($con,"TRUNCATE TABLE game_time");

   $time_min=array();
   $time_min_sec=array();
   $starttime=strtotime($start_time);
   $endtime=strtotime($end_time);
   $add_mins=$interval*60;
   while ($starttime <= $endtime) {
     $time_min[]=date("h:i A",$starttime);
     $time_min_sec[]=date("H:i:s",$starttime);
     $starttime += $add_mins;
   }

   foreach ($time_min as $key =>$value) {
     
$a=mysqli_query($con,"INSERT INTO `game_time`(`game_time`, `g_time`,`interval`) VALUES ('".$time_min[$key]."','".$time_min_sec[$key]."','".$interval."')");
   
   }

   if($a==true)
   {
     echo '<script> alert("Game setting updated"); </script>';
      echo '<script type="text/javascript">window.location="game_setting.php"</script>';
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
      $qry=mysqli_query($con,"SELECT `g_time`,`interval` FROM `game_time` ORDER BY `game_time_id` ASC limit 1 ");
      $row=mysqli_fetch_assoc($qry);

      $qry1=mysqli_query($con,"SELECT `g_time` FROM `game_time` ORDER BY `game_time_id` DESC limit 1 ");
      $row1=mysqli_fetch_assoc($qry1);
      ?>
         </div>
         <div class="col-lg-6" style="align-items: center;">
            <div class="card" style="padding-top: 30px">
               <div class="card-body">
                  <div class="basic-form">
                     <form method="post">
                        <div class="form-group">
                           <label> Start Time</label>
                           <input type="time"   name="start_time" class="form-control" required="true" value="<?php echo $row['g_time']; ?>">
                        </div>
                        <div class="form-group">
                           <label> End Time</label>

                           <input type="time"  name="end_time" class="form-control" required="true" value="<?php echo $row1['g_time']; ?>">
                        </div>
                        <div class="form-group">
                           <label> Game Interval</label>

                           <input type="number"  name="interval" class="form-control" required="true" value="<?php echo $row['interval']; ?>">
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
<script type="text/javascript">
   function onlyAlphabets(e, t) {
         return (e.charCode > 64 && e.charCode < 91) || (e.charCode > 96 && e.charCode < 123) || e.charCode == 32 || e.key === "Backspace";  
     }
      
</script>