<?php
include('dbcon.php');
if (isset($_POST['submit'])) 
{
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$class_id = $_POST['class_id'];

	$sql = "INSERT INTO student (firstname, lastname, class_id, username, password) VALUES ('$firstname', '$lastname', '$class_id', '$username', '$password');";
	$result = mysqli_query($conn, $sql);

	$query = mysqli_query($conn, "select * from student where username='$username' and firstname='$firstname' and lastname='$lastname' and class_id = '$class_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
	$id = $row['student_id'];
	$count = mysqli_num_rows($query);

	if($count > 0){
		mysqli_query($conn,"UPDATE student set status = 'Registered' where student_id = '$id'")or die(mysqli_error());
		$_SESSION['id']=$id;
		echo 'true';
		header("Location: dashboard_student.php?signup=success");
		exit();
	}
	else{
		echo 'false';
	}
	/*$query = mysqli_query($conn, "select * from student where username='$username' and firstname='$firstname' and lastname='$lastname' and class_id = '$class_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
	$id = $row['student_id'];
	$count = mysqli_num_rows($query);
	if ($count > 0){
		mysqli_query($conn,"update student set password = '$password', status = 'Registered' where student_id = '$id'")or die(mysqli_error());
		$_SESSION['id']=$id;
		echo 'true';
		header("Location: ../dashboard_student.php?signup=success");
		exit();
	}else{
	echo 'false';
	}*/
}
?>