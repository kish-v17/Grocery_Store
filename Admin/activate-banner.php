<?php
	include '../DB/connection.php'; 
	$banner_id = $_GET['banner_id'];
	$query = "UPDATE banner_details_tbl SET Active_Status = 1 WHERE Banner_Id = $banner_id";
	if (mysqli_query($con, $query)) {
		echo '<script>
				window.location.href = "banners.php";
				</script>';
	} else {
		echo '<script>
				alert("Error activating banner. Please try again.");
				window.location.href = "banners.php";
				</script>';
	}
