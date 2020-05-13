<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./libb/config_paytm.php");
require_once("./libb/encdec_paytm.php");
$checkSum = "";

// below code snippet is mandatory, so that no one can use your checksumgeneration url for other purpose .
$findme   = 'REFUND';
$findmepipe = '|';

$paramList = array();

$paramList = array();
$paramList["MID"] = 'BISHTT45712521385572'; //Provided by Paytm
$paramList["ORDER_ID"] = $orderid; //unique OrderId for every request
$paramList["CUST_ID"] = 'CUST563210'; // unique customer identifier 
$paramList["INDUSTRY_TYPE_ID"] = 'Retail'; //Provided by Paytm
$paramList["TXN_AMOUNT"] = $amount; // transaction amount
$paramList["CHANNEL_ID"] = 'WAP'; // transaction amount
$paramList["WEBSITE"] = 'APP_STAGING'; // transaction amount
$paramList["EMAIL"] = $email; // customer email id
$paramList["MOBILE_NO"] = $mobile; // customer 10 digit mobile no.
//$paramList["CALLBACK_URL"] = 'https://pguat.paytm.com/paytmchecksum/paytmCallback.jsp'; //Provided by Paytm
$paramList["CALLBACK_URL"] = 'http://neerajbisht.com/grocery_test/PaytmKit/verifyCheckSum.php'; //Provided by Paytm

foreach($_POST as $key=>$value)
{  
  $pos = strpos($value, $findme);
  $pospipe = strpos($value, $findmepipe);
  if ($pos === false || $pospipe === false) 
    {
        $paramList[$key] = $value;
    }
}


  
//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,"&rdeq7C4d5t%nKH%");
//print_r($_POST);
 echo json_encode(array("CHECKSUMHASH" => $checkSum,"ORDER_ID" => $_POST["ORDER_ID"], "payt_STATUS" => "1"));
  //Sample response return to SDK
 
//  {"CHECKSUMHASH":"GhAJV057opOCD3KJuVWesQ9pUxMtyUGLPAiIRtkEQXBeSws2hYvxaj7jRn33rTYGRLx2TosFkgReyCslu4OUj\/A85AvNC6E4wUP+CZnrBGM=","ORDER_ID":"asgasfgasfsdfhl7","payt_STATUS":"1"} 
 
?>