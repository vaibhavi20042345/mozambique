<?php
    $user_id = $_COOKIE["userId"];
    $url = "https://mozambique.hyunixsolutions.com/cfbadmin/Api/view_farmer/".$user_id;
    
    $data = array(
        'param1' => 'value1',
        'param2' => 'value2'
      );

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
 // echo $response_json;
  $response = json_decode($response_json);
  $data = $response->data;
  $details = $data[0];
//    $firstDataObject = $data[0];
//   $id = $firstDataObject->user_fullname;
//  echo "ID: $id<br>";
        $user_fullname=  $details->user_fullname;
        $user_mobileno= $details->user_mobileno;
        $user_email=  $details->user_email;
        $user_gender=  $details->user_gender;
        $user_nationalid=  $details->user_nationalid;
        $user_address=  $details->user_address;
        $user_region=  $details->user_region; 
        $user_familysize=  $details->user_familysize;
        $user_malechilds=  $details->user_malechilds;
        $user_femalechilds=  $details->user_femalechilds;
        $user_additional_number=  $details->user_additional_number;
        $user_lat=  $details->user_lat;
        $user_lng=  $details->user_lng;
        $user_training_details=  $details->user_training_details;
        $user_professional_details=  $details->user_professional_details;
        $user_farm_address=  $details->user_farm_address;
        $user_total_area=  $details->user_total_area;
        $user_planted_area=  $details->user_planted_area;
        $user_image=  $details->user_image;
        $source_water=  $details->source_water;
        $sanitation=  $details->sanitation;
        $fulltime_male=  $details->fulltime_male;
        $fulltime_female=  $details->fulltime_female;
        $contract_male=  $details->contract_male;
        $seasonal_male=  $details->seasonal_male;
        $seasonal_female=  $details->seasonal_female;
        $labour_male=  $details->labour_male;
        $labour_female=  $details->labour_female;
        $seasonal_item=  $details->seasonal_item;
        $showing_date=  $details->showing_date;
        $report_dieases=  $details->report_dieases;
        $challenges=  $details->challenges;
         
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
<body class="has-bg has-white overflow-initial">

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


<div class="container organization-prof farmer-prof">
  <a class="link" href="home.php">Back</a>
  <div class="row clearfix mt30">
    <div class="col-sm-12">
      <div class="has-pic inline-block align-top w40 mt10">
        <img src="../mozambique/media/pic.png" />
      <!-- <?php  echo '<img src="'.$user_image.'" />';?> -->
        
      </div>
      <div class="inline-block align-top w50 left-30">
        <!-- <h4>Farmer’s  Name</h4> -->
        <?php  echo '<h4>'.$user_fullname.'</h4>';?>
        <p class="mb10"><b>National ID: <?php echo $user_nationalid?></b></p>
	      <div class="inline-block align-top w50 mt10">
	         <img src="../mozambique/media/male.png" />  
	         <span><?php echo $user_gender?></span>  
	      </div>
	      <div class="mt10">
	        <div class="inline-block align-middle pr15 mt10">
	          <a class="info">
	            <img src="../mozambique/media/location.png" />
	            <span>location dummy data</span>
	          </a>
	          <a class="info" href="mailto:F@rmername@gmail.com">
	            <img src="../mozambique/media/mail.png" />
	            <span><?php echo $user_email?></span>
	          </a>
	        </div>     
	        <div class="inline-block align-middle">
	            <a class="info">
	              <img src="../mozambique/media/call.png" />
	              <span><?php echo $user_mobileno?></span>
	            </a>
	            <a class="info" href="mailto:F@rmername@gmail.com">
	              <img src="../mozambique/media/call.png" />
	              <span><?php echo $user_additional_number?></span>
	            </a>
	        </div>        
	      </div>
      </div>
    </div>
   
   <div class="container">
   		<div class="row clearfix">
   			<div class="col-sm-4">
   				<div class="card-details mt30">
   					<h4 class="mb10 title-mngnt">Training Details</h4>
   					<div class="detailed-details mt30 w100">
	                  <div class="icn-dep inline-block align-top w5">
	                    <img src="../mozambique/media/hat.png">
	                  </div>
	                  <div class="inline-block align-middle w94 left-30">
	                    <p>Training details will come here</p>
	                    <p>Training details will come here</p>
	                    <p>Training details will come here</p>
	                  </div>
                	</div>  
                	<div class="detailed-details mt30 w100">
	                  <div class="icn-dep inline-block align-top w5">
	                    <img src="../mozambique/media/hat.png">
	                  </div>
	                  <div class="inline-block align-middle w94 left-30">
	                    <p>Training details will come here</p>
	                    <p>Training details will come here</p>
	                    <p>Training details will come here</p>
	                  </div>
                	</div>  
                	<div class="detailed-details mt30 w100">
	                  <div class="icn-dep inline-block align-top w5">
	                    <img src="../mozambique/media/hat.png">
	                  </div>
	                  <div class="inline-block align-middle w94 left-30">
	                    <p>Training details will come here</p>
	                    <p>Training details will come here</p>
	                    <p>Training details will come here</p>
	                  </div>
                	</div>  
   				</div>
   			</div>
   			<div class="col-sm-8">
   				<div class="card-details mt30">
   					<h4 class="mb10 title-mngnt mb10 pull-left">Cropping and Harvesting</h4>
   					<button class="btn-theme pull-right">+ ADD</button>
   					<div class="w100 f0 inline-block">
   						<div class="inline-block align-top w50">
   							<pre><b>Mango<br/>
   							Shoving Date: dd/mm/yyyy<br/>
   						Reported Diseases: yes</b><br/>
   					Challenges & Mitigation: Sample details will come here Sample details will come here

