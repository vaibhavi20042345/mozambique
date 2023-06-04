<?php
// API endpoint URL for saving registration data
$apiUrl = 'https://mozambique.hyunixsolutions.com/cfbadmin/Api/verifyotp';

// Check if the registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	session_start();

    // Get form data
   $mobilenumber = $_COOKIE["mobilenumber"];
    
   // $mobilenumber = $_SESSION["mobilenumber"];
    //$mobilenumber ='9904188487';
	$otp = $_POST['otp'];

    // Prepare data payload for API request
    $data = array(
        'mobilenumber'=>$mobilenumber,
		'otp' => $otp,
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
      // echo 'API response: ' . $response;
        $data = json_decode($response);
        $status = $data->status;
        $msg=$data->message;
        if($status==true && $msg=='Invalid OTP')
        {
            setcookie("message",  "Invalid OTP");
            header("Location: enter-otp.html");
        }
       else if($status==true)
        {
            $returnData= $data->data[0];
            $userid=$returnData->user_id;
            setcookie("userId",  $userid);
            $training= $returnData->user_training_details;
            if($training!="" && !empty(trim($training)))
            {
                
                header("Location: farmer-details.html");
            }
            else
            {
            header("Location: professional-details.html");
            }
            exit;
        }
    }

    // Close cURL
    curl_close($curl);
}
?>

