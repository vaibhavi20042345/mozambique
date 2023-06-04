<?php
// API endpoint URL for saving registration data
$apiUrl = 'https://mozambique.hyunixsolutions.com/cfbadmin/Api/sendotp';

// Check if the registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    session_start(); 
    $_SESSION["mobilenumber"] =  $_POST['mobilenumber'];
    // Get form data
    $mobilenumber = $_POST['mobilenumber'];
    setcookie("mobilenumber",  $_POST['mobilenumber']);
    echo "<script>alert('" . $mobilenumber . "');</script>";
    // Prepare data payload for API request
    $data = array(
        'mobilenumber'=>$mobilenumber,
    );

   
   // Start the session
    session_start();

// Set the data in the session
    //$_SESSION['mobilenumber'] =  $mobilenumber;
   
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
            $mobilenumber = $_SESSION["mobilenumber"];
            //echo "<script>alert('" . $mobilenumber . "');</script>";
           header("Location: enter-otp.html");
           exit;
        }
        else
        {
            setcookie("message",  "Mobile nnumber is not registered");
            //echo "<script>alert('" . $mobilenumber . "');</script>";
           header("Location: index.html");
           exit;
        }
    }

    // Close cURL
    curl_close($curl);
}
?>
