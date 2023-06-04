
<?php
    $url = 'https://mozambique.hyunixsolutions.com/cfbadmin/Api/list_farmers';
    
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response_json = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
  echo 'Error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Process the API response
if ($response_json) {
  // API call was successful, do something with the response
 //echo $response_json;
  $response = json_decode($response_json);
  $data = $response->data;
  
  // $firstDataObject = $data[0];
  // $id = $firstDataObject->user_fullname;
  // echo "ID: $id<br>";

} else {
  // API call failed
  echo 'API call failed';
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome to Mozambique</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../mozambique/assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="has-bg">

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">
        <img src="../mozambique/media/logo-panel.png"> 
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
       <li class="active"><a href="home.html">Framers</a></li>
      <li><a href="analytics-dashoard.html">Analytics</a></li>       
    </ul>
</div>
    <div class="pull-right profile">
      <img src="../mozambique/media/pic.png" class="hide-show">
      <div class="bg-white">
        <div class="has-border">
          <img src="../mozambique/media/pic.png" />
          <span>Farmer's Name</span>
        </div>
        <div class="has-details">
          <ul>
            <li><a href="organization-profile.html">View Profile</a></li>
            <li><a>Log Out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
  

 <div class="title-wrapper">
 	<div class="container">
	 	<div class="title inline-block align-middle">
	 		<h4>Farmer listing</h4>
	 	</div>
	 	<div class="searchand-button inline-block align-middle pull-right">
	 		<div class="search-input inline-block align-middle">
	 			<input type="text" value="" placeholder="Search" id="Search" />
	 		</div>
	 		<!--<div class="add-button inline-block align-middle">
	 			<button class="btn-theme">+ Add</button>
	 		</div> -->
	 	</div>
 	</div>
 </div>

 <div class="container farmer-list">
             
  <table class="table table-striped">
    <tbody>
      <?php
    foreach ($data as $item) {
    $id = $item->user_id;
    $name = $item->user_fullname;
    // Add option to the dropdown
    $html = '<tr><td><a class="link" href="farmer-details.html"><img src="../mozambique/media/pic.png" class="inline-block align-middle" />
        <span class="inline-block align-middle">'.$name.'</a></td><td>
            <span class="inline-block align-middle">Joining Fees - Paid</span>
            <img src="../mozambique/media/paid.png" class="inline-block align-middle" />
          </td>
          <td>Last monthly fees paid: May 2022</td>';
   echo  $html ;
  }
  ?>
    </tbody>
  </table>
</div>


<script>
$(document).ready(function(){
	$(".bg-white").hide();
  $(".hide-show").click(function(){
    $(".bg-white").toggle();
  });
  
});
</script>
</body>
</html>