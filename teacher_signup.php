<?php
include('admin/dbcon.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$department_id = $_POST['department_id'];

$query = mysqli_query($conn,"SELECT * from teacher where  firstname='$firstname' and lastname='$lastname' and department_id = '$department_id'")or die(mysqli_error());
$row = mysqli_fetch_array($query);
$id = $row['teacher_id'];

$count = mysqli_num_rows($query);
if ($count > 0){
	mysqli_query($conn,"UPDATE teacher set username='$username',password = '$password', teacher_status = 'Registered' where teacher_id = '$id'")or die(mysqli_error());
	$_SESSION['id']=$id;
	echo 'true';
}else{
	echo 'false';
}
?>

<?php
include('dbcon.php');
if (isset($_POST['submit'])) 
{
	session_start();
	$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$department_id = $_POST['department_id'];

	$sql = "INSERT INTO teacher (username, password, firstname, lastname, department_id) VALUES ('$username', '$password', '$firstname', '$lastname', '$department_id');";
	$result = mysqli_query($conn, $sql);

	$query = mysqli_query($conn, "SELECT * from teacher where username='$username' and firstname='$firstname' and lastname='$lastname' and department_id = '$department_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
	$id = $row['teacher_id'];

	$count = mysqli_num_rows($query);
	if($count > 0){
		mysqli_query($conn,"UPDATE teacher set username='$username',password = '$password', teacher_status = 'Registered' where teacher_id = '$id'")or die(mysqli_error());
		$_SESSION['id']=$id;
		echo 'true';
		header("Location: dasboard_teacher.php?signup=success");
		exit();
	}
	else{
		echo 'false';
	}
}
?>