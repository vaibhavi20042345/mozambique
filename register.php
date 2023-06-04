
  <?php
    $url = 'https://mozambique.hyunixsolutions.com/cfbadmin/Api/region';
    
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
//   $firstDataObject = $data[0];
//   $id = $firstDataObject->name;
//   echo "ID: $id<br>";

} else {
  // API call failed
  echo 'API call failed';
}

 ?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mozambique | Resgister</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="pragma" content="no-cache" />
  <meta http-equiv="expires" content="-1" />
  <link rel="stylesheet" type="text/css" href="../mozambique/assets/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  <script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js">
		</script>
</head>
<body>
<style>
	.error{
		float: right;
    color: red;
    display: inline-block;
    max-width: 100%;
	 margin-bottom: 0px;
    font-weight: 100;
	}
	</style>
<div class="bg-img">

<div class="login-block">
	<div class="arrow">
		<img src="../mozambique/media/arrow.png">
	</div>
	<div class="left-panel inline-block align-top w50 text-center">
		<div>
			<img src="../mozambique/media/leaves.png">
		</div>
		<div class="text-block">
			<h4>Registration</h4>
			<span>Welcome to Mozambique</span>
		</div>
		<p>From the farm to your table, connecting you with nature's bounty. </p>
	</div>
	<div class="right-panel inline-block align-top w50">
   
		<form class="text-center" method="POST" action="adduser.php" id="frmreg">   
	    <input type="text" value="" class="textfield" placeholder="Full name" id="fullname" name="fullname"/>
	    <input type="text" value="" class="textfield" placeholder="Mobile number" id="mobilenumber" name="mobilenumber" />
	    <input type="text" value="" class="textfield" placeholder="Email address" id="emailid" name="emailid" />
	    <!-- <p class="validation">Invalid Email</p> -->
	    <!-- <input type="password" value="" placeholder="Password" id="password" />
	    <input type="password" value="" placeholder="Confirm password" id="Confirm password" /> -->
	    <select  name="gender">
		    <option value="" selected disabled >Gender</option>
		    <option value="Male">Male</option>
		    <option value="Female">Female</option>
		    <option value="Other">Other</option>
		</select>
	    <input type="text" value="" placeholder="National ID" id="nationalId" name="nationalId" />
	    <textarea placeholder="Address" rows="" resize="no" name="address"></textarea>
	     <select name="region">
		    <option value="" selected disabled >Region</option>
            <?php
foreach ($data as $item) {
    $value = $item->id;
    $label = $item->name;
    // Add option to the dropdown
   echo '<option value="' . $value . '">' . $label . '</option>';
  }
?>
		</select>	
		<p class="validation"></p>
		<div class="fix-btn">
	    	<button class="" type="submit">Submit</button>	
		</div>
        
	    <div class="fix-text mt10">
		    <p class="inline-block align-top mr10">Already have an account? </p>
		    <a class="inline-block align-top" href="index.html">Login</a>
	    </div>
		</form>		
        
       
	</div>
</div>
</div>

</body>
<script>
	$(document).ready(function(){
		
		var cookieValue = decodeURIComponent(getCookie("message"));
	//	decodeURIComponent(cookieValue);
		$('.validation').html(cookieValue);
		$.removeCookie("message");
		
		setTimeout(function() {
  // Your code here
  $('.validation').html(" ");
$.removeCookie("message");
}, 5000);

		$(".textfield").on("keypress", function () {
			debugger;
			$('.validation').html(" ");
			$.removeCookie("message");
		});


		function getCookie(cname) {
			let name = cname + "=";
			let ca = document.cookie.split(';');
			for (let i = 0; i < ca.length; i++) {
				let c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length, c.length);
				}
			}
			return "";
		}
		function removeCookie(cookieName) {
			document.cookie = cookieName + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
		}


		$("#frmreg").validate({
			
			rules: {
				fullname: {
				required: true
			  },
			  mobilenumber: {
				required: true
			  },
			  emailid: {
				required: true
			  },
			  gender: {
				required: true
			  },
			  nationalId: {
				required: true
			  },
			  address: {
				required: true
			  },
			  region: {
				required: true
			  },
			},
			messages: {
				fullname: {
				required: "Full name required."
			  },
			  mobilenumber: {
				required: "Mobile number is required."
			  },
			  emailid: {
				required: "Email is required."
			  },
			  gender: {
				required: "Gender is required."
			  },
			  nationalId: {
				required: "National Id is required."
			  },
			  address: {
				required: "Address is required."
			  },
			  region: {
				required: "Region is required."
			  },
	  },
	//   errorPlacement: function(error, element) {
    //   // Get the ID of the target element
    //   var targetId = $(element).attr('id');
      
    //   // Create a custom error message element
    //   var errorElement = $('<p for="' + targetId + '" class="error"></p>').insertAfter($(element));
      
    //   // Insert the error message inside the custom element
    //   error.appendTo(errorElement);
	//   $('#input-element').focus();
    // },

		});
	 });
	 </script>
</html>