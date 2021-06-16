<?php
include('AJS/includes/db.php');
date_default_timezone_set("Asia/Kolkata");   
$game_date=date('Y-m-d');
$game_time=date('h:i A');
//$game_time="01:25 PM";
//
//$in=mysqli_query($con,"INSERT INTO `test`(`test`, `create_at`) VALUES ('2','".date('h:i A')."')");

   $select=mysqli_query($con,"SELECT `game_time` FROM `game_time` WHERE `game_time`='".$game_time."'");

    if (mysqli_num_rows($select)>0)
    {
    $check_win=mysqli_query($con,"SELECT `id` FROM `win_card` WHERE `game_time`='".$game_time."' and `win_date`='".$game_date."' ");
    if(mysqli_num_rows($check_win)<1)
    {
     
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

          $batch_1_result=implode(",",$batch_1_result_arr);
          $batch_2_result=implode(",",$batch_2_result_arr);
          $batch_3_result=implode(",",$batch_3_result_arr);


     $insert_result=mysqli_query($con,"INSERT INTO `win_card`(`game_time`, `batch_1`, `batch_2`, `batch_3`, `win_date`, `added_time`, `type`,`g_time`) VALUES ('$game_time','".$batch_1_result."','".$batch_2_result."','".$batch_3_result."','".date('Y-m-d')."','".date('h:i A')."','Auto','".date('H:i:s')."')");

    }
    
   }


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



 
?>