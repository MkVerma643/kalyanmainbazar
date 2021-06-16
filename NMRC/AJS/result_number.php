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
         <h3 class="text-primary">Result Setting</h3>
      </div>
      <div class="col-md-7 align-self-center">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Result Setting</li>
         </ol>
      </div>
   </div>
<?php 
if(isset($_POST['submit']))
{
      $game_time=$_POST['game_selected'];
      $ignore_number=$_POST['ignore_number'];
      $batch_1=implode(",", $_POST['batch_1']);
      $batch_2=implode(",", $_POST['batch_2']);
      $batch_3=implode(",", $_POST['batch_3']);

  $check=mysqli_query($con,"SELECT * FROM `result_number_setting` where `game_time`='$game_time' and `added_date`='".date('Y-m-d')."' ");
  if(mysqli_num_rows($check)<1)
  {
    
   $insert=mysqli_query($con,"INSERT INTO `result_number_setting`(`game_time`, `batch_1`, `batch_2`, `batch_3`,`ignore_number`, `added_date`, `added_time`) 
                        VALUES ('".$game_time."','".$batch_1."','".$batch_2."','".$batch_3."','".$ignore_number."','".date('Y-m-d')."','".date('h:i:s A')."')");
  }
  else
  {
  
   if(!empty($ignore_number))
   {
   $insert=mysqli_query($con,"UPDATE `result_number_setting` SET `batch_1`='".$batch_1."',`batch_2`='".$batch_2."',`batch_3`='".$batch_3."',`ignore_number`='".$ignore_number."',`added_date`='".date('Y-m-d')."', `added_time`='".date('h:i:s A')."' WHERE `game_time`='$game_time' and `added_date`='".date('Y-m-d')."' ");
   }
   else
   {
   $insert=mysqli_query($con,"UPDATE `result_number_setting` SET `batch_1`='".$batch_1."',`batch_2`='".$batch_2."',`batch_3`='".$batch_3."',
                         `added_date`='".date('Y-m-d')."', `added_time`='".date('h:i:s A')."' WHERE `game_time`='$game_time' and `added_date`='".date('Y-m-d')."' ");
   }
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
                        <div class="col col-md-3"><label for="ignore_number" class=" form-control-label">Date</label></div>
                        <div class="col-md-6">
                          <span><?php echo  date('d-m-Y'); ?></span>
                        </div>
                     </div>
                      <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Select Game</label></div>
                        <div class="col-md-6">
                           <select id='game_selected' name="game_selected" class="form-control" required="">
                              <?php 
                                 $c_time=date('H:i:s');
                                   $no=0;
                                   $gt=mysqli_query($con,"SELECT * From `game_time` where `g_time`> '$c_time'");
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
  $( document ).ready(function() {
    
    $('#divdata').empty();  
     var game_time= $('#game_selected').val();
     if(game_time !='')
     {
     $.ajax({
           url:"ajax/number_result.php",
           type:"POST",
           data:'game_time='+game_time,
           success:function(data){
            $('#divdata').html(data);    
           }
       });
    }
   
});

   $(document).on('change', '#game_selected',function(){
      $('#divdata').empty();  
     var game_time= $(this).val();
     if(game_time !='')
     {
     $.ajax({
           url:"ajax/number_result.php",
           type:"POST",
           data:'game_time='+game_time,
           success:function(data){
            $('#divdata').html(data);    
           }
       });
    }
   
   });
   
   
function checkForm()
{
var value = $('#ignore_number').val();
var ignore_number = value.split(",");
 if(ignore_number.length < 31){
       
    
game_time = $("#game_selected").val();
today_date='<?php echo date('Y-m-d'); ?>';
var batch_1 = $("input[name='batch_1[]']").map(function()
{
var batch_1= $(this).val();
var batch1_count= $(this).val().length;
if(batch1_count >2)
{
  return batch_1;
}
}).get();

var batch_2 = $("input[name='batch_2[]']").map(function()
{
var batch_2= $(this).val();
var batch2_count= $(this).val().length;
if(batch2_count>2)
{
  return batch_2;
}
}).get();

var batch_3 = $("input[name='batch_3[]']").map(function()
{
var batch_3= $(this).val();
var batch3_count= $(this).val().length;

if(batch3_count>2)
{
  return batch_3;
}
}).get();

var newLine = "\r\n"
var msg = "Do you really want to change ??"
msg += newLine;
msg += 'Date '+today_date;
msg += newLine;
msg += 'DrawTime '+game_time;
msg += newLine;
msg += batch_1+','+batch_2+','+batch_3;


// var txtlen = batch_3.length;
// alert(txtlen);

// return confirm('Do you really want to change DrawTime '+game_time+' of date '+today_date+' to '+batch_1+','+batch_2+','+batch_3);
return confirm(msg);
}
else
{
  alert('Ignore Number is greater than 30 ');
  return false;
}
}

</script>