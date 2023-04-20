<?php
session_start();
if (!isset($_SESSION['faculty_index'])) {
  header('location:faculty.html');
}
$facultyIndex = $_SESSION['faculty_index'];

header("Cache-Control: no-cache, must-revalidate");
ini_set('opcache.enable', 0);

$data = file_get_contents('faculty.json');
$arr = json_decode($data, true);

$indexToDelete = $_POST['index_delete'];
$irins_pub_array = $arr[$facultyIndex]["irins_pub"];

if (isset($irins_pub_array[$indexToDelete])) {
    unset($irins_pub_array[$indexToDelete]);
    $arr[$facultyIndex]["irins_pub"] = array_values($irins_pub_array);
    file_put_contents("faculty.json", json_encode($arr));
}

?>