<?php
include('../check.php');
if (isset($_POST['game_time'])) {
   $game_time = $_POST['game_time'];
   $numbers = $_POST['numbers'];
   //  $check=mysqli_query($con,"SELECT * FROM `result_number_setting` where `game_time`='$game_time' and `added_date`='".date('Y-m-d')."' ");
   $check = mysqli_query($con, "SELECT * FROM `panas` where `numbers`='$numbers' ");
   $row = mysqli_fetch_array($check);

?>
   <!-- <script>
   $(function(){
    var $select = $(".0-9");
    for (i=0;i<=9;i++){
        $select.append($('<option></option>').val(i).html(i))
    }
   });
</script> -->
   <!-- <div class="row form-group" >  
      <div style="width:100%;height:10%;margin: 0 auto;text-align: center;"><strong>Location</strong></div>
      <div style="width: 800px;margin: 0px auto;padding: 5px;">
         <div style="color: #000;width: 48%;float: left; text-align:center;">
         <label for="ignore_number" class=" form-control-label">New Kalyan</label>
         <select class="0-9"></select>
            <div class="col-md-5" style="margin:0px auto;">
               <input type="text" id="setted_kalyan_pana" name="setted_kalyan_pana" value="<?php echo "dynamic value" ?>"
               class="is-valid form-control-success form-control number-input" style="font-size: 12px;" maxlength="3" / >
            </div>
         </div>
         <div class="vl" style="border-left: 6px solid grey;"></div>
         <div style="color: #000;width: 48%;float: right;text-align:center;">
         <label for="ignore_number" class=" form-control-label">New Main Bazar</label>
         <select class="0-9"></select>
            <div class="col-md-5" style="margin:0px auto;">
               <input type="text" id="setted_bazar_pana" name="setted_bazar_pana" value="<?php echo "dynamic value" ?>"
               class="is-valid form-control-success form-control number-input" style="font-size: 12px;" maxlength="3" / >
            </div>
         </div>
      </div>
</div> -->
   <hr>
   <div class="row form-group">
      <div class="col col-md-1"><label for="select" class=" form-control-label">Single Pana's</label></div>
      <?php
      $single_pana = explode(",", $row['single_pana']);

      for ($i = 0; $i < 12; $i++) {
         if (empty($single_pana[$i])) {
            $single_pana_value = $i;
         } else {
            $single_pana_value = $single_pana[$i];
         }
      ?>
         <div class="col col-md"><input onclick="selectValue(event)" type="text" id="single_pana<?php echo $i ?>" name=single_pana[] value="<?php echo $single_pana_value; ?>" class="is-valid form-control-success form-control number-input" style="font-size: 15px;" maxlength="3" /></div>

         <script type="text/javascript">
            $('#single_pana<?php echo $i ?>').keydown(function(e) {
               var value = $('#single_pana<?php echo $i ?>').val().length;
               if (e.keyCode == 8 && value < 3)
                  e.preventDefault();
            });
         </script>
      <?php
      } ?>
   </div>
   <div class="row form-group">
      <div class="col col-md-2"><label for="select" class=" form-control-label">Double Panas</label></div>
      <?php
      $double_pana = explode(",", $row['double_pana']);
      for ($i = 0; $i < 9; $i++) {
         if (empty($double_pana[$i])) {
            $double_pana_value = $i;
         } else {
            $double_pana_value = $double_pana[$i];
         }
      ?>
         <div class="col col-md-1" style="text-align: center; margin: 0 auto;"><input type="text" onclick="selectValue(event)" id="double_pana<?php echo $i ?>" name=double_pana[] value="<?php echo $double_pana_value; ?>" class="is-valid form-control-success form-control number-input" style="font-size: 15px; text-align: center;" maxlength="3"></div>
         <script type="text/javascript">
            $('#double_pana<?php echo $i ?>').keydown(function(e) {

               var value2 = $('#double_pana<?php echo $i ?>').val().length;
               if (e.keyCode == 8 && value2 < 3)
                  e.preventDefault();
            });
         </script>
      <?php } ?>
   </div>
   <div class="row form-group">
      <div class="col col-md-2"><label for="select" class=" form-control-label">Triple Pana's</label></div>
      <?php
      $triple_pana = explode(",", $row['triple_pana']);
      for ($i = 0; $i < 1; $i++) {
         if (empty($triple_pana[$i])) {
            $triple_pana_value = $i;
         } else {
            $triple_pana_value = $triple_pana[$i];
         }
      ?>
         <div class="col col-md-1" style="text-align: center; margin-left:35%;">
            <input type="text" onclick="selectValue(event)" id="triple_pana<?php echo $i ?>" name=triple_pana[] value="<?php echo $triple_pana_value; ?>" class="is-valid form-control-success form-control number-input" style="font-size: 15px; text-align:center;" maxlength="3">
         </div>
         <script type="text/javascript">
            $('#triple_pana<?php echo $i ?>').keydown(function(e) {

               var value3 = $('#triple_pana<?php echo $i ?>').val().length;
               if (e.keyCode == 8 && value3 < 3)
                  e.preventDefault();
            });
         </script>
      <?php } ?>
   </div>
   <script type="text/javascript">
      $(".number-input").keypress(function(e) {
         //if the letter is not digit then display error and don't type anything
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            return false;
         }
      });
      document.body.addEventListener('keydown', event => {
         if (event.ctrlKey && 'cvxspwuaz'.indexOf(event.key) !== -1) {
            event.preventDefault()
         }
      });

      function selectValue(event) {

         let panaType = $("#selectedType").text();
         if (panaType === "New Kalyan") {
            $("#setted_kalyan_pana").val(event.target.value)
         }
         if (panaType === "New Main Bazar") {
            $("#setted_bazar_pana").val(event.target.value)
         }
      }
   </script>
<?php
}
?>