<?php
// API endpoint URL for saving registration data
//$apiUrl = 'https://mozambique.hyunixsolutions.com/cfbadmin/Api/verifyotp';

// Check if the registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$trainningdetails = $_POST['trainningdetails'];
    $professionaldetails = $_POST['professionaldetails'];
	$farmeraddress = $_POST['farmeraddress'];
    $totalarea = $_POST['totalarea'];
    $plantedarea = $_POST['plantedarea'];
    $numberoftrees = $_POST['numberoftrees'];

    session_start(); 
    $_SESSION["trainningdetails"] = $trainningdetails;
    $_SESSION["professionaldetails"] =  $professionaldetails;
    $_SESSION["farmeraddress"] = $farmeraddress;
    $_SESSION["totalarea"] =  $totalarea;
    $_SESSION["plantedarea"] =  $plantedarea ;
    $_SESSION["numberoftrees"] = $numberoftrees ;


    setcookie("trainningdetails",  $trainningdetails);
    setcookie("professionaldetails",  $professionaldetails);
    setcookie("farmeraddress",  $farmeraddress);
    setcookie("totalarea",  $totalarea);
    setcookie("plantedarea",  $plantedarea);
    setcookie("numberoftrees",  $numberoftrees);


    header("Location: house-hold-details.html");
    exit;
}
?>

