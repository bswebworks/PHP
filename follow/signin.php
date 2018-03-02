<?php
header("Access-Control-Allow-Origin: *");
if($_SERVER["HTTP_HOST"] =="localhost")
	$conn = mysqli_connect("localhost", "root", "","test");
else
	$conn = mysqli_connect("localhost", "digitaln_balbir", "G71k-x2H@(b4","digitaln_fk");

$_POST = json_decode(file_get_contents('php://input'), true);

if($_POST['email'] !="" && isset($_POST['email']) && $_POST['pwd'] !="" && isset($_POST['pwd'])){
	// Get data
	$email =$_POST['email'] ;
	$pwd = $_POST['pwd'];

	// Insert data into data base
	$sql = mysqli_query($conn , "Select `pwd` from user_tbl WHERE  `email` = '$email'");
	if(mysqli_num_rows($sql) > 0){
		$arr = mysqli_fetch_array($sql);
		if($arr['pwd'] == $pwd){
			$json = array("status" => 1, "msg" => 'User login successfully');
		}
		else{
			$json = array("status" => 3, "msg" => 'Please enter a valid credential');	
		}
		
	}else{
		$json = array("status" => 0, "msg" => 'email ID is not registered');
	}
}else{
	$json = array("status" => 4, "msg" => 'Please fill the details');
}

//@mysql_close($conn);

/* Output header */
	header('Content-type: application/json');

	echo json_encode($json);
?>