Sample details will come here Sample details will come here. Sample details will come here Sample details will come here

Sample details will come here Sample details will come here</pre>
   						</div>
   						<div class="inline-block align-top w50">
   							<pre><b>Banana<br/>
   							Shoving Date: dd/mm/yyyy<br/>
   						Reported Diseases: yes</b><br/>
   					Challenges & Mitigation: Sample details will come here Sample details will come here

Sample details will come here Sample details will come here. Sample details will come here Sample details will come here

Sample details will come here Sample details will come here</pre>
   						</div>
   					</div>
   				</div>
   			</div>
   		</div>
   </div>
  </div>
</div>


 <div class="container">
   		<div class="row clearfix">
   			<div class="col-sm-4">
   				<div class="card-details mt30">
   					<h4 class="mb10 title-mngnt mb10">Farm Details</h4>
   					<p class="mt10">Address will come here, Address will come here, Address will come here.</p>

   					<div class="w100 inline-block mt10 f0">
   						<div class="inline-block align-middle w80 pr15">
   							<img src="../mozambique/media/map.png" />
   						</div>
   						<div class="inline-block align-middle w20">
   							<img src="../mozambique/media/pdf.png" />
   						</div>
   					</div>
   					<div class="w100 inline-block mt10 f0 acers">
   						<div class="inline-block align-middle w33 pr15">
   							<h3 class="text-center mb10">2345</h3>
   							<p class="text-center">Total area in Acers</p>
   						</div>
   						<div class="inline-block align-middle w33 pr15">
   							<h3 class="text-center mb10">2345</h3>
   							<p class="text-center">Total area in Acers</p>
   						</div>
   						<div class="inline-block align-middle w33 pr15">
   							<h3 class="text-center mb10">2345</h3>
   							<p class="text-center">Total area in Acers</p>
   						</div>
   					</div>
   				</div>
   			</div>
   			<div class="col-sm-4">
   				<div class="card-details mt30">
   					<h4 class="mb10 title-mngnt mb10">Number of employees</h4>

   					<table class="table table-striped">
	   					<thead>
	   						<th>&nbsp;</th>
	   						<th>Male</th>
	   						<th>FeMale</th>
					    <tbody>
					      <tr>
					        <td>Full time</td>
					        <td>20 </td>
					        <td>20</td>				       
					      </tr>
					      <tr>
					        <td>Contract</td>
					        <td>20 </td>
					        <td>20</td>				       
					      </tr>
					      <tr>
					        <td>Seasonal</td>
					        <td>20 </td>
					        <td>20</td>				       
					      </tr>
					      <tr>
					        <td>Labour</td>
					        <td>20 </td>
					        <td>20</td>				       
					      </tr>
					      <tr>
					        <td>Type 5</td>
					        <td>20 </td>
					        <td>20</td>				       
					      </tr>
					     </tbody>
				    </table>
   				</div>
   			</div>
   			<div class="col-sm-4">
   				<div class="card-details mt30 set">
   					<h4 class="mb10 title-mngnt mb10">Joining fees</h4>
   					<p><b>Monthly fees:</b></p>

   					<div class="w100 inline-block mt10 f0">
   						<div class="inline-block align-middle w50 pr15">
   							<div class="mb10">
				              <img src="../mozambique/media/right.png" class="pr15 align-top" />
				              <span class="f14 align-middle">January 2022</span>		
				            </div>  
				            <div class="mt10">
				              <img src="../mozambique/media/right.png" class="pr15 align-top" />
				              <span class="f14 align-middle">January 2022</span>		
				            </div>  
				            <div class="mt10">
				              <img src="../mozambique/media/right.png" class="pr15 align-top" />
				              <span class="f14 align-middle">January 2022</span>		
				            </div>  
				            <div class="mt10">
				              <img src="../mozambique/media/right.png" class="pr15 align-top" />
				              <span class="f14 align-middle">January 2022</span>		
				            </div>  
				            <div class="mt10">
				              <img src="../mozambique/media/right.png" class="pr15 align-top" />
				              <span class="f14 align-middle">January 2022</span>		
				            </div>  
				            <div class="mt10">
				              <img src="../mozambique/media/right.png" class="pr15 align-top" />
				              <span class="f14 align-middle">January 2022</span>		
				            </div>  
				            <div class="mt10">
				              <img src="../mozambique/media/right.png" class="pr15 align-top" />
				              <span class="f14 align-middle">January 2022</span>		
				            </div>        
   						</div>
   						<div class="inline-block align-middle w50 pr15">
   							<div class="mb10">
				              <img src="../mozambique/media/right.png" class="pr15 align-top" />
				              <span class="f14 align-middle">January 2022</span>		
				            </div>  
				            <div class="mt10">
				              <img src="../mozambique/media/right.png" class="pr15 align-top" />
				              <span class="f14 align-middle">January 2022</span>		
				            </div>  
				            <div class="mt10">
				              <img src="../mozambique/media/right.png" class="pr15 align-top" />
				              <span class="f14 align-middle">January 2022</span>		
				            </div>  
				            <div class="mt10">
				              <img src="../mozambique/media/right.png" class="pr15 align-top" />
				              <span class="f14 align-middle">January 2022</span>		
				            </div>  
				            <div class="mt10">
				              <img src="../mozambique/media/right.png" class="pr15 align-top" />
				              <span class="f14 align-middle">January 2022</span>		
				            </div>  
				            <div class="mt10">
				              <img src="../mozambique/media/right.png" class="pr15 align-top" />
				              <span class="f14 align-middle">January 2022</span>		
				            </div>  
				            <div class="mt10">
				              <img src="../mozambique/media/right.png" class="pr15 align-top" />
				              <span class="f14 align-middle">January 2022</span>		
				            </div>        
   						</div>
   					</div>
   				</div>
   			</div>
   		</div>
 </div>


