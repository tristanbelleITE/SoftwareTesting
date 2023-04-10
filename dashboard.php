<!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
    <head>
        <script src="jquery-2.1.4.js"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>
<body>
	<!-- /********* NavBar *********/ -->
	<div w3-include-html="navbar.html"></div>
	<!-- /********* SideBar *********/ -->
	<div w3-include-html="sidebar.html"></div>
	

	 
	
	<div class="content">
		<h2 style="margin: 0; padding: 0; font-size: 24px;">Welcome Back, Nathan</h2>
		<p style="margin-top: 10px; color: #666666; font-size: 16px;">Here's whats happening in rentals today</p>
		
		<div style="display: flex; justify-content: space-between; align-items: center; padding-right: 40px;">
				<img src="assets\icons\Popularbanner.png" alt="My SVG File" style="height: 340px; margin: 0;">
				<img src="assets\icons\PieChart.png" alt="My SVG File" style="height: 340px; margin: 0;">
		</div>
		
		<div style="display: flex; justify-content: space-between; align-items: center; padding-right: 40px;">
			<h2 style="padding-top: 15px; font-size: 24px;">Trending Rentals</h2>

			<div style="display: flex; justify-content: space-between;">
				<h2 style="padding-top: 15px; font-size: 14px; padding-right: 40px;">drop down menu</h2>
				<h2 style="padding-top: 15px; font-size: 14px;">drop down menu2</h2>
			</div>
			
		</div>
		
		<div style="display: flex; justify-content: space-between; align-items: center; padding-right: 40px;">
			<?php
			// Include the database configuration file
			include 'php/MySql_Connect.php';
		
			// Query the database for the image URLs
			$query = $dbcon->query("SELECT * FROM images WHERE image_id = 9");
		
			if ($query->num_rows > 0) {
				// Retrieve the image URL from the database
				$row = $query->fetch_assoc();
				$imageURL = 'uploads/' . $row["file_name"];
			?>
				<img src="<?php echo $imageURL; ?>" alt="My SVG File" style="height: 340px; margin: 0;">
			<?php } ?>
			<?php
			// Query the database for the image URLs
			$query = $dbcon->query("SELECT * FROM images WHERE image_id = 12");
		
			if ($query->num_rows > 0) {
				// Retrieve the image URL from the database
				$row = $query->fetch_assoc();
				$imageURL = 'uploads/' . $row["file_name"];
			?>
				<img src="<?php echo $imageURL; ?>" alt="My SVG File" style="height: 340px; margin: 0;">
			<?php } ?>
		</div>
	
	</div>
	
	
	<script src="js/myScript.js"></script>
</body>
</html>

