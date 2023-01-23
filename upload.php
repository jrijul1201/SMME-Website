<?php

session_start();
if (!isset($_SESSION['faculty_index'])) {
    header('location:faculty.html');
}
$facultyIndex = $_SESSION['faculty_index'];
$data = file_get_contents('faculty.json');
$arr = json_decode($data, true);

if(isset($_POST['image']))
{
	$data = $_POST['image'];
	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
	$data = base64_decode($image_array_2[1]);
    $target_dir = "assets/img/team/";
    $old_image_path = $target_dir. $arr[$facultyIndex]["img"];
    $new_image_name = time() . $arr[$facultyIndex]["img"];
    $new_image_path = $target_dir . $new_image_name;
	file_put_contents($new_image_path, $data);

    //deleting old image
    if(file_exists($old_image_path)){
        unlink($old_image_path);
    }

    //changing img of faculty.json to the new photo
    $arr[$facultyIndex]["img"] = $new_image_name;
    file_put_contents("faculty.json", json_encode($arr));

	echo $new_image_path;
}

?>