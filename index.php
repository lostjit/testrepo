<!doctype HTML>

<html>
	<head>
		<title>Login and Registration</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

		
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
			<link rel="stylesheet" type="text/css" href="style.css" />
			<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" media="all" />
			<script type ="text/javascript">  
				
				$(document).ready(function(){
						
						$(document).on('submit', '#country', function (){
								$.post(
									$(this).attr('action'), 
									$(this).serialize(),
									function(data1){
										 $("#countriesHere").html(data1.data1.countries);
									},
										"json"
								); 											
							return false;									
						});
						
						$("#checkinfo").submit(function(){
						
							var e = document.getElementById("ddlCountries");
							var strUser = e.options[e.selectedIndex].value;					
							$("#getinfo").attr('value', strUser);						
							$.post(
									$(this).attr('action'), 
									$(this).serialize(),
									function(data1){
										 $("#results").html(data1.data2.countryinfo);
									},
										"json"
								); 								
							return false;					
						});			

						$("#country").submit();					
				});		
			</script>
		
	</head>
	
	<body>
		<div id="wrapper">
			<div>
				<form id="country" action="process.php" method="post">
					<label>Select Country: </label> 		
					<div id = 'countriesHere'></div>
				</form>
				
				<form id ="checkinfo" action="process.php" method="post"> 
					<input type='hidden' id ='getinfo' name='getinfo' value='getcountriesinfo' />
					<input type ='submit' value ="Check Info"/>
				</form>
			</div>
			
			<div id="popper">
				<h1> Country Information </h1>
				<div id = "results">
				</div>
			</div>	
		</div>

	</body>
</html>