<?php
	$cookie_name = "user";
	$cookie_value = "John Doe";
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/var/www/XSS"); // 86400 seconds = 1 day
?>

<html>
	<head>
			<title> 
				XSS Test (Reflected)
			</title>
	 </head>
	<body>
			<h1 align = "center"> Try New Search Feature! </h1>
			<center>
			<form align = "center" action = "" method = "get">
				<input type = "text" name = "keyword" placeholder = "search">
				<input type = "submit" value = "Search">
			</form>
				<?php 
					if(!empty($_GET['keyword'])){
						echo "The results of your search for: " . $_GET['keyword'] . "<br>"; 
                        echo "<br> <br> <i> Sorry No Results Found! </i>";
						
						if(empty($_COOKIE["user"])){
							echo "EMPTY!!!";
						}
					}
				?>
			</center>
			
			<h2 align = "center"> Beautiful Search Website </h1>
	</body>
</html>
