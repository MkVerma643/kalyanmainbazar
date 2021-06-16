<?php
include('db.php');
date_default_timezone_set("Asia/Kolkata");
// $game_date = date('Y-m-d');
// $game_time = "01:15 PM";
$game_time = date('h:i A');
$game_date = date("Y-m-d");
//
//$in=mysqli_query($con,"INSERT INTO `test`(`test`, `create_at`) VALUES ('2','".date('h:i A')."')");

$select = mysqli_query($con, "SELECT `game_time` FROM `game_time` WHERE `game_time`='" . $game_time . "'");

if (mysqli_num_rows($select) > 0) {
   $check_win = mysqli_query($con, "SELECT `id` FROM `win_card` WHERE `game_time`='" . $game_time . "' and `win_date`='" . $game_date . "' ");
   if (mysqli_num_rows($check_win) < 1) {
      $rand_number = [];


      $check_num = mysqli_query($con, "SELECT * FROM 
      `result_number_setting` WHERE 
      `game_time`='" . $game_time . "' and 
      `added_date`='" . $game_date . "'");
      if (mysqli_num_rows($check_num) > 0) {
         $row = mysqli_fetch_assoc($check_num);
         $insert_result = mysqli_query($con, "INSERT INTO `win_card`(
         `game_time`, 
         `winning_kalyan_pana`, 
         `winning_bazar_pana`, 
         `win_date`, 
         `added_time`, 
         `type`,
         `g_time`)
       VALUES 
       ('$game_time','"
            . $row['setted_kalyan_pana'] . "','"
            . $row['setted_bazar_pana'] . "','"
            . $row['added_date'] . "','"
            . date('h:i A') . "',
         'Auto','"
            . date('H:i:s') . "')");
      } else {

         $random_0_to_9 = rand(0, 9);
         $random_0_to_91 = rand(0, 9);

         $winning_kalyan_pana = fetechPanaRandomly($random_0_to_9, $con);
         $winning_bazar_pana = fetechPanaRandomly($random_0_to_91, $con);

         $insert_result = mysqli_query($con, "INSERT INTO `win_card`(
         `game_time`, 
         `winning_kalyan_pana`, 
         `winning_bazar_pana`, 
         `win_date`, 
         `added_time`, 
         `type`,
         `g_time`)
       VALUES 
       ('$game_time','"
            . $winning_kalyan_pana . "','"
            . $winning_bazar_pana . "','"
            . date('Y-d-m') . "','"
            . date('h:i A') . "',
           'Auto','"
            . date('H:i:s') . "')");
      }
   }
}

function fetechPanaRandomly($id, $con)
{
   $ran = array("single_pana", "double_pana", "triple_pana");
   $k = array_rand($ran);
   $v = $ran[$k];
   $check_num = mysqli_query($con, "SELECT * FROM 
      `panas` WHERE 
      `numbers`='" . $id . "'");
   $row = mysqli_fetch_assoc($check_num);
   $newArray = explode(",", $row[$v]);
   $newRanVal = array_rand($newArray);
   $nv = $newArray[$newRanVal];
   return $nv . '-' . $id;
}


function num($define_number, $rand_number)
{
   global $rand_number;

   $rand_no = rand(10, 99);

   if (in_array($rand_no, $rand_number) or ($rand_no == $define_number)) {
      return num($define_number, $rand_number);
   } else {
      array_push($rand_number, $rand_no);
      return $rand_no;
   }
}


// old code

// function
// paddingAndSize
// 0 -9 math values




// $batch_1_old = explode(",", $row['batch_1']);
// $batch_2_old = explode(",", $row['batch_2']);
// $batch_3_old = explode(",", $row['batch_3']);

// $ignore_number = explode(",", $row['ignore_number']);

// foreach ($ignore_number as $ignore) {
//    array_push($rand_number, $ignore);
// }

// echo var_dump($rand_number);
// return 0;


      // for ($i = 0; $i < 10; $i++) {
      //    // result calculation of batch one
      //    $b_1_d = substr($batch_1_old[$i], 2); //batch one predefine data

      //    if (!empty($b_1_d)) {
      //       array_push($rand_number, $b_1_d);
      //    }

      //    // result calculation of batch two
      //    $b_2_d = substr($batch_2_old[$i], 2);  // batch two predefine data

      //    if (!empty($b_2_d)) {
      //       array_push($rand_number, $b_2_d);
      //    }
      //    // result calculation of batch three
      //    $b_3_d = substr($batch_3_old[$i], 2);  // batch three predefine data

      //    if (!empty($b_3_d)) {
      //       array_push($rand_number, $b_3_d);
      //    }
      // }




      // for ($i = 0; $i < 10; $i++) {

      //    // result calculation of batch one
      //    $b_1 = $batch_1_old[$i];
      //    $b_1_n = substr($batch_1_old[$i], 2); //batch one predefine data

      //    if (empty($b_1_n)) {

      //       $row_1_no = num($b_1_n, $rand_number);
      //       $final_b_1 = "1" . $i . $row_1_no;
      //       array_push($batch_1_result_arr, $final_b_1);
      //    } else {
      //       // $b_1_n=substr($b_1,2)
      //       array_push($rand_number, $b_1_n);
      //       array_push($batch_1_result_arr, $b_1);
      //    }

      //    // result calculation of batch two
      //    $b_2 = $batch_2_old[$i];
      //    $b_2_n = substr($batch_2_old[$i], 2);  // batch two predefine data

      //    if (empty($b_2_n)) {

      //       $row_2_no = num($b_2_n, $rand_number);

      //       $final_b_2 = "3" . $i . $row_2_no;
      //       array_push($batch_2_result_arr, $final_b_2);
      //    } else {
      //       // $b_2_n=substr($b_2, 2)
      //       array_push($rand_number, $b_2_n);
      //       array_push($batch_2_result_arr, $b_2);
      //    }

      //    // result calculation of batch three
      //    $b_3 = $batch_3_old[$i];
      //    $b_3_n = substr($batch_3_old[$i], 2);  // batch three predefine data

      //    if (empty($b_3_n)) {
      //       $row_3_no = num($b_3_n, $rand_number);

      //       $final_b_3 = "5" . $i . $row_3_no;
      //       array_push($batch_3_result_arr, $final_b_3);
      //    } else {
      //       // $b_3_n=substr($b_3, 2)
      //       array_push($rand_number, $b_3_n);
      //       array_push($batch_3_result_arr, $b_3);
      //    }
      // }

      // $batch_1_result = implode(",", $batch_1_result_arr);
      // $batch_2_result = implode(",", $batch_2_result_arr);
      // $batch_3_result = implode(",", $batch_3_result_arr);
