<?php

// API endpoint URL for saving registration data
$apiUrl = 'https://mozambique.hyunixsolutions.com/cfbadmin/Api/register';

// Check if the registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $fullname = $_POST['fullname'];
    $mobilenumber = $_POST['mobilenumber'];
    $emailid = $_POST['emailid'];
    $gender = $_POST['gender'];
    $nationalId = $_POST['nationalId'];
    $address = $_POST['address'];
    $region = $_POST['region'];

   setcookie("mobilenumber", $_POST['mobilenumber']);

    // Prepare data payload for API request
    $data = array(
        'fullname'=> $fullname,
        'mobilenumber'=>$mobilenumber,
        'emailid'=> $emailid,
        'gender'=> $gender,
        'nationalId'=>$nationalId,
        'address'=>$address,
        'region'=> $region
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
        $msg=$data->message;
        if($status==true)
        {
          $apiUrl = 'https://mozambique.hyunixsolutions.com/cfbadmin/Api/sendotp';

           session_start();
          
              // Get form data
            $mobilenumber = $_SESSION['mobilenumber'];
           $mobilenumber = $_COOKIE["mobilenumber"];
            $otp = $_POST['otp'];
          
              // Prepare data payload for API request
              $data = array(
                  'mobilenumber'=>$mobilenumber,
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
                  $msg=$data->message;
                  if($status==true)
                  {
                      header("Location: enter-otp.html");
                      exit;
                  }
                  else
                  {
                    setcookie("message",   $msg);
                    header("Location: register.php");
                    exit;
                  }
              }
          
              // Close cURL
              curl_close($curl);
          }
          else
                  {
                    setcookie("message",   $msg);
                    header("Location: register.php");
                    exit;
                  }
         
        
    }

    // Close cURL
    curl_close($curl);
}
?>
