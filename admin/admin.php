 <?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
	<?php
	include("../include/header.php");
	?>
	<div class="container-fluid">
<div class="col-md-12">
	<div class="row">
		<div class="col-md-2" style="margin-left:-30px;">
			<?php
			include("sidenav.php"); 
			include("../include/connection.php");
			 ?>
			</div>
			<div class="col-md-10">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<h5 class="text-center mb-5"> ALL ADMIN </h5>
							<?php
								$ad = $_SESSION['admin'];
								$query = "SELECT * FROM admin WHERE username !='$ad'";
								$res = mysqli_query($connect,$query);
								$output=" <table class='table table-bordered'>
								<tr>
								<th>ID</th>
								<th>USERNAME</th>
								<th style='width: 10%;'>Action</th><tr>";

								if (mysqli_num_rows($res)<1)
								{
									$output .= "<tr><td  colspan='3' class='text-center'> NO NEW ADMIN </td></tr>";
								}
								while ($row = mysqli_fetch_array($res)){
									$id= $row['id'];
									$username=$row['username'];
									$output .= "
									<tr>
									<td>$id</td>
									<td>$username</td>
									<td> 
										<a href='admin?id=$id'><button id='$id' class='btn btn-danger remove'>
										Remove</button></a>
									</td>";
								}

								$output .="

								</tr>
								</table>
								"; 
								echo $output;

								if(isset($_GET['id'])) {
									$id= $_GET['id'];
									$query = "DELETE FROM admin WHERE id='$id'";
									mysqli_query($connect,$query);
								}
							
							?>
							
						</div>
						<div class="col-md-6">
							<?php

							if (isset($_POST['add']))
							{
								$uname = $_POST['uname'];
								$pass = $_POST['pass'];
								$image= $_FILES['img']['name'];
								$error = array();
								if(empty($uname))
								{
									$error['u']="ENTER ADMIN USERNAME";
								}else if(empty($pass))
								{
									$error['u']="ENTER ADMIN PASSWORD";
								}else if(empty($image))
								{
									$error['u']="ADD ADMIN PICTURE";
								}
								if(count($error)==0){

									$q = "INSERT INTO admin(username,password,profile) VALUES ('$uname','$pass','$image')";
									$result = mysqli_query($connect,$q);
									if($result) {

										 move_uploaded_file($_FILES['img']['tmp_name'],"img/$image/");
									}else{

									}
								}
							}

							if (isset($error['u'])) {
								$er = $error['u'];

								$show = "<h6 class='text-center alert alert-danger'>$er </h6>";
							}else{
								$show = "";
							}
							?>

							<h5 class="text-center">ADD ADMIN</h5>
							<form method="post" enctype="multipart/form-data">
								<div>
									<?php echo $show; ?>
								</div>
								<div class="form-group mb-3" >
									<label> Username </label>
									<input type="text" name="uname" class="form-control" autocomplete="off">
								</div>
								<div class="form-group mb-3">
								<label>Password</label>	
								<input type="password" name="pass" class="form-control">				
									</div>

								<div class="form-group mb-3">
									<label>Add Admin Picture</label>
									<input type="file" name="img" class="form-control">
								</div><br>
								<input type="submit" name="add" value="Add New Admin" class="btn btn-success">
							</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
</div>
</body>
</html>