<!DOCTYPE html>
<?php
// Start the session
session_start();
?>
	<head>
		<style>
			
			#title{
				background-color:#00b300;
				font-size:33px;
				
				
				color:white;
				margin-left:20px;
				margin-top:20px;
				margin-bottom:20px;
				
				}
				
			ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #00b300;
			}
			
			li {
				float: right;
			}
			
			#titlehead{
				float: left;
			}

			li a {
				display: block;
				color: white;
				font-size:20px;
				text-align: center;
				padding: 16px 20px;
				margin-top:10px;
				text-decoration: none;
			}

			li a:hover:not(.active) {
				background-color: #4dff4d;
			}

			.active {
				background-color: #4dff4d;
			}
			
			#home_img{
				padding-left:50px;
				padding-bottom:10px;
				
			}
			
			#bottom_posts{
				
				display: grid;
				grid-template-columns: auto auto auto;
				padding: 10px;
			
			}
			
			#img_title{
				
				display: grid;
				grid-template-columns: auto auto auto;
				padding: 10px;
			
			}
			
			#posts{
				padding: 20px;
				font-size: 30px;
				text-align: center;
			
			}
			#card{
				background-color:#FFFFEF;
				margin:150px;
				height:150px:
				border-radius:5px;
				box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
				text-align:center;
				font-size:24px;
				padding:25px;
				margin-left:200px;
				margin-right:200px;
			}
			
			#done{
				background-color: #00b300;
				color: white;
				padding: 12px 20px;
				border: none;
				border-radius: 4px;
				cursor: pointer;
			
			}
			
		</style>
	</head>
	
	<body>
		
	<?php
        if($_SESSION["pharmacistid"] === ""){
          echo $_SESSION['pharmacistid'];
          echo "login";
          header("Location: home.php ");
        }
      ?>
		
		<ul>
			<li id="titlehead"><p id="title"><img src="/img/plogo.png"height="50px">E PHARMA</p></li>
			<li style=margin-right:10px;><a href="pharmacist_logout.php">Logout</a></li>
			<li><a class="active" href="pharmacist.php">Pharmacist</a></li>
		</ul>

<?php
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname ="pharmacydb";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$sql = "CREATE TABLE IF NOT EXISTS medicine_database (
			medicine_name VARCHAR(50), 
			quanity int(50),
			expiry_date VARCHAR(50),
			amount VARCHAR(50),
			rack_number int(50)
		)";

		if ($conn->query($sql) === TRUE) {
		//echo "Table admin_database created successfully";
		} else {
		echo "Error creating table: " . $conn->error;
		}
		
		$medname = filter_input(INPUT_GET,'medname');
		$qty = filter_input(INPUT_GET,'qty');
		$exdate = filter_input(INPUT_GET,'exdate');
		$amt = filter_input(INPUT_GET,'amt');
		$rack= filter_input(INPUT_GET, 'rack');

		$sql = "SELECT * FROM medicine_database WHERE medicine_name = '$medname'";
		$result = $conn->query($sql);

		if(mysqli_num_rows($result)>0){
			echo "<div id='card'><p>Medicine Already Exists</p><form action='add_medicine.php' method='get'><button type='submit' id='done'>Done</button></form></div>";
		}else{
			$sql ="INSERT INTO medicine_database (medicine_name, quanity, expiry_date, amount,rack_number) 
		VALUES ('$medname', '$qty','$exdate','$amt','$rack')";
	    

		     if ($conn->query($sql) === TRUE) {
				//echo "New record created successfully";
				$_SESSION["medname"] = $medname;
				echo "<div id='card'><p>Medicine Successfully Added</p><form action='pharmacist_home.php' method='get'><button type='submit' id='done'>Done</button></form></div>";
		

		
		     } else {
			      echo "Error: " . $sql . "<br>" . $conn->error;
		     }
		}     

		$conn->close();
		
		?>
		
</body>
	
	
	


</html>