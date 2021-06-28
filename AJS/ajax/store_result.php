<?php
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    date_default_timezone_set("Asia/Kolkata");
    $added_date = date('Y-m-d');
    $added_time = date('h:i A');
    $game_time = $_POST['game_selected'];
    $setted_kalyan_pana = $_POST['setted_kalyan_pana'];
    $setted_bazar_pana = $_POST['setted_bazar_pana'];
    $bazar_select = $_POST['bazar_select'];
    $kalyan_select = $_POST['kalyan_select'];

    $check=mysqli_query($con,"SELECT * FROM `result_number_setting` where `game_time`='$game_time' and `added_date`='".date('Y-m-d')."' ");
    if (mysqli_num_rows($check) < 1) {
    $insert_result = mysqli_query($con, "INSERT INTO `result_number_setting`
    (`game_time`, `setted_kalyan_pana`, `setted_bazar_pana`, `added_date`, `added_time`) 
    VALUES ('$game_time','" . $setted_kalyan_pana . "-" . $kalyan_select . "','" . $setted_bazar_pana . "-" . $bazar_select . "','" . $added_date . "','" . date('H:i:s') . "')");

    if ($insert_result  === TRUE) {
        $data = "Result Setted Successfully";
        echo  json_encode(
            array("message" => $data, "success" => true)
        );
    } else {
        $err = "Error: " . $insert_result . "<br>" . mysqli_error($con);
        echo  json_encode(array("message" => $err, "success" => false));
    }
}
else{
    $data = "Result Already Setted.";
        echo  json_encode(
            array("message" => $data, "success" => true)
        );
}
}
