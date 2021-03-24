<!DOCTYPE html>
<html>
	<head>
		<title>PHP CRUD</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	</head>
	<body>	
		<?php require_once('backend/process.php'); ?>
		<div class="container">
		<?php
			$mysqli = new mysqli('localhost','root','','crud') or die (mysqli_error($mysqli));
			$result = $mysqli->query("Select * FROM data")or die($mysqli->error);
			//pre_r($result);
		?>
		
		<div class="row justify-content-center">
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Location</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<?php			
					while ($row = $result->fetch_assoc()): ?>
					<tr>
						<td> <?php echo $row['name']; ?></td>	
						<td> <?php echo $row['location']; ?></td>
						<td></td>						
					</tr>
					<?php endwhile; ?>
			</table>
		<div>
		
		<?php
			function pre_r( $array ){ 
				echo '<pre>';
				print_r($array);
				echo '</pre>'; 
			}
		?>
		
		
		<div class="d-flex justify-content-center">
		<form action="backend/process.php" method="POST">
		<div class="form-group mb-3">
		<label>Name</label>
		<input type="text" name="name" class="form-control" placeholder="Enter your name"/>	
		</div>
		<div class="form-group mb-3">
		<label>Location</label>
		<input type="text" name="location" class="form-control" placeholder="Enter your name"/>
		</div>
		<div class="form-group">
		<button type="submit" class="btn btn-primary" name="save">Save</button>
		</div>
		</form>
		</div>
		</div>
	</body>


</html>
