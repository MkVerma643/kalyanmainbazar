<?php
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    date_default_timezone_set("Asia/Kolkata");
    $game_date = $_POST['game_date'];
    $added_time = date('h:i A');
    $game_time = $_POST['game_selected'];
    $setted_kalyan_pana = $_POST['setted_kalyan_pana'];
    $setted_bazar_pana = $_POST['setted_bazar_pana'];
    $bazar_select = $_POST['bazar_select'];
    $kalyan_select = $_POST['kalyan_select'];

    $select = mysqli_query($con, "SELECT `g_time` FROM `game_time` WHERE `game_time`='" . $game_time . "'");
    if (mysqli_num_rows($select) > 0) {
        if ($game_date == date('Y-m-d')) {
            $time_row = mysqli_fetch_array($select);
            if ($game_date == date('Y-m-d') && date('H:i:s') > $time_row['g_time'] ) {
                $check_win = mysqli_query($con, "SELECT `id` FROM `win_card` WHERE `game_time`='" . $game_time . "' and `win_date`='" . $game_date . "' ");
                if (mysqli_num_rows($check_win) < 1) {

                $insert_result = mysqli_query($con, "INSERT INTO `win_card`
                (`game_time`, 
                `winning_kalyan_pana`, 
                `winning_bazar_pana`, 
                `win_date`,
                `added_time`,
                `g_time`) 
                VALUES ('$game_time','" .
                    $setted_kalyan_pana . "-" . $kalyan_select . "','"
                    . $setted_bazar_pana . "-" . $bazar_select . "','"
                    . $game_date . "','"
                    . date('Y-m-d') . "','"
                    . date('H:i:s')
                    . "')");

                    if ($insert_result  === TRUE) {
                        $data = "New Result Declared successfully";
                        echo  json_encode(
                            array("message" => $data, "success" => true)
                        );
                    } 
                }
                else {
                        $data = "Result Already Declared";
                        echo  json_encode(
                            array("message" => $data, "success" => true)
                        );
                    }
                }
                else{
                    $data = "You Can Not Declared Future Result !!";
                        echo  json_encode(
                            array("message" => $data, "success" => true)
                    ); 
                }
            }
            else {
                $check_win = mysqli_query($con, "SELECT `id` FROM `win_card` WHERE `game_time`='" . $game_time . "' and `win_date`='" . $game_date . "' ");
                if (mysqli_num_rows($check_win) < 1) {

                $insert_result = mysqli_query($con, "INSERT INTO `win_card`
                (`game_time`, 
                `winning_kalyan_pana`, 
                `winning_bazar_pana`, 
                `win_date`,
                `added_time`,
                `g_time`) 
                VALUES ('$game_time','" .
                    $setted_kalyan_pana . "-" . $kalyan_select . "','"
                    . $setted_bazar_pana . "-" . $bazar_select . "','"
                    . $game_date . "','"
                    . date('Y-m-d') . "','"
                    . date('H:i:s')
                    . "')");

                    if ($insert_result  === TRUE) {
                        $data = "New Result Declared successfully";
                        echo  json_encode(
                            array("message" => $data, "success" => true)
                        );
                    } 
                }
                else {
                        $data = "Result Already Declared";
                        echo  json_encode(
                            array("message" => $data, "success" => true)
                        );
                    }
                }    
            }
        }
        else {
            $data = "Invalid Game Time !!";
                        echo  json_encode(
                            array("message" => $data, "success" => true)
                    );
         }