<div class="container">
   		<div class="row clearfix">
   			<div class="col-sm-4">
   				<div class="card-details mt30">
   					<h4 class="mb10 title-mngnt mb10">Farm audit check</h4>

   					<div class="white mb10">
   						<p class="f14"><b>Source water for irrigation:</b></p>
   						<p>Rain fed, River</p>
   					</div>
   					<br/>
   					<div class="white mt10">
   						<p class="f14"><b>Source water for irrigation:</b></p>
   						<p>Rain fed, River</p>
   					</div>
   					<br/>
   					<div class="white mt10">
   						<p class="f14"><b>Source water for irrigation:</b></p>
   						<p>Rain fed, River</p>
   					</div>
   					<br/>
   					<div class="white mt10">
   						<p class="f14"><b>Source water for irrigation:</b></p>
   						<p>Rain fed, River</p>
   					</div>

   				</div>
   			</div>
   			<div class="col-sm-4">
   				<div class="card-details mt30">
   					<h4 class="mb10 title-mngnt mb10">House hold Details</h4>

   					<div class="w100 inline-block  f0 acers">
   						<div class="inline-block align-top w33 pr15">
   							<h3 class="text-center mb10">5</h3>
   							<p class="text-center">Size of family</p>
   						</div>
   						<div class="inline-block align-middle w33 pr15">
   							<h3 class="text-center mb10">2</h3>
   							<p class="text-center">Number of male child</p>
   						</div>
   						<div class="inline-block align-middle w33 pr15">
   							<h3 class="text-center mb10">1</h3>
   							<p class="text-center">Number of female child</p>
   						</div>
   					</div>

   					<pre>
   						Sample data will come here, Sample data will come here, Sample data will come here.

Sample data will come here, Sample data will come here, Sample data will come here.

Sample data will come here, Sample data will come here, Sample data will come here.
   					</pre>
   				</div>
   			</div>
   		</div>
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