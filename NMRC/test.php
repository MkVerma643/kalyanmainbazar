<!DOCTYPE html>
<html>
<body>

<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      x.innerHTML = "User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML = "Location information is unavailable."
      break;
    case error.TIMEOUT:
      x.innerHTML = "The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML = "An unknown error occurred."
      break;
  }
}
</script>

</body>
</html>
https://we.tl/t-hhzLD5fPkX


<?php
ini_set("display_errors","1");
// print_r($_FILES);
$Excel = $_FILES['execlFile'];
include_once($Source_path."apps/PHPExcel/Classes/PHPExcel/IOFactory.php");
        $type= $Excel['type'];
        $tmpName = $Excel['tmp_name'];
        $mimes = array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(in_array($type,$mimes)){
            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
            $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpName);
            $excelObj = $excelReader->load($tmpName);
            $worksheet = $excelObj->getSheet(0);
            $TotalRows = $worksheet->getHighestRow();
            // echo "total rows " . $TotalRows;
            $TotalColumn = PHPExcel_Cell::columnIndexFromString($worksheet->getHighestColumn());
            $sheetData = $worksheet->toArray(null,true,true,true);
            // print_r($sheetData);
            // exit();
            $finalArray = array();
            for($row=3;$row<=$TotalRows;$row++){
                $colArray = array();
                for($col=0;$col<$TotalColumn;$col++){
                    $cell = $worksheet->getCellByColumnAndRow($col, $row);
                    $ltr = PHPExcel_Cell::stringFromColumnIndex($col);
                    $cellValue = null;
                    if (!empty($cell->getValue())) {
                        if(PHPExcel_Shared_Date::isDateTime($cell)){
                            $cellValue = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($cell->getValue()));
                        }else{
                            $cellValue = $cell->getValue();
                        }
                        
                    }
                    array_push($colArray,$cellValue);
                    
                }
                // print_r($colArray);
                array_push($finalArray,$colArray);
                $colArray = null;
            }
            $status = "Success";
            $message = "Data Updated";
            $data = $finalArray;
        }else{
            $status="Failed";
            $message="Invalid file extention";
            $data = 0;
        }
        // $("#table1").DataTable().cell(1,1).node().firstChild.value
        // $("#table1").DataTable().cell(1,1).node().firstChild.value = "2020-07-10"
        // $("#table1").DataTable().cell(1,1).nodes()
        $d = array("status"=>$status,"message"=>$message,"data"=>$data);
        echo json_encode($d);
        
        function fromExcelToLinux($excel_time) {
            return ($excel_time-25569)*86400;
        }
?>