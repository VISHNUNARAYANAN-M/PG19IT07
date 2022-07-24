<!DOCTYPE html>
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
			
			.container {
			width:34%; 
			height:100px;
			box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
			margin-left:37%;
			margin-top:5%;
			margin-right:5%;
			border-radius: 0px;			
			padding: 0px;
			background-color:white;
			}
			table {
			margin-left:10%;
			margin-top:0%;
			background-color:white;
		}
		th,td {
			font-size:18pt;
			padding:10pt;
			text-align:center;
		}
			


		</style>
	</head>
	<body>
		
	<?php
		// page2.php

		session_start();
		?>
		
		<ul>
			<li id="titlehead"><p id="title"><img src="/img/plogo.png"height="50px">E PHARMA</p></li>
			<li style=margin-right:10px;><a href="user_logout.php">Logout</a></li>
			<li><a class="active" href="user_home.php">User</a></li>
		</ul>
		
		<h2 style="font-style:italic; font-size:30px;text-align: center;">Cart</h2>
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
		
		$name = filter_input(INPUT_GET,'name');
		$qty = filter_input(INPUT_GET,'qty');
		$sql="SELECT amount,quanity FROM medicine_database WHERE medicine_name='$name'and quanity>='$qty'";
		$ret=mysqli_query($conn,$sql);
		

            if(mysqli_num_rows($ret)>0)
            {
				while($row=mysqli_fetch_assoc($ret))
				{
					$amount=$row['amount'];
					
				}
				$amt=$amount*$qty;
			  	//echo "<div id='card'><h2>Amount = ".$amt."</h2><form action='buy.php' method='get'><button type='submit' id='done'>Proceed</button></form></div>";
		        $sql = "CREATE TABLE IF NOT EXISTS cart (
			         med_name VARCHAR(50), 
			         qty int(10),
			         unit_price int(10),
			         total int(10)
			
		             )";
					   if ($conn->query($sql) === TRUE) {
						//echo "Table admin_database created successfully";
						} else {
						echo "Error creating table: " . $conn->error;
						}
						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}  
						$sql="INSERT INTO cart (med_name, qty,unit_price,total) 
						VALUES ('$name', '$qty','$amount','$amt')";	
						if ($conn->query($sql) === TRUE) {
							//echo "New record created successfully";
							echo "<div id='card'><p> Added to cart</p><form action='cart.php' method='get'><button type='submit' id='done'>Done</button></form></div>";
							} 
            }
			if(mysqli_num_rows($ret)==0)
						{
								 echo "<div id='card'><h1>Medicine not available....</h1><form action='buy_medicine.php'><button type='submit' id='done'>Done</button></form></div>";
						}              
			

		           
                   
						
           

?>
		
	</body>
</html>