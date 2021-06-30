<?php
include('./AJS/includes/db.php');

date_default_timezone_set("Asia/Kolkata");
$game_time = date('h:i A');
$game_date = date("Y-m-d");

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
            
         } 
      else{

         $random_0_to_9 = rand(0, 9);
         $random_0_to_91 = rand(0, 9);

         $winning_kalyan_pana = fetchPanaRandomly($random_0_to_9, $con);
         $winning_bazar_pana = fetchPanaRandomly($random_0_to_91, $con);

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
            . date('Y-m-d') . "','"
            . date('h:i A') . "',
           'Auto','"
            . date('H:i:s') . "')");
      }

   }

}


function fetchPanaRandomly($id, $con)
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