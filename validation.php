<?php

session_start();
$con = mysqli_connect('localhost','root');
if($con)
{
    echo "Connection Successful";
}
else{
    $_SESSION['validation_status'] = false;
    echo "no connection";
}

mysqli_select_db($con, 'signup');

$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];


$q = "SELECT * from signupdata where user_name = '$user_name' && user_password='$user_password' ";
$result = mysqli_query($con, $q);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

if ($num == 1) {

    $_SESSION['user_name'] = $user_name;
    $_SESSION['validation_status'] = true;
    
    header('location:loggedinpage.php');
    exit();

}
else{
    $_SESSION['validation_status'] = false;
    exit();
}

?>