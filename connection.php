<?php
$server_name="localhost";
$username="root";
$password="root";
$database_name="ncdb";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['save']))
{	
	 $fname = $_POST['fname'];
	 $lname = $_POST['lname'];
	 $Course = $_POST['Course'];
	 $email = $_POST['email'];
     $password = $_POST['password'];

	 $sql_query = "INSERT INTO ncclasses (fname, lname, Course, email, password)
	 VALUES ('$fname','$lname','$Course','$email','$email',$password)";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		include'successful.html';
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>
