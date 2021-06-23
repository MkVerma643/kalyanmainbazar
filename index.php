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
      body {
         margin: 0;  padding: 0;  margin-bottom: 15px;  margin-top: 8px;
         background: #77b;
      }
      body, td {
         font: 14px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
         }

      #subTitle {
         background: #000;  color: #fff;  padding: 4px;  font-weight: bold; 
      }

      #siteNavigation a, #siteNavigation .current {
         font-weight: bold;  color: #448;
         }
      #siteNavigation a:link    { text-decoration: none; }
      #siteNavigation a:visited { text-decoration: none; }

      #siteNavigation .current { background-color: #ccd; }

      #siteNavigation a:hover   { text-decoration: none;  background-color: #fff;  color: #000; }
      #siteNavigation a:active  { text-decoration: none;  background-color: #ccc; }


      a:link    { text-decoration: underline;  color: #00f; }
      a:visited { text-decoration: underline;  color: #000; }
      a:hover   { text-decoration: underline;  color: #c00; }
      a:active  { text-decoration: underline; }

      #pageContent {
         clear: both;
         border-bottom: 6px solid #000;
         padding: 10px;  padding-top: 20px;
         line-height: 1.65em;
         background-image: url(backblue.gif);
         background-repeat: no-repeat;
         background-position: top right;
         }

      #pageContent, #siteNavigation {
         background-color: #ccd;
         }


      .imgLeft  { float: left;   margin-right: 10px;  margin-bottom: 10px; }
      .imgRight { float: right;  margin-left: 10px;   margin-bottom: 10px; }

      hr { height: 1px;  color: #000;  background-color: #000;  margin-bottom: 15px; }

      h1 { margin: 0;  font-weight: bold;  font-size: 2em; }
      h2 { margin: 0;  font-weight: bold;  font-size: 1.6em; }
      h3 { margin: 0;  font-weight: bold;  font-size: 1.3em; }
      h4 { margin: 0;  font-weight: bold;  font-size: 1.18em; }

      .blak { background-color: #000; }
      .hide { display: none; }
      .tableWidth { min-width: 400px; }

      .tblRegular       { border-collapse: collapse; }
      .tblRegular td    { padding: 6px;  background-image: url(fade.gif);  border: 2px solid #99c; }
      .tblHeaderColor, .tblHeaderColor td { background: #99c; }
      .tblNoBorder td   { border: 0; }

   </style>

</head>

<body class="fix-header fix-sidebar">
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
   <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

   
   <div class="container-fluid" style="padding-right:0px;padding-left: 0px;">
      <div id="UpdatePanel1">
         <table width="100%">
            <tbody>
               <tr>
                  <td align="center">
                     <table width="100%" style="background-color: #acecd7;">
                        <tbody>
                           <tr>
                              <td align="center">
                                 <div class="row" style="background-color:#fcf8e3; height:100%;">
                                    <div class="col-lg-12" style="padding:5px 0;">
                                       <div class="col-lg-3">
                                          <h4><img src="https://goldd.in//assets/images/goldd_icon.png" height="30px">
                                          <b style="font-size: 28px; color: black;">Kalyan Main Bazar</b></h4>
                                       </div>
                                      
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td align="center" valign="top" style="padding:10px">

                              <div class="col-lg-1" style="padding:10px" >
                              <button class="btn btn-warning  btn-block mt-3" id="refresh" onClick="history.go(0)" style="border-radius:25px">
                                 Home</button>
                              </div>
                              <div class="col-lg-1" style="padding:10px" >
                              <button class="btn btn-warning  btn-block mt-3" id="refresh" onClick="history.go(0)" style="border-radius:25px">
                                 Refresh</button>
                              </div>
                              
                                 <div class="col-lg-4">
                                    <table align="center">
                                       <tbody>
                                          <form method="GET">
                                             <tr>
                                                <td>
                                                   <table border="0" align="left" cellpadding="5" cellspacing="0">
                                                      <tbody>

                                                         <tr >
                                                         <div style="border-radius:25px;padding:0px">
                                                            <td align="left" bgcolor="" style="padding: 7px; ">
                                                               <input type="date" name="report_date" min="<?php echo date('Y-m-d', strtotime('-15 day', strtotime($today_date))); ?>" value="<?php if (!empty($_GET['report_date'])) {                                                                                                                              } ?>" style="height: 35px;min-width:180px;border-radius: 20px;" class="form-control form-control-rounded"=>
                                                            </td>
                                                            <td bgcolor="#fff"><span style="margin: 0px;display: none;"></span></td>
                                                            <td bgcolor="">
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
                                                            <td bgcolor="" style="padding: 7px;">
                                                            <input type="submit" name="view_result" value="Show" class="btn btn-primary" style="background-color:#008cff; border-radius:25px">
                                                            </td>
                                                            </div>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>                                                
                                             </tr>
                                          </form>
                                       </tbody>
                                    </table>
                                 </div>
                                    
                                 <div class="col-lg-3" style="padding:5px">
                                    <h6><b class="label label-warning btn-block mt-3" style="font-size: 18px;line-height:16px;color: black;border-radius:25px">Next Draw Time: <span class="navtext" id="current_game"></span></b></h6>
                                 </div>
                                 <div class="col-lg-3" style="padding:5px">
                                    <h6><b class="label label-warning btn-block mt-3" style="font-size: 18px;line-height:16px;color: black;border-radius:25px">Time To Draw: <span class="navtext" id="timer"> </span></b> </h6>
                                 </div>

                              </td>
                           </tr>
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
                                       ?>
                                       <b class="label label-danger btn-block mt-3" style="font-size:18px;border-radius:25px;width:50%"> 
                                       Draw Date:  <?php echo date('d-m-Y', strtotime(mysqli_fetch_array($qry)['win_date'])); ?></b>
                                       <br>
                                       <p><br></p>
                                       <hr>
                                       <?php

                                       $count = 0;
                                       $totalrows = mysqli_num_rows($qry)-1;
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
                                       
                                       
                                          
                                       <div class="card" style="background: ;">
                                          <table width="90%" class="table">
                                             <tbody>
                                                
                                                <tr align="center">
                                                   <td>
                                                   <?php
                                                   
                                                   $winning_kalyan_pana1 = $couple[0]['winning_kalyan_pana'];
                                                   $winning_kalyan_pana2 = $couple[1]['winning_kalyan_pana'];

                                                   $rev_string=explode('-', $winning_kalyan_pana2);
                                                   $rev_winning_kalyan_pana2=$rev_string[1]."-".$rev_string[0];

                                                   // foreach ($winning_kalyan_pana as $winning_kalyan_pana_result ) {
                                                   echo "<td style=''><b><p class='btn btn-warning mt-3' style='font-size:22px;border-radius:25px;width:275px;color:black'>" . 'New Kalyan ' . 
                                                   "</b></p><br><br><p class='btn btn-warning mt-3' style='font-size:30px;border-radius:25px;width:200px;color:black'><b>" 
                                                   . $winning_kalyan_pana1 //. '</h3><p  class="label label-info" >' 
                                                   . $rev_winning_kalyan_pana2 . '</b></p><br><br>'  . '<span style="margin-left:10px;font-size:18px;border-radius:25px;width:325px;color:black" class="btn btn-warning mt-3" >' 
                                                   . "<b>" . $couple[0]['game_time'] . ''. "-" 
                                                   . "" . $couple[1]['game_time'] .'</b></span>'   .  " <br></b></p></td>";
                                                   // }
                                                   ?>
                                                   </td>

                                                   <td>
                                                   <?php
                                                   $winning_bazar_pana1 = $couple[0]['winning_bazar_pana'];
                                                   $winning_bazar_pana2 = $couple[1]['winning_bazar_pana'];
                                                   
                                                   $rev_string=explode('-', $winning_bazar_pana2);
                                                   $rev_winning_bazar_pana2=$rev_string[1]."-".$rev_string[0];

                                                   // foreach ($winning_bazar_pana as $winning_bazar_pana_result ) {
                                                   echo "<td style=''><b><p class='btn btn-warning mt-3' style='font-size:22px;border-radius:25px;width:275px;color:black'>" . " New Main Bazar " . 
                                                   "</b></p><br><br><p class='btn btn-warning mt-3' style='font-size:30px;border-radius:25px;width:200px;color:black'><b>" 
                                                   . $winning_bazar_pana1 //. '</h3><p  class="label label-info" >' 
                                                   . $rev_winning_bazar_pana2 . '</b></p><br><br>' .  '<span style="margin-left:10px;font-size:20px;border-radius:25px;width:325px;color:black" class="btn btn-warning mt-3" >' 
                                                   . "<b>" . $couple[0]['game_time'] . ''."-"
                                                   . "" . $couple[1]['game_time'] .'</b></span>'   .  " <br></p></td>";
                                                   // }
                                                   ?>
                                                   </td>
                                                </tr>
                                                <?php
                                                   $couple = [];
                                                   $count = 0;
                                                ?>
                                                <hr>
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
                              <td width="980" height="50" align="center" valign="middle" bgcolor="#eeeb9a" class="txt-2">

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



http://luckyfourresult.com/103050/ResultChart/index.php
http://localhost/kalyanmainbazar/index.php?report_date=2021-06-20&game_selected=&view_result=Show
https://goldd.in/otc
http://localhost/kalyanmainbazar/ajs/game_setting.php
http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=nmrc_game&table=win_card&pos=0
http://localhost/kalyanmainbazar/declareresult.php
https://luckyfourresult.com:2083/cpsess1550028715/frontend/paper_lantern/index.html?login=1&post_login=53537725787312
https://manage.bigrock.in/servlet/ViewDomainServlet?orderid=92783721&referrerkey=bUhVVkpzREYwRHgydDdCR3dOMlRPYWJFcVUyRG56VHdRU25ULzZRNmhGWFRBWHI3NUtkVnIrYzl2Q09ER1dPMg==#
