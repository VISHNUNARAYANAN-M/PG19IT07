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

		$name = $_SESSION['mediname'];
		$qty = $_SESSION['quantity'];
		$sql="UPDATE medicine_database SET quanity=quanity-'$qty' WHERE medicine_name='$name'";
        if(mysqli_query($conn,$sql) == TRUE)
        {
            echo "<div id='card'><h1>Medicine purchased successfully....</h1><form action='user_home.php'><button type='submit' id='done'>Done</button></form></div>";

        }

			
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		//$name = $_SESSION['mediname'];
		//$qty = $_SESSION['quantity'];
		$userid=$_SESSION['userid'];
		$sql="SELECT user_name FROM user_database WHERE user_id='$userid'";
		$ret=mysqli_query($conn,$sql);
			
	
				if(mysqli_num_rows($ret)>0)
				{
					while($row=mysqli_fetch_assoc($ret))
					{
						$user=$row['user_name'];
						
					}	
				}
		
		
		
		$sql="INSERT INTO purchase_log (user) VALUES ('$user')";
        $sql="INSERT INTO purchase_log (med_name,qty,unit_prize,total) SELECT med_name,qty,unit_price,total FROM cart";
        $ret=mysqli_query($conn,$sql);

		
		
		
            if(mysqli_query($conn,$sql) == TRUE)
            {
				echo "<div id='card'><h1>Medicine purchased successfully....</h1><form action='user_home.php'><button type='submit' id='done'>Done</button></form></div>";

            }
        // Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
        $sql="DELETE FROM cart";
        $ret=mysqli_query($conn,$sql);



        
 	
			
?>
		
	</body>
</html>