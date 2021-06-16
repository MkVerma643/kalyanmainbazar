<?php 
   include('../check.php');
   if(isset($_POST['game_time']))
   { 
    $game_time=$_POST['game_time'];
    $check=mysqli_query($con,"SELECT * FROM `result_number_setting` where `game_time`='$game_time' and `added_date`='".date('Y-m-d')."' ");
    $row=mysqli_fetch_array($check);
   
   ?>
<div class="row form-group">
      <div class="col col-md-3"><label for="ignore_number" class=" form-control-label">Number To Ignore</label></div>
      <div class="col-md-6">
        <textarea  cols="60" rows="4" name="ignore_number" id="ignore_number" ><?php  echo $row['ignore_number']; ?></textarea>
      </div>
   </div>
<div class="row form-group">
   <div class="col col-md-2"><label for="select" class=" form-control-label">Game10</label></div>
   <?php 
      $batch_1=explode(",",$row['batch_1']);
      
         for ($i=0; $i <10 ; $i++) { 
          if(empty($batch_1[$i]))
          {
              $batch_1_value="1".$i;
          }
          else
          {
             $batch_1_value=$batch_1[$i];
          }
      ?>
   <div class="col col-md-1"><input type="text" id="batch_1<?php echo $i ?>" name=batch_1[] value="<?php echo $batch_1_value; ?>" class="is-valid form-control-success form-control number-input" style="font-size: 12px;" maxlength="4" / ></div>
   <script type="text/javascript">
      $('#batch_1<?php echo $i ?>').keydown(function(e)
        {
      
         var value =  $('#batch_1<?php echo $i ?>').val().length;
          if ( e.keyCode == 8 && value < 3)
             e.preventDefault();
       });
   </script>
   <?php 
      } ?>
</div>
<div class="row form-group">
   <div class="col col-md-2"><label for="select" class=" form-control-label">Game30</label></div>
   <?php 
      $batch_2=explode(",",$row['batch_2']);
         for ($i=0; $i <10 ; $i++) { 
           if(empty($batch_2[$i]))
          {
              $batch_2_value="3".$i;
          }
          else
          {
             $batch_2_value=$batch_2[$i];
          }
          ?>
   <div class="col col-md-1"><input type="text" id="batch_2<?php echo $i ?>" name=batch_2[]  value="<?php echo $batch_2_value; ?>"  class="is-valid form-control-success form-control number-input" style="font-size: 12px;" maxlength="4"></div>
   <script type="text/javascript">
      $('#batch_2<?php echo $i ?>').keydown(function(e)
        {
      
         var value2 =  $('#batch_2<?php echo $i ?>').val().length;
          if ( e.keyCode == 8 && value2 < 3)
             e.preventDefault();
       });
   </script>
   <?php } ?>
</div>
<div class="row form-group">
   <div class="col col-md-2"><label for="select" class=" form-control-label">Game50</label></div>
   <?php 
      $batch_3=explode(",",$row['batch_3']);
         for ($i=0; $i <10 ; $i++) {
          if(empty($batch_3[$i]))
          {
              $batch_3_value="5".$i;
          }
          else
          {
             $batch_3_value=$batch_3[$i];
          }
           ?>
   <div class="col col-md-1"><input type="text" id="batch_3<?php echo $i ?>" name=batch_3[] value="<?php echo $batch_3_value; ?>"  class="is-valid form-control-success form-control number-input" style="font-size: 12px;" maxlength="4" ></div>
   <script type="text/javascript">
      $('#batch_3<?php echo $i ?>').keydown(function(e)
        {
      
         var value3 =  $('#batch_3<?php echo $i ?>').val().length;
          if ( e.keyCode == 8 && value3 < 3)
             e.preventDefault();
       });
     
   </script>
   <?php } ?>
</div>
<script type="text/javascript">
    $(".number-input").keypress(function (e) {
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

</script>
<? 
   }
   ?>