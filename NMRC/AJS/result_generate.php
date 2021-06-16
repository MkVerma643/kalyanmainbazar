<?php 
   include('check.php'); 
   
   include('includes/header.php'); 
   
   ?>
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
         <h3 class="text-primary">Declare Result</h3>
      </div>
      <div class="col-md-7 align-self-center">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Declare Result</li>
         </ol>
      </div>
   </div>
<?php 
if(isset($_POST['submit']))

{
  $game_date=$_POST['game_date'];
  $game_time=$_POST['game_selected'];
  $batch_1_result=implode(",", $_POST['batch_1']);
  $batch_2_result=implode(",", $_POST['batch_2']);
  $batch_3_result=implode(",", $_POST['batch_3']);
if(!empty($batch_1_result) and !empty($batch_2_result) and !empty($batch_3_result) )
{
 $select=mysqli_query($con,"SELECT `g_time` FROM `game_time` WHERE `game_time`='".$game_time."'");

if (mysqli_num_rows($select)>0)
{
  $time_row=mysqli_fetch_array($select);
  if($game_date==date('Y-m-d')){
  if($game_date==date('Y-m-d') && $time_row['g_time'] < date('H:i:s') ){
  $check_win=mysqli_query($con,"SELECT `id` FROM `win_card` WHERE `game_time`='".$game_time."' and `win_date`='".$game_date."' ");
  if(mysqli_num_rows($check_win)<1)
  {

  $insert_result=mysqli_query($con,"INSERT INTO `win_card`(`game_time`, `batch_1`, `batch_2`, `batch_3`, `win_date`, `added_time`, `type`,`g_time`) VALUES ('$game_time','".$batch_1_result."','".$batch_2_result."','".$batch_3_result."','".$game_date."','".$game_time."','Admin','".$time_row['g_time']."')");

  if($insert_result==true)
  {
    echo '<script> alert("Result Added successfully !!"); </script>';

  }
  else
  {
   echo '<script> alert("Somthing Went Wrong !!"); </script>';

  }

  }
  else
  {
   echo '<script> alert("Result Already Declared"); </script>';

  }
 }
 else
 {
   echo '<script> alert("You Can Not Declared Future Result !!"); </script>';

 }
 }
 else
 {
  
  $check_win=mysqli_query($con,"SELECT `id` FROM `win_card` WHERE `game_time`='".$game_time."' and `win_date`='".$game_date."' ");
  if(mysqli_num_rows($check_win)<1)
  {

  $insert_result=mysqli_query($con,"INSERT INTO `win_card`(`game_time`, `batch_1`, `batch_2`, `batch_3`, `win_date`, `added_time`, `type`,`g_time`) VALUES ('$game_time','".$batch_1_result."','".$batch_2_result."','".$batch_3_result."','".$game_date."','".$game_time."','Admin','".$time_row['g_time']."')");

  if($insert_result==true)
  {
    echo '<script> alert("Result Added successfully !!"); </script>';

  }
  else
  {
   echo '<script> alert("Somthing Went Wrong !!"); </script>';

  }

  }
  else
  {
   echo '<script> alert("Result Already Declared"); </script>';

  }
 
 }
}
else
{
  echo '<script> alert("Invalid Game Time"); </script>';
}

}
else
{
  echo '<script> alert("Empty Number Pls select number"); </script>';

}



}

?>
   <!-- End Bread crumb -->
   <!-- Container fluid  -->
   <div class="container-fluid">
      <!-- Start Page Content -->
      <div class="row" >
         <div class="col-lg-12">
            <div class="card" style="overflow: auto;min-width: 1000px;">
               <div class="card-body card-block">
                  <form  method="post" class="form-horizontal" onsubmit="return checkForm();">
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Result Date</label></div>
                        <div class="col-md-6">
                        <input type="date" name="game_date" id="game_date" class="form-control" required="" value="<?php echo date('Y-m-d') ?>" max="<?php echo date('Y-m-d') ?>">
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Select Game </label></div>
                        <div class="col-md-6">
                           <select id='game_selected' name="game_selected" class="form-control" required="">
                              <option value="">Select Result Time</option>
                              <?php 
                                 $c_time=date('H:i:s');
                                 
                                   $no=0;
                                 
                                   $gt=mysqli_query($con,"SELECT * From `game_time` ");
                                 
                                   while ($row=mysqli_fetch_array($gt)) {
                                 
                                   $no++; ?>
                              <option value='<?php echo $row['game_time'] ?>'><?php echo $row['game_time'] ?></option>
                              <? } ?>
                           </select>
                        </div>
                     </div>
                     <div id='divdata'>
                     </div>
                     <div class="form-actions form-group">
                        <center><button type="submit" class="btn btn-primary" name="submit">Submit</button></center>
                     </div>
                  </form>
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
<script type="text/javascript">
   $(document).on('change', '#game_selected',function(){
   
     $('#divdata').empty();  
     var game_time= $(this).val();
     var game_date= $('#game_date').val();
     if(game_time !='' && game_date)
     {
     $.ajax({
           url:"ajax/generate_result.php",
           type:"POST",
           data:'game_time='+game_time+'&&game_date='+game_date,
           success:function(data){
            $('#divdata').html(data);    
           }
       });
    } 
    else
    {
      alert('Please select Game Date && Game Time Both')
    }
   });
   
   

</script>