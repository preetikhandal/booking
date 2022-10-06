<?php
include 'functions.php';
$errorMsg = "";
$successMsg = "";
$errors = array();

if($conn){
	//$successMsg = "<h3 class='success'>Database Connected";
}
else{
	$errorMsg = "<h3 class='error'>Database connection error. Please try again.</h3>";
}

if(isset($_REQUEST['btn_submit'])){
	$name = mysqli_escape_string($conn,$_REQUEST['name']);
	$email = mysqli_escape_string($conn,$_REQUEST['email']);
	$event_id = mysqli_escape_string($conn,$_REQUEST['event_id']);
	$version = mysqli_escape_string($conn,$_REQUEST['version']);
	$fee = mysqli_escape_string($conn,$_REQUEST['fee']);
	$event_date = mysqli_escape_string($conn,$_REQUEST['event_date']);

	// Check for empty name:
	if (!isset($name) OR empty($name)) {
	    $errors[] = 'Please enter name';
	}

	//Check email validate
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = 'Please enter valid email';
	}

	//check empty event
	if (!isset($event_id) OR empty($event_id)) {
	    $errors[] = 'Please select event';
	}

	//check empty fee
	if (!isset($fee) OR empty($fee)) {
	    $errors[] = 'Please enter participation fee';
	}

	if(empty($errors)){
		$data = array("name" => $name,"email" => $email,"event_id" => $event_id,"version" => $version,"fee" => $fee,"event_date" => $event_date);
		$result = insert_booking($conn,$data);
		if($result){
			$successMsg = "<h3 class='success'>Data inserted successfully!!";
		}
		else{
			$errorMsg = "<h3 class='error'>Data not inserted. Please try again.</h3>";
		}
	}
}

if(isset($_REQUEST['btn_search'])){
	$emp_name = mysqli_escape_string($conn,$_REQUEST['employee_name']);
	$event_name = mysqli_escape_string($conn,$_REQUEST['event_name']);
	$event_date = mysqli_escape_string($conn,$_REQUEST['event_date']);
	$data = array("emp_name" => $emp_name, "event_name" => $event_name, "event_date" => $event_date);
	$search_results = search_booking($conn,$data);
}
?>
<html>
<head>
<title>Event Booking</title>
</head>
<style>
	.success{
		color: green;
	}
	.error{
		color: red;
	}
	ul li{
		color: red;
	}
</style>
<body>
	<div style="width:70%; margin:0 auto;">
		<?php
		if(isset($errorMsg)){
			echo $errorMsg;
		}
		if(isset($successMsg)){
			echo $successMsg;
		}

		if(!empty($errors)){
			echo '<ul>';	
			foreach ($errors as $error) {
				echo "<li>$error</li>\n";
			}
			echo '</ul></p>';
		}
		?>
		<h2>Please Add details below:</h2>
		<form method="post" action="">
			Name*: <input type="text" name="name" required /><br><br>
			Email*: <input type="email" name="email" required /><br><br>
			Event*: 
			<select name="event_id" required>
				<option value="">Select Event</option>
				<?php
				$res = events($conn);
				foreach($res as $key => $val){
					echo "<option value='".$val['event_id']."'>".$val['event_name']."</option>";
				}
				?>
			</select>
			<br><br>
			Version: <input type="text" name="version" /><br><br>
			Fee*: <input type="text" name="fee" required /><br><br>
			Date*: <input type="date" name="event_date" required /><br><br>
			<input type="submit" value="Submit" name="btn_submit" />
		</form>

		<br><br>

		<h3>Search By:</h3>
		<form method="post" action="">
			Employee Name: <input type="text" name="employee_name" />
			Event Name: <input type="text" name="event_name" />
			Event Date: <input type="date" name="event_date" />
			<input type="submit" name="btn_search" value="Search" />
		</form>

		<?php
		if(!empty($search_results)){ ?>
			<table border="1">
				<tr>
					<th>Participation ID</th>
					<th>Employee Name</th>
					<th>Employee Email</th>
					<th>Event ID</th>
					<th>Event Name</th>
					<th>Participation Fee</th>
					<th>Event Date</th>
					<th>Version</th>
				</tr>
				<?php
				foreach($search_results as $key => $val){ ?>
					<tr>
						<th><?php echo strip_tags($val['participation_id']); ?></th>
						<th><?php echo strip_tags($val['employee_name']); ?></th>
						<th><?php echo strip_tags($val['employee_mail']); ?></th>
						<th><?php echo strip_tags($val['event_id']); ?></th>
						<th><?php echo strip_tags($val['event_name']); ?></th>
						<th><?php echo strip_tags($val['participation_fee']); ?></th>
						<th><?php echo strip_tags($val['event_date']); ?></th>
						<th><?php echo strip_tags($val['version']); ?></th>
					</tr>
				<?php
				}
				?>
			</table>
		<?php
		}
		?>
	</div>
</body>
</html>