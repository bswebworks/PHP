<?php
header("Access-Control-Allow-Origin: *");
if($_SERVER["HTTP_HOST"] =="localhost")
	$conn = mysqli_connect("localhost", "root", "","test");
else
	$conn = mysqli_connect("localhost", "digitaln_balbir", "G71k-x2H@(b4","digitaln_fk");

$_POST = json_decode(file_get_contents('php://input'), true);

if($_POST['email'] !="" && isset($_POST['email']) && $_POST['phNo'] !="" && isset($_POST['phNo'])){
	// Get data
	$email =$_POST['email'] ;
	$name = $_POST['name'];
	$contact =  $_POST['phNo'];
	$password = md5($_POST['pwd']) ;
	$img_url = $_POST['img_url'];

	// Insert data into data base
	$uid = rand();
	$sql = mysqli_query($conn , "Insert into user_tbl VALUES('$uid' , '$email', '$name', '$contact', '$img_url', '$password')");
	
	if($sql){
		$json = array("status" => 1, "msg" => 'User has been registered');
	}else{
		$json = array("status" => 0, "msg" => 'email ID is already registered');
	}
}else{
	$json = array("status" => 3, "msg" => 'Please fill the details');
}

//@mysql_close($conn);

/* Output header */
	header('Content-type: application/json');

	echo json_encode($json);
?>