<?php
require_once("./AJS/includes/db.php");
date_default_timezone_set("Asia/Kolkata"); 
$today_date=date('Y-m-d');  
if(!empty($_GET['report_date']))
{
$today_date=$_GET['report_date'];
}

?>
<?php
$current_time = date('H:i:s');
$s_time = mysqli_query($con, "SELECT `g_time` FROM `game_time` ORDER BY `game_time_id` ASC LIMIT 1");
$s_time_row = mysqli_fetch_array($s_time);
$st = strtotime('-2 minutes', strtotime($s_time_row['g_time']));
$start_t = date('h:i:s', $st);

$end_time = mysqli_query($con, "SELECT `g_time` FROM `game_time` ORDER BY `game_time_id` DESC LIMIT 1");
$end_time_row = mysqli_fetch_array($end_time);
// $row=null;
 $current_game = $row['game_time'];

if ($current_time > $start_t and $current_time < $end_time_row['g_time']) {
   $gt = mysqli_query($con, "SELECT `game_time` From `game_time` where `g_time`> '$current_time' limit 1");
   $row = mysqli_fetch_array($gt);
   $current_game = $row['game_time'];
   $start_time = new DateTime($current_game);
   $end_time = new DateTime($current_time);
   $diff = $end_time->diff($start_time);
   $a = $diff->format('%H:%I:%S');

   $timeArr = array_reverse(explode(":", $a));
   $seconds = 0;
   foreach ($timeArr as $key => $value) {
      if ($key > 2) break;
      $seconds += pow(60, $key) * $value;
   }
} else {

   $d = date('Y-m-d');
   $today = date('Y-m-d');
   if ($today == $d && $current_time < '24:00:00') {
      $current_time = date('Y-m-d H:i:s');
      $date = date('Y-m-d', strtotime(' +1 day'));
   }

   $gt = mysqli_query($con, "SELECT `game_time` From `game_time` order by `game_time_id` ASC limit 1");
   $row = mysqli_fetch_array($gt);
   $current_game = $row['game_time'];

   $start_time = new DateTime($date . " " . $current_game);
   $end_time = new DateTime($current_time);
   $diff = $end_time->diff($start_time);
   $a = $diff->format('%H:%I:%S');

   $timeArr = array_reverse(explode(":", $a));
   $seconds = 0;

   foreach ($timeArr as $key => $value) {
      if ($key > 2) break;
      $seconds += pow(60, $key) * $value;
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <title>Kalyan Main Bazar Result Chart</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="fix-header fix-sidebar">
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
   <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
   <style type="text/css">
      .row.rows {
         margin-left: 3px;
      }

      .row {
         margin-right: 0px !important;
      }

      label.form-check-label {
         margin-right: 10px;
         margin-bottom: 0px;
      }

      tr.center td {
         text-align: center;
      }

      table.table.table-bordered th {
         text-align: center;
      }
   </style>

   <div class="container-fluid" style="padding-right:0px;padding-left: 0px;">
      <div id="UpdatePanel1">
         <table width="100%">
            <tbody>
               <tr>
                  <td align="center">
                     <table width="100%" style="background-color: #428bca;">
                        <tbody>
                           <tr>
                              <td align="center">
                                 <div class="row" style="background-color:#3b4863; height:100%;">
                                    <div class="col-lg-12" style="padding:10px 0;">

                                       <div class="col-lg-4">
                                          <h4><b style="font-size: 24px; color: white;">Kalyan Main Bazar Result Chart</b></h4>
                                       </div>
                                       <div class="col-lg-4">
                                          <h6><b style="font-size: 21px;line-height:20px;color: white;">Next Draw Time : <span class="navtext" id="current_game"></span></b></h6>
                                       </div>
                                       <div class="col-lg-4">
                                          <h6><b style="font-size: 21px;line-height:20px;color: white;">Time To Draw : <span class="navtext" id="timer"> </span></b> </h6>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td align="center" valign="top">
                                 <h3 style="color: #000000"> <span class="text-Primary">Online Lottery Result Of Draw Date :</span> <span class="text-secondary"><?php echo date('d-m-Y', strtotime($today_date)); ?></span></h3>
                                 <div class="card">
                                    <table align="center">
                                       <tbody>
                                          <form method="GET">
                                             <tr>
                                                <td>
                                                   <table border="0" align="left" cellpadding="5" cellspacing="0">
                                                      <tbody>

                                                         <tr>
                                                            <td align="left" bgcolor="#ccc" style="padding: 20px;">
                                                               <input type="date" name="report_date" min="<?php echo date('Y-m-d', strtotime('-15 day', strtotime($today_date))); ?>" value="<?php if (!empty($_GET['report_date'])) {
                                                                                                                                                                                                echo $_GET['report_date'];
                                                                                                                                                                                             } else {
                                                                                                                                                                                                echo $today_date;
                                                                                                                                                                                             } ?>" style="height: 35px;min-width:180px;border-radius: 20px;" class="form-control form-control-rounded"=>
                                                            </td>
                                                            <td bgcolor="#fff"><span style="margin: 10px;display: none;"></span></td>
                                                            <td bgcolor="#ccc">
                                                               <select id='game_selected' name="game_selected" class="form-control form-control-rounded" style="height: 35px;border-radius: 20px;min-width:180px;">
                                                                  <option value="">Draw Time</option>
                                                                  <?php 
                                                                     $gt=mysqli_query($con,"SELECT * From `game_time` ");
                                                                     
                                                                     while ($row=mysqli_fetch_array($gt)) {
                                                                     
                                                                      ?>
                                                                  <option value='<?php echo $row['game_time'] ?>' <?php if($row['game_time']==$_GET['game_selected']){echo "selected";} ?> ><?php echo $row['game_time'] ?></option>
                                                                  <?php } ?>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                                <td bgcolor="#fff"><span style="margin: 10px;display: none;"></span></td>
                                                <td bgcolor="#ccc" style="padding: 20px;">
                                                   <input type="submit" name="view_result" value="Show" class="btn btn-primary" style="background-color:#008cff">
                                                </td>
                                             </tr>
                                          </form>
                                       </tbody>
                                    </table>
                                 </div>
                              </td>
                           </tr>

                           <tr>
                           <tr>
                              <td align="center" valign="top">

                                 <br>
                                    <?php 
                                       if(!empty($_GET['game_selected']))
                                       {
                                       $qry=mysqli_query($con,"SELECT * FROM `win_card` where `game_time`='".$_GET['game_selected']."' and `win_date`='".$today_date."'  order by `g_time` ASC ");
                                       }
                                       else
                                       {
                                       $qry=mysqli_query($con,"SELECT * FROM `win_card` where `win_date`='".$today_date."'  order by `g_time` ASC ");
                                       }
                                       
                                       $count = 0;
                                       $totalrows = mysqli_num_rows($qry);
                                       $rowCount = 0;
                                       $couple = [];
                                       while ($row=mysqli_fetch_array($qry)) {
                                          $rowCount++;
                                          array_push($couple, $row);
                                          $count++;
                                          if ($rowCount != $totalrows) {
                                             if ($count != 2){
                                                continue;
                                             }
                                          }
                                          

                                          $g_time = strtotime("+24 seconds", strtotime($today_date." ".$row['g_time']));
                                          $g_show_time=date('Y-m-d H:i:s', $g_time);


                                          if( date('Y-m-d H:i:s')>$g_show_time   ){

                                          ?>


                                       <div class="card" style="background: #f4f5f8;">
                                          <table width="90%" class="table">
                                             <tbody>

                                                <tr>
                                                   <td colspan="10" align="center"><b style="font-size:18px;"> Draw Date:  <?php echo $row['win_date'];                                                                                                               ?></b></td>
                                                </tr>

                                                <tr align="center">
                                                   <td>
                                                   <?php
                                                   
                                                   $winning_kalyan_pana1 = $couple[0]['winning_kalyan_pana'];
                                                   $winning_kalyan_pana2 = $couple[1]['winning_kalyan_pana'];
                                                   // foreach ($winning_kalyan_pana as $winning_kalyan_pana_result ) {
                                                   echo "<td><b style='font-size:26px;'>" . 'New Kalyan ' . '<br><h3  class="label label-info" >' 
                                                   . $winning_kalyan_pana1 . '</h3><h3  class="label label-info" >' 
                                                   . $winning_kalyan_pana2 . '</h3><br>'  . '<span style="margin-left : 10px" class="label label-primary" >' 
                                                   . "Time- " . $couple[0]['game_time'] . '<span style="margin-left : 10px" class="label label-primary" >' 
                                                   . "Time- " . $couple[1]['game_time'] .'</span>'   .  " <br></b></td>";
                                                   // }
                                                   ?>
                                                   </td>

                                                   <td>
                                                   <?php
                                                   $winning_bazar_pana1 = $couple[0]['winning_bazar_pana'];
                                                   $winning_bazar_pana2 = $couple[1]['winning_bazar_pana'];
                                                   
                                                   // foreach ($winning_bazar_pana as $winning_bazar_pana_result ) {
                                                   echo "<td><b style='font-size:26px;'>" . " New Main Bazar " . '<br><h3  class="label label-info" >' 
                                                   . $winning_bazar_pana1 . '</h3><h3  class="label label-info" >' 
                                                   . $winning_bazar_pana2 . '</h3><br>' .  '<span style="margin-left : 10px" class="label label-primary" >' 
                                                   . "Time- " . $couple[0]['game_time'] . '<span style="margin-left : 10px" class="label label-primary" >' 
                                                   . "Time- " . $couple[1]['game_time'] .'</span>'   .  " <br></b></td>";
                                                   // }
                                                   ?>
                                                   </td>
                                                </tr>
                                                <?php
                                                   $couple = [];
                                                   $count = 0;
                                                ?>
                                             </tbody>
                                          </table>
                                       </div>
                                 <?php
                                    }
                                 }
                                 ?>
                                 <br>
                              </td>
                           </tr>
                           <tr>
                              <td width="980" height="50" align="center" valign="middle" bgcolor="#eee" class="txt-2">

                                 <span style="color: #000000">
                                    <marquee width="100%" direction="left" height="20px">
                                       <?php
                                       $msg_qry = mysqli_query($con, "SELECT * FROM `welcome_msg`");

                                       $msg_row = mysqli_fetch_array($msg_qry);

                                       echo '<b>' . $msg_row['msg'] . '</b>';

                                       ?>
                                    </marquee>
                                 </span>

                              </td>
                           </tr>
                           <tr>
                              <td width="980" height="50" align="center" valign="middle" bgcolor="#ccc" class="txt-2">
                                 <table border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                       <tr>
                                          <td align="center">
                                             <span style="color: #000000">
                                                Purchase of lottery using this website is strictly prohibited in the states where lotteries are banned. You must be above 18 years to play Online Lottery.
                                                <br>
                                                &nbsp;<strong>Kalyan Main Bazar</strong>, All rights reserved.
                                             </span>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</body>

<script>
   var count = '<?php echo $seconds; ?>';
   var current_game = '<?php echo $current_game; ?>';
   var counter = setInterval(timer, 1000);

   function timer() {
      count = count - 1;
      if (count == 0) {
         window.location.reload();
      }

      const formatted = moment.utc(count * 1000).format('HH:mm:ss');
      document.getElementById("timer").innerHTML = formatted;
      document.getElementById("current_game").innerHTML = current_game;

      // var dt = new Date();
      // var current_time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
      // document.getElementById("current_time").innerHTML=current_time;
   }
</script>

