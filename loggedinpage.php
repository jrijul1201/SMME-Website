<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('location:faculty.html');
}
$userName = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form - SMME</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/download.png" rel="icon">
    <link href="assets/img/download.png" rel="apple-touch-icon">
</head>

<body>
    <?php

    $data = file_get_contents('faculty.json');
    $arr = json_decode($data, true);
    $index = 0;
    foreach ($arr as $key => $value) {
        if ($value["mail"] == $userName) {
            $index = $key;
            break;
        }
    }
    $_SESSION['faculty_index'] = $index;

    ?>
    <div class="background">
        <h1 style="text-align:center;"> Welcome,
            <?php echo $arr[$index]["name"]; ?>. You are successfully logged in
        </h1>
        <center><a href="logout.php"
                style="cursor:pointer;padding:10px 20px; color:white; background:black; border-radius:3px; text-decoration:none;">LOGOUT</a>
        </center>
    </div>
    <form action="data_update.php" method="post">
        <label for="fname">Name:</label>
        <input type="text" id="fname" name="name" value="<?php echo $arr[$index]["name"]; ?>"><br><br>
        <label for="gslink">Google Scholar Link:</label>
        <input type="url" id="gslink" name="gslink" value="<?php echo $arr[$index]["gs"]; ?>"><br><br>
        <label for="irinsid">IRINS ID:</label>
        <input type="text" id="irinsid" name="irinsid" value="<?php echo $arr[$index]["irins"]; ?>"><br><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $arr[$index]["phone"]; ?>"><br><br>
        <label for="post">Post:</label>
        <input type="text" id="post" name="post" value="<?php echo $arr[$index]["post"]; ?>"><br><br>
        <label for="speciality">Speciality:</label>
        <input type="text" id="speciality" name="speciality" value="<?php echo $arr[$index]["speciality"]; ?>"><br><br>

        <input type="submit" value="Update Changes">
    </form>
</body>

</html>