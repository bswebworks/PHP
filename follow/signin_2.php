<?php
header("Access-Control-Allow-Origin: *");
echo ='rter';
if($_SERVER["HTTP_HOST"] =="localhost")
	$conn = mysqli_connect("localhost", "root", "","test");
else
	$conn = mysqli_connect("localhost", "digitaln_balbir", "G71k-x2H@(b4","digitaln_fk");

$_POST = json_decode(file_get_contents('php://input'), true);

if($_POST['email'] !="" && isset($_POST['email']) && $_POST['password'] !="" && isset($_POST['pwd'])){
	// Get data
	$email =$_POST['email'] ;
	$pwd = $_POST['pwd'];

	// Insert data into data base
	$sql = mysqli_query($conn , "Select pwd from user_tbl WHERE  email = $email");
	if(mysqli_num_rows($sql) > 0){
		print_r($sql)
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