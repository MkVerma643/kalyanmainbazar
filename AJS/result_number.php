<?php
include('check.php');
include('includes/header.php');
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
   if (isset($_POST['submit'])) {
      $game_time = $_POST['game_selected'];
      $setted_kalyan_pana = implode(",", $_POST['setted_kalyan_pana']);
      $setted_bazar_pana = implode(",", $_POST['setted_bazar_pana']);

      $check=mysqli_query($con,"SELECT * FROM `result_number_setting` where `game_time`='$game_time' and `added_date`='".date('Y-m-d')."' ");
      if (mysqli_num_rows($check) < 1) {
         $insert = mysqli_query($con, "INSERT INTO `result_number_setting`(`game_time`, `setted_kalyan_pana`, `setted_bazar_pana`, `added_date`, `added_time`) 
                        VALUES ('" . $game_time . "','" . $setted_kalyan_pana . "','" . $setted_bazar_pana . "','" . date('Y-m-d') . "','" . date('h:i:s A') . "')");
      } 
   }
   ?>
   <!-- End Bread crumb -->
   <!-- Container fluid  -->
   <div class="container-fluid">
      <!-- Start Page Content -->
      <div class="row">
         <div class="col-lg-12">
            <div class="card" style="overflow: auto;min-width: 1000px;">
               <div class="card-body card-block">
                  <form method="post" class="form-horizontal">
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
                              <?php } ?>
                           </select>
                        </div>
                     </div>

                     <script>
                        $(function() {
                           var $select = $(".0-9");
                           for (i = 0; i <= 9; i++) {
                              $select.append($('<option></option>').val(i).html(i))
                              // console.log($select)
                           }
                        });
                     </script>

                     <div class="row form-group">
                        <div style="width:100%;height:10%;margin: 0 auto;text-align: center;"><strong>Location</strong></div>
                        <div style="width: 800px;margin: 0px auto;padding: 5px;">
                           <div style="color: #000;width: 48%;float: left; text-align:center;">
                              <label for="ignore_number" class=" form-control-label">New Kalyan</label><br>
                              <select class="0-9"  onchange="getPanaInfo(event,'New Kalyan')" name="kalyan_select"
                                style="font-size: 20px; width:220px;"  id="kalyan_select">
                                <option value="">Select</option></select>
                              <div class="col-md-5" style="margin:0px auto;">
                                 <input type="text" id="setted_kalyan_pana" autocomplete="on" readonly name="setted_kalyan_pana" class="is-valid form-control-success form-control number-input" style="font-size: 26px; text-align:center" maxlength="3" />
                              </div>
                           </div>
                           <div class="vl" style="border-left: 6px solid grey;"></div>
                           <div style="color: #000;width: 48%;float: right;text-align:center;">
                              <label for="ignore_number" class=" form-control-label">New Main Bazar</label><br>
                              <select class="0-9" onchange="getPanaInfo(event,'New Main Bazar')" name="bazar_select" 
                              style="font-size: 20px;width:220px;" id="bazar_select">
                              <option value="">Select</option></select>
                              <div class="col-md-5" style="margin:0px auto;">
                                 <input type="text" id="setted_bazar_pana" autocomplete="on" readonly name="setted_bazar_pana" class="is-valid form-control-success form-control number-input" style="font-size: 26px; text-align:center" maxlength="3" />
                              </div>
                           </div>
                        </div>
                     </div>

                     <label class="text-center" id='selectedType'>Select Number</label>

                     <div id='divdata'>
                     </div>

                     <div class="form-actions form-group" style="text-align: center; margin-left:12%;">
                        <center><button type="submit" class="btn btn-primary " style="width: 300px;" name="submit">Submit</button></center>
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
   function getPanaInfo(event, type) {
      let selectedType = $("#selectedType").html(type);

      $('#divdata').empty();
      var game_time = $('#game_selected').val();
      var numbers = event.target.value;
      console.log(game_time, numbers);
      // 'game_time=' + game_time + 'numbers=' + parseInt(numbers)
      $.ajax({
         url: "ajax/number_result.php",
         type: "POST",
         data: {
            "game_time": game_time,
            "numbers": numbers
         },
         success: function(data) {
            $('#divdata').html(data);
         }
      });
   }

   $("form").submit(function(a) {
      a.preventDefault();
      var values = {};
      $.each($('form').serializeArray(), function(i, field) {
         values[field.name] = field.value;
      });

      $.ajax({
         url: "ajax/store_result.php",
         type: "POST",
         data: values,
         dataType: 'JSON',
         success: (result) => {
            alert(result.message)
         },
         error: function(result) {
            alert(result.message)
            location.reload();
         }
      });
   });

   //$(document).ready(function() {



      // var game_time = $('#game_selected').val();
      // var numbers = $('#numbers').val();
      // if (game_time != '' && numbers != '') {
      //    $.ajax({
      //       url: "ajax/number_result.php",
      //       type: "POST",
      //       data: 'game_time=' + game_time,
      //       'numbers=': numbers,
      //       success: function(data) {
      //          $('#divdata').html(data);
      //       }
      //    });
      // }

   //});

   // $(document).on('change', '#game_selected', function() {
   //    $('#divdata').empty();
   //    var game_time = $(this).val();
   //    if (game_time != '') {
   //       $.ajax({
   //          url: "ajax/number_result.php",
   //          type: "POST",
   //          data: 'game_time=' + game_time,
   //          'numbers=': numbers,
   //          success: function(data) {
   //             $('#divdata').html(data);
   //          }
   //       });
   //    }
   // });



   // var value = $('#ignore_number').val();
   // var ignore_number = value.split(",");
   //  if(ignore_number.length < 31){


   // game_time = $("#game_selected").val();
   // today_date = '';
   // var setted_kalyan_pana = $("input[name='setted_kalyan_pana[]']").map(function() {
   //    var setted_kalyan_pana = $(this).val();
   //    var setted_kalyan_pana_count = $(this).val().length;
   //    if (setted_kalyan_pana_count > 2) {
   //       return setted_kalyan_pana;
   //    }
   // }).get();

   // var setted_bazar_pana = $("input[name='setted_bazar_pana[]']").map(function() {
   //    var setted_bazar_pana = $(this).val();
   //    var setted_bazar_pana_count = $(this).val().length;
   //    if (setted_bazar_pana_count > 2) {
   //       return setted_bazar_pana;
   //    }
   // }).get();

   // // var batch_3 = $("input[name='batch_3[]']").map(function()
   // // {
   // // var batch_3= $(this).val();
   // // var batch3_count= $(this).val().length;

   // // if(batch3_count>2)
   // // {
   // //   return batch_3;
   // // }
   // // }).get();

   // var newLine = "\r\n"
   // var msg = "Do you really want to change ??"
   // msg += newLine;
   // msg += 'Date ' + today_date;
   // msg += newLine;
   // msg += 'DrawTime ' + game_time;
   // msg += newLine;
   // msg += setted_kalyan_pana + ',' + setted_bazar_pana;


   // // var txtlen = batch_3.length;
   // // alert(txtlen);

   // // return confirm('Do you really want to change DrawTime '+game_time+' of date '+today_date+' to '+setted_kalyan_pana+','+setted_bazar_pana+','+batch_3);
   // return confirm(msg);
   // // }
   // // else
   // // {
   // //   alert('Ignore Number is greater than 30 ');
   // //   return false;
   // // }
</script>