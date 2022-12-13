<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('location:index.html');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <div class="background">
        <h1 style="text-align:center;"> Welcome,
            <?php echo $_SESSION['user_name']; ?>. You are successfully logged in
        </h1>
        <center><a href="logout.php"
                style="cursor:pointer;padding:10px 20px; color:white; background:black; border-radius:3px; text-decoration:none;">LOGOUT</a>
        </center>
    </div>
</body>

</html>