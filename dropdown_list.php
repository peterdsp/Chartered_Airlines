<html>
<link rel="icon" href=1.tabicon.png>
<style>
		body {
			background-image: url("dropdown_list.png");
			text-align: center;
			margin: auto;
			width: 60%;
			padding: 200px;
		}
		input{
			background-color:rgb(255, 129, 56);
			width: 300px;
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
		table{
			text-align: center; 
			margin: auto; 
			border:2px solid black;
     		background-color:rgb(255, 129, 56);
			border-radius: 35px;
		}
		h2{ 
			text-align: center; 
			margin: auto;  
			width:fit-content; 
			background-color:rgb(255, 129, 56);
			border-radius: 5px;
		}
		h3{
			text-align: center; 
			margin: auto;  
			width:fit-content; 
			background-color:rgb(255, 129, 56);
			border-radius: 5px;
		}
		select{
			text-align: center; 
			margin: auto;  
			width:fit-content; 
			background-color:rgb(255, 129, 56);
			border-radius: 5px;
		}
</style>
	<head>
		<title>Customers Details</title>
	</head>
	<body>
		<h1> Chartered Airlines </h1>
		<form method="post">
			<h2><br> Please select a flight from the dropdown menu to see it's customers details! </h2><br>
			<select name="ss">
			<option disabled selected>-- Select Flight --</option>
		<?php
				$mysqli = mysqli_connect("localhost", "root", "", "Chartered_Airlines");
					if (mysqli_connect_errno()){
						printf("Connect failed: %s\n", mysqli_connect_error());
						exit();
					}
					else{
						$sql = "SELECT * FROM Fli";
						$res = mysqli_query($mysqli, $sql);
						if ($res){
								while ($newArray = mysqli_fetch_array($res)){
									echo "<option>" .$newArray['departure'] ." -> " .$newArray['arrival'] ."</option>";  // displaying data in option menu
								}
						} 
						else{
							printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
						}
						mysqli_free_result($res);
					}
				?>
			</select>
			<p><br><input type="submit" name="submit2" value="Submit"></p>
		</form>
		<?php
			if(isset($_POST['submit2'])){
				if(!empty($_POST["ss"])){
					$flii=$_POST['ss'];
					echo "<table><tr><td>".$_POST['ss']."</table></tr></td>";
					$pieces = explode(" ", $flii);
					$sql2="SELECT * FROM customers,reservations where customers.cus_code=reservations.cus_code and reservations.flight_no=(select flight_no from fli where departure='$pieces[0]')";
					$try=mysqli_query($mysqli, $sql2);
					while ($newArray2 = mysqli_fetch_array($try)){
						echo "<table><tr><td><br>".$newArray2['cus_code']." ".$newArray2['surname']." ".$newArray2['name']." ".$newArray2['nation']." ".$newArray2['b_date']."<br></tr></td><br></table><br>";
					}
				    mysqli_free_result($try);
				}
				else			
					echo "<h3>Please Select a Flight!</h3><br>";
			}
			mysqli_close($mysqli);
		?>
		<form name="goBack" method="post" action="index.html">
			<p><input type="submit" name="submit" value="Return to menu"></p>
		</form>
	</body>
</html>


