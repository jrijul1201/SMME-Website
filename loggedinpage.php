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

    <style>
        input[type="file"]::-webkit-file-upload-button {
            display:none;
        }
    </style>
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
    <h3>Personal Information</h3>
    <form action="data_update.php" method="post" enctype="multipart/form-data">
        <label for="photo">
            <img src="assets/img/team/<?php echo $arr[$index]["img"]; ?>" title="Click to upload new photo" alt="<?php echo $arr[$index]["img"]; ?>" style="width:15%;height:15%;border-radius:50%;cursor:pointer";><br>
        </label>
        <input type="file" id="photo" name="photo" accept="image/*" size="1000000"><br><br> 
        
        <label for="fname">Name:</label>
        <input type="text" id="fname" name="name" value="<?php echo $arr[$index]["name"]; ?>"><br><br>
        
        <label for="phone">Phone:</label> +91-1905-
        <input type="text" id="phone" name="phone" size="6" value="<?php echo $arr[$index]["phone"]; ?>"><br><br>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" size="30" value="<?php echo $arr[$index]["address"]; ?>"><br><br>
        
        <label for="post">Designation:</label>
        <input type="text" id="post" name="post" value="<?php echo $arr[$index]["post"]; ?>"><br><br>
        
        <label for="speciality">Specialisation:</label>
        <input type="text" id="speciality" name="speciality" size="30" value="<?php echo $arr[$index]["speciality"]; ?>"><br><br>
        
        <label for="gslink">Google Scholar Link:</label>
        <input type="url" id="gslink" name="gslink" size="30" value="<?php echo $arr[$index]["gs"]; ?>"><br><br>
        
        <label for="irinsid">IRINS ID:</label>
        <input type="text" id="irinsid" name="irinsid" size="8" value="<?php echo $arr[$index]["irins"]; ?>"><br><br>
        
        <input type="submit" value="Update Changes">
    </form>
</body>

</html>