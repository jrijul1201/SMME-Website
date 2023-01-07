<?php
session_start();
if (!isset($_SESSION['faculty_index'])) {
    header('location:faculty.html');
}
$facultyIndex = $_SESSION['faculty_index'];
$data = file_get_contents('faculty.json');
$arr = json_decode($data, true);
$arr[$facultyIndex]["name"] = $_POST['name'];
$arr[$facultyIndex]["phone"] = $_POST['phone'];
$arr[$facultyIndex]["address"] = $_POST['address'];
$arr[$facultyIndex]["post"] = $_POST['post'];
$arr[$facultyIndex]["speciality"] = $_POST['speciality'];
$arr[$facultyIndex]["gs"] = $_POST['gslink'];
$arr[$facultyIndex]["irins"] = $_POST['irinsid'];
file_put_contents("faculty.json", json_encode($arr));

//code for changing the photo
$target_dir = "assets/img/team/";
$fileName = basename($_FILES["photo"]["name"]);
$imageFileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
$target_file = $target_dir . $arr[$facultyIndex]["img"];
$uploadOk = 0;

// var_dump($_FILES["photo"]);

// Check if image file is a actual image or fake image
if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {
    $uploadOk = 1;
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    // var_dump($check);
    if($check === false) {
        $uploadOk = 0;
    } 

    // Allow certain file formats
    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check file size
    elseif ($_FILES["photo"]["size"] > 1000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} elseif(!move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    echo "Sorry, there was an error uploading your file.";
}

header('location:faculty.html');
?>