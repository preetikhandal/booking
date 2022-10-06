<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "booking";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Database Connection failed");

//Get All Events Data
function events($conn){
  if ($result = $conn->query("select * from events")) {
    if($result->num_rows > 0){
      while($res = $result->fetch_assoc()){
          $row[] = $res;
      }
      return $row;
    }
  }
}

//Insert Record of Booking
function insert_booking($conn,$data){
  if ($result = $conn->query("select * from events where event_id='".$data['event_id']."'")) {
    if($result->num_rows > 0){
      $res = $result->fetch_assoc();
      $event_name = $res['event_name'];
    }
  }

  $insert = "INSERT INTO `booking_data` (`participation_id`, `employee_name`, `employee_mail`, `event_id`, `event_name`, `participation_fee`, `event_date`, `version`, `created_at`) VALUES (NULL, '".$data['name']."', '".$data['email']."', '".$data['event_id']."', '".$event_name."', '".$data['fee']."', '".$data['event_date']."', '".$data['version']."', current_timestamp())";
  $result = $conn->query($insert);
  return $result;
}

//Search booking
function search_booking($conn,$data){
  if ($result = $conn->query("select * from booking_data where employee_name='".$data['emp_name']."' || event_name='".$data['event_name']."' || event_date='".$data['event_date']."'")) {
    if($result->num_rows > 0){
      while($res = $result->fetch_assoc()){
          $row[] = $res;
      }
      return $row;
    }
  }
}
?> 