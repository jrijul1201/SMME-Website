<?php
session_start();

mysqli_report(MYSQLI_REPORT_OFF);
$con = @mysqli_connect('localhost', 'root');
if (!$con) {
    header('location:index.html');
    exit();
}

mysqli_select_db($con, 'signupdata');

$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];


$q = "SELECT * from signupdata where user_name = '$user_name' && user_password='$user_password' ";
$result = mysqli_query($con, $q);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

if ($num == 1) {

    $_SESSION['user_name'] = $user_name;

    header('location:dashboard.php');
    exit();

} else {
    echo "<script>alert('Incorrect username or password!!');
    window.location.href='index.html';
    </script>";
    exit();
}

?>