<?php 
include('../check.php');
if(isset($_POST['game_time']))
{ 


function num($define_number,$rand_number)
{
    global $rand_number;

    $num=rand(0,99);
    if(strlen($num)==1)
    {
      $rand_no="0".$num;
    }
    else
    {
       $rand_no=$num;
    }
   
    if(in_array($rand_no,$rand_number) or ($rand_no == $define_number) )
    {
     return num($define_number,$rand_number);
    }
    else
    {
    array_push($rand_number,$rand_no);
    return $rand_no;
    }
}


$game_time=$_POST['game_time'];
$game_date=$_POST['game_date'];

$rand_number=[];
$batch_1_result_arr=[];
$batch_2_result_arr=[];
$batch_3_result_arr=[];

 $check_num=mysqli_query($con,"SELECT * FROM `result_number_setting` WHERE `game_time`='".$game_time."' and `added_date`='".$game_date."' ");
 $row=mysqli_fetch_array($check_num);

$batch_1_old=explode(",",$row['batch_1']);
$batch_2_old=explode(",",$row['batch_2']);
$batch_3_old=explode(",",$row['batch_3']);


$ignore_number=explode(",",$row['ignore_number']);


    foreach ($ignore_number as $ignore ) {
     array_push($rand_number,$ignore);
     }


      for ($i=0; $i <10 ; $i++) { 
        // result calculation of batch one
        $b_1_d=substr($batch_1_old[$i],2); //batch one predefine data

        if(!empty($b_1_d))
        {
           array_push($rand_number,$b_1_d);
        }
       
        // result calculation of batch two
        $b_2_d=substr($batch_2_old[$i],2);  // batch two predefine data

        if(!empty($b_2_d))
        {
            array_push($rand_number,$b_2_d);
        }
       // result calculation of batch three
       $b_3_d=substr($batch_3_old[$i],2);  // batch three predefine data

       if(!empty($b_3_d))
       {
        array_push($rand_number,$b_3_d);
       }

     }



   
     for ($i=0; $i <10 ; $i++) { 
       
        // result calculation of batch one
        $b_1=$batch_1_old[$i]; 
        $b_1_n=substr($batch_1_old[$i],2); //batch one predefine data
       
        if(empty($b_1_n))
        {

          $row_1_no= num($b_1_n,$rand_number);
          $final_b_1="1".$i.$row_1_no;
          array_push($batch_1_result_arr,$final_b_1);
          
        }
        else
        {
          // $b_1_n=substr($b_1,2)
           array_push($rand_number,$b_1_n);
           array_push($batch_1_result_arr,$b_1);

        }
       
        // result calculation of batch two
        $b_2=$batch_2_old[$i]; 
        $b_2_n=substr($batch_2_old[$i],2);  // batch two predefine data

        if(empty($b_2_n))
        {
          
          $row_2_no= num($b_2_n,$rand_number);

          $final_b_2="3".$i.$row_2_no;
          array_push($batch_2_result_arr,$final_b_2);
          
        }
        else
        {
           // $b_2_n=substr($b_2, 2)
            array_push($rand_number,$b_2_n);
            array_push($batch_2_result_arr,$b_2);

        }

       // result calculation of batch three
       $b_3=$batch_3_old[$i];  
       $b_3_n=substr($batch_3_old[$i],2);  // batch three predefine data

       if(empty($b_3_n))
       {
          $row_3_no= num($b_3_n,$rand_number);

          $final_b_3="5".$i.$row_3_no;
          array_push($batch_3_result_arr,$final_b_3);
        }
        else
        {
       // $b_3_n=substr($b_3, 2)
        array_push($rand_number,$b_3_n);
        array_push($batch_3_result_arr,$b_3);

        }

     }



?>

<div class="row form-group">
    <div class="col col-md-2"><label for="select" class=" form-control-label">Game10</label></div>
    <?php 
    // $batch_1=explode(",",$row['batch_1']);

       for ($i=0; $i <10 ; $i++) { 
    ?>
    <div class="col col-md-1"><input type="text"  id="batch_1<?php echo $i ?>" name=batch_1[] value="<?php echo $batch_1_result_arr[$i]; ?>" class="is-valid form-control-success form-control number-input" maxlength="4"  style="font-size: 12px;" ></div>
       <script type="text/javascript">
      $('#batch_1<?php echo $i ?>').keydown(function(e)
        {
      
         var value =  $('#batch_1<?php echo $i ?>').val().length;
          if ( e.keyCode == 8 && value < 3)
             e.preventDefault();
       });
   </script>
    <?php } ?>
 </div>
 <div class="row form-group">
    <div class="col col-md-2"><label for="select" class=" form-control-label">Game30</label></div>
    <?php 
    // $batch_2=explode(",",$row['batch_2']);
       for ($i=0; $i <10 ; $i++) { ?>
    <div class="col col-md-1"><input type="text" id="batch_2<?php echo $i ?>" name=batch_2[]  value="<?php echo $batch_2_result_arr[$i]; ?>"  class="is-valid form-control-success form-control number-input" maxlength="4"  style="font-size: 12px;"></div>
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
    // $batch_3=explode(",",$row['batch_3']);
       for ($i=0; $i <10 ; $i++) { ?>
    <div class="col col-md-1"><input type="text" id="batch_3<?php echo $i ?>"  name=batch_3[] value="<?php echo $batch_3_result_arr[$i]; ?>"  class="is-valid form-control-success form-control number-input" maxlength="4"  style="font-size: 12px;"></div>
     <script type="text/javascript">
      $('#batch_3<?php echo $i ?>').keydown(function(e)
        {

         var value3 =  $('#batch_3<?php echo $i ?>').val().length;
          if ( e.keyCode == 8 && value3 < 3 )
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