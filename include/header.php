
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

	<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-info bg-info">
		<h5 class="text-white" >RUBY HOSPITAL MANAGEMENT SYSTEM</h5>
		<div class= "ms-auto"> </div>

			<ul class="navbar-nav">
				<?php

					if(isset($_SESSION['admin'])) {

						$USER = $_SESSION['admin'];	
						echo '
						<li class="nav-item"><a href="#" class="nav-link text-white">'.$USER.'</a></li>
				<li class="nav-item"><a href="logout.php" class="nav-link text-white">LOGOUT</a></li>';
					}else if(isset($_SESSION['doctors'])) {
						$USER = $_SESSION['doctors'];	
						echo '
						<li class="nav-item"><a href="#" class="nav-link text-white">'.$USER.'</a></li>
				<li class="nav-item"><a href="logout.php" class="nav-link text-white">LOGOUT</a></li>';
					}else if (isset($_SESSION['patient'])) {
						$USER = $_SESSION['patient'];	
						echo '
						<li class="nav-item"><a href="#" class="nav-link text-white">'.$USER.'</a></li>
				<li class="nav-item"><a href="logout.php" class="nav-link text-white">LOGOUT</a></li>';
					}
				else{
					echo '
					<li class="nav-item"><a href="index.php" class="nav-link text-white">HOME</a></li>
				<li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">ADMIN</a></li>
				<li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">DOCTOR</a></li>
				<li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">PATIENT</a></li> ';
			}
			?>
			</ul>
		</nav>
	</body> 
	</html>


				