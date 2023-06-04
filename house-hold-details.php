<?php
// API endpoint URL for saving registration data
$apiUrl = 'https://mozambique.hyunixsolutions.com/cfbadmin/Api//additionaldetails';

// Check if the registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
   
    $user_id = $_COOKIE["userId"];
	
    $sizeoffamily = $_POST['sizeoffamily'];
    $numberofmalechild = $_POST['numberofmalechild'];
    $numberoffemalechild = $_POST['numberoffemalechild'];
    $additionalmobilenumber = $_POST['additionalmobilenumber'];

    session_start(); 
    $_SESSION["sizeoffamily"] = $sizeoffamily;
    $_SESSION["numberofmalechild"] =  $numberofmalechild;
    $_SESSION["numberoffemalechild"] = $numberoffemalechild;
    $_SESSION["additionalmobilenumber"] =  $additionalmobilenumber;

    setcookie("sizeoffamily",  $sizeoffamily);
    setcookie("numberofmalechild",  $numberofmalechild);
    setcookie("numberoffemalechild",  $numberoffemalechild);
    setcookie("additionalmobilenumber",  $additionalmobilenumber);

    header("Location: additional-details.html");
    exit;   
}
?>

