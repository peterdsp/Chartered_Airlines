<html>
<link rel="icon" href=1.tabicon.png>
<style>
		body {
			background-image: url("totalreservations_money.png");
			text-align: center;
			margin: auto;
			width: 60%;
			padding: 200px;
		}
		input{
			background-color:rgb(255, 129, 56);
			width: 200px;
			border-radius: 35px;
		}
		p{
			text-align: center; 
			margin: auto;
			width:fit-content;
		}
		h1{ 
			text-align: center; 
			margin: auto;  
			width:fit-content; 
		}
</style>
<head>
		<title>Chartered Airlines</title>
	</head>
	<body>
		<h1> Customers Flight Details</h1><br>
		<form method="POST">		
				<label>
					<p>Enter your code:
					<input type="text" name="ccode" size="10"></p><br>
				</label>
				<label>
					<p>Enter your date: 
					<input type="date" name="fday"></p><br>
				</label>
		  <p><input type="submit" name="submit2" value="Submit"></p>
		</form>
		<?php
		if(isset($_POST['submit2'])){
			if(!empty($_POST["ccode"]) && !empty($_POST["fday"])){
				$mysqli = mysqli_connect("localhost", "root", "", "Chartered_Airlines");
				if (mysqli_connect_errno()) {
					printf("Connect failed: %s\n", mysqli_connect_error());
					exit();
				} 
				else {
					$d=strtotime($_POST["fday"]);
					$datec=date("Ym", $d);
					$sql = "SELECT COUNT(res_num),SUM(t_price) FROM reservations WHERE cus_code=".$_POST["ccode"]." AND EXTRACT(YEAR_MONTH FROM ticket_date)='$datec'";
					$res = mysqli_query($mysqli, $sql);
					if ($res){
							if ($newArray = mysqli_fetch_array($res)){
								echo "<p><b>Total Cost of Flights: ".$newArray['SUM(t_price)']." €"." and Reservations: ".$newArray['COUNT(res_num)']."</b></p>";
							}
						mysqli_free_result($res);
					} 
					else {
						printf("<p>Could not retrieve records: %s</p><br>\n", mysqli_error($mysqli));
					}
					mysqli_close($mysqli);
				}
			}
			else{
				echo "<p>Please enter your reservation number and your flights' date!</p><br>";
			}
		}
		?>
	<form name="goBack" method="post" action="index.html">
	<p><input type="submit" name="submit" value="Return to menu"></p>
	</form>
  </body>
</html>
