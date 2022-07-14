<html>
<link rel="icon" href=1.tabicon.png>
<body>
	<style>
			body {
				background-image: url("view.jpg");
				text-align: center;
				margin: auto;
				width: 60%;
				padding: 200px;
			}
			input{
				background-color:rgb(255, 129, 56);
				width: 200px;
				border-radius: 25px;
			}
			p{
				background-color:rgb(255, 129, 56);
				text-align: center; 
				margin: auto; 
				width:fit-content;
			}
			table{
				text-align: center; 
				margin: auto; 
				border:2px solid black;
				background-color:rgb(255, 129, 56);
				border-radius: 15px;
			}
	</style>
	<?php
	$mysqli = mysqli_connect("localhost", "root", "", "Chartered_Airlines");
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	} else {
		$sql = "SELECT * FROM Fli";
		$res = mysqli_query($mysqli, $sql);

		if ($res) {
			while ($newArray = mysqli_fetch_array($res, MYSQLI_BOTH)) {
				$Fli_Flight  = $newArray['flight_no'];
				$Fli_DEPARTURE = $newArray['departure'];
				$Fli_ARRIVAL = $newArray['arrival'];
				echo "<table> <tr><td>Flight Code:</td><td>". $Fli_Flight."</td></tr>".
				"<tr><td>DEPARTURE:</td><td>". $Fli_DEPARTURE."</td></tr>".
				"<tr><td>ARRIVAL:</td><td>". $Fli_ARRIVAL."</td></tr></table><br>";
			}
		} else {
			printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
		}
		mysqli_free_result($res);
		mysqli_close($mysqli);
	}
	?>
	<form name="goBack" method="post" action="index.html">
	<input type="submit" name="submit" value="Return to menu">
	</form>
  </body>
</html>
