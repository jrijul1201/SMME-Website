<?php
session_start();
if (!isset($_SESSION['faculty_index'])) {
    header('location:faculty.html');
}
$facultyIndex = $_SESSION['faculty_index'];
$data = file_get_contents('faculty.json');
$arr = json_decode($data, true);
$arr[$facultyIndex]["name"] = $_POST['name'];
$arr[$facultyIndex]["gs"] = $_POST['gslink'];
$arr[$facultyIndex]["irins"] = $_POST['irinsid'];
$arr[$facultyIndex]["phone"] = $_POST['phone'];
$arr[$facultyIndex]["post"] = $_POST['post'];
$arr[$facultyIndex]["speciality"] = $_POST['speciality'];
file_put_contents("faculty.json", json_encode($arr))
header('location:faculty.html');
?>