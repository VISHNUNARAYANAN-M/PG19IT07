<!DOCTYPE html>
	<head>
		<style>

			body{
				background-color:black;
				background-image:url("/img/pharmacy.jpg");
				background-repeat:no-repeat;
				background-size:cover;
			}
			
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
			background-color:#00b300;
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
				color:red;
				grid-template-columns: auto ;
				padding: 100px;
			
			}
			
			#posts{
				padding: 20px;
				font-size: 30px;
				text-align: center;
				color:blue;
			
			}
			
		</style>
	</head>
	<body>
		<ul>
			<li id="titlehead"><p id="title"><img src="/img/plogo.png"height="50px">E PHARMA</p></li>
			<li style=margin-right:10px;><a href="admin_login.php">Admin</a></li>
			<li><a href="pharmacist_login.php">Pharmacist</a></li>
			<li><a href="user_login.php">User</a></li>
			<li><a class="active" href="home.php">Home</a></li>
		</ul>
		<div id=bottom_posts>
			<div id=posts>
				<h2 style="font-size:40px;"></h2>
					<p style="font-size:30px;"> </p>
			</div>
		</div>
	</body>
	
</html>