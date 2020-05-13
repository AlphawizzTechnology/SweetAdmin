<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
$paytmChecksum = "";
$paramList = array();
$isValidChecksum = FALSE;
$paramList = $_POST;
$return_array = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, '&rdeq7C4d5t%nKH%', $paytmChecksum); //will return TRUE or FALSE string.
// if ($isValidChecksum===TRUE)
//   $return_array["IS_CHECKSUM_VALID"] = "Y";
// else
//   $return_array["IS_CHECKSUM_VALID"] = "N";
$return_array["IS_CHECKSUM_VALID"] = $isValidChecksum ? "Y" : "N";
//$return_array["TXNTYPE"] = "";
//$return_array["REFUNDAMT"] = "";
unset($return_array["CHECKSUMHASH"]);
 
$mid = $_POST['MID'];
$orderid = $_POST['ORDERID'];
 
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://neerajbisht.com/grocery_test/Gateway/checkstatus_api.php?JsonData={"MID":"'.$mid.'","ORDERID":"'.$orderid.'","CHECKSUMHASH":"'.$paytmChecksum.'"}',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
$status= json_decode($resp)->STATUS;
 
echo $resp; 
//exit();
 
// Close request to clear up some resources
curl_close($curl);
 
$encoded_json = htmlentities(json_encode($return_array));
?>
 
<html>
<head>
     <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-I">
     <title>Paytm</title>
     <script type="text/javascript">
            function response(){
                    return document.getElementById('response').value;
            }
     </script>
</head>
<body>
  Redirect back to the app<br>
  <form name="frm" method="post">
    <input type="hidden" id="response" name="responseField" value='<?php echo $encoded_json?>'>
  </form>
</body>
</html>