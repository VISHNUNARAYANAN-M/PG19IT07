<!DOCTYPE html>
<?php
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
        if($_SESSION["userid"] === ""){
          echo $_SESSION['userid'];
          echo "login";
          header("Location: home.php ");
        }
      ?>
		
	<ul>
			<li id="titlehead"><p id="title"><img src="/img/plogo.png"height="50px">E PHARMA</p></li>
			<li style=margin-right:10px;><a href="user_logout.php">Logout</a></li>
			<li><a class="active" href="user_home.php">User</a></li>
			</ul>
			
			<h2 style="font-style:italic; font-size:30px;text-align: center;">View Medicines</h2>
		

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
		$sql="DELETE FROM medicine_database WHERE expiry_date < NOW()-interval 1 day";
		$ret=mysqli_query($conn,$sql);
		$sql="DELETE FROM medicine_database WHERE quanity=0";
		$ret=mysqli_query($conn,$sql);



		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
	
	
		$sql='SELECT * FROM medicine_database';
		$ret=mysqli_query($conn,$sql);
            if(mysqli_num_rows($ret)>0)
            {
                    echo"<div id='dem'>";
					echo"<table border='1'><tr><th>Medicine Name</th><th>Quantity</th><th>Expiry Date</th><th>Amount</th></tr>";
					while($row=mysqli_fetch_assoc($ret))
					{
						echo"<tr><td>{$row['medicine_name']}</td><td>{$row['quanity']}</td><td>{$row['expiry_date']}</td><td>{$row['amount']}</td></tr>";
					}
            
			echo"</table>";
                     
            echo"<form action='user_home.php'><button type='submit' id='done' style='margin-left:10%;margin-top:20px'>Go Back</button></form>";
            echo"</div>";
            }
            if(mysqli_num_rows($ret)==0)
            {
                      echo "<div id='card'><h1>No Medicine are thier to view....</h1><form action='user_home.php'><button type='submit' id='done'>Done</button></form></div>";
		
            }
?>
    </body>
</html>
