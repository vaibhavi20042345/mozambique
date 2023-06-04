<?php
// API endpoint URL for saving registration data
$apiUrl = 'https://mozambique.hyunixsolutions.com/cfbadmin/Api//additionaldetails';

// Check if the registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
   // $user_id = "12";
    $user_id = $_COOKIE["userId"];
	
    $source_water = $_POST['source_water'];
    $irrigation_system = $_POST['irrigation_system'];
    $fulltime_male = $_POST['fulltime_male'];
    $fulltime_female = $_POST['fulltime_female'];
    $contract_male = $_POST['contract_male'];
    $contract_female = $_POST['contract_female'];
    $seasonal_male = $_POST['seasonal_male'];
    $seasonal_female = $_POST['seasonal_female'];
    $labour_male = $_POST['labour_male'];
    $labour_female = $_POST['labour_female'];
    $seasonal_item = $_POST['seasonal_item'];
    $showing_date = $_POST['showing_date'];
    $labour_male = $_POST['report_dieases'];
    $labour_female = $_POST['challenges'];
    $seasonal_item = $_POST['pest'];
    $showing_date = $_POST['sanitation'];
   
    $trainningdetails = $_COOKIE["trainningdetails"];
    $professionaldetails = $_COOKIE["professionaldetails"];
    $farmeraddress = $_COOKIE["farmeraddress"];
    $totalarea = $_COOKIE["totalarea"];
    $plantedarea = $_COOKIE["plantedarea"];
    $numberoftrees = $_COOKIE["numberoftrees"];

    $sizeoffamily = $_COOKIE["sizeoffamily"];
    $numberofmalechild = $_COOKIE["numberofmalechild"];
    $numberoffemalechild = $_COOKIE["numberoffemalechild"];
    $additionalmobilenumber = $_COOKIE["additionalmobilenumber"];

    $user_image="";

   $data = array(
    'user_id'=>$user_id,
    'sizeoffamily' => $sizeoffamily,
    'numberofmalechild' => $numberofmalechild,
    'numberoffemalechild' => $numberoffemalechild,
    'additionalmobilenumber' => $additionalmobilenumber,

    'trainningdetails' => $trainningdetails,
    'professionaldetails' => $professionaldetails,
    'farmeraddress' => $farmeraddress,
    'totalarea' => $totalarea,
    'plantedarea' => $plantedarea,
    'numberoftrees'=>$numberoftrees,
    'source_water'=>$source_water,
    'user_image'=>$user_image,
'irrigation_system'=>$irrigation_system,
'fulltime_male'=>$fulltime_male,
'fulltime_female'=>$fulltime_female,
'contract_male'=>$contract_male,
'contract_female'=>$contract_female,
'seasonal_male'=>$seasonal_male,
'seasonal_female'=>$seasonal_female,
'labour_male'=>$labour_male,
'labour_female'=>$labour_female,
'seasonal_item'=>$seasonal_item,
'showing_date'=>$showing_date,
'report_dieases'=>$report_dieases,
'challenges'=>$challenges,
'pest'=>$pest,
'sanitation'=>$sanitation,
);

$jsonData = json_encode($data);

// Initialize cURL
$curl = curl_init();

// Set the cURL options
curl_setopt($curl, CURLOPT_URL, $apiUrl);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);

// Execute the cURL request
$response = curl_exec($curl);

// Check for cURL errors
if (curl_errno($curl)) {
    echo 'cURL error: ' . curl_error($curl);
} else {
    // Process the API response
    // ...
    echo 'API response: ' . $response;
    $data = json_decode($response);
    $status = $data->status;
    if($status==true)
    {
        $returnData= $data->data[0];
        $userid=$returnData->user_id;
        setcookie("userId",  $userid);
        header("Location: home.php");
        exit;
    }
}

// Close cURL
curl_close($curl);
}

?>

