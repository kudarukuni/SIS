<?php
session_start(); 

/*if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {

?>

<script>
window.location = "index.php";
</script>

<?php
}*/

if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
    header("location: index.php");
    exit();
}

$session_id = $_SESSION['id'];
?>
