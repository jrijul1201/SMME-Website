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

$title = $_POST['ititle'];
$authors = $_POST['iauthors'];
$journal = $_POST['ijournal'];
$doi = $_POST['idoi'];
$year = $_POST['iyear'];
$pubDate = $_POST['ipubDate'];
$pubType = $_POST['ipubType'];
$pages = $_POST['ipages'];
$pages_v2 = str_replace('-', '&#8211;', $pages);
$volume = $_POST['ivolume'];
$scopusC = $_POST['iscopusC'];
$crossrefC = $_POST['icrossrefC'];
$irinsIsHidden = ($_POST['irinsIsHidden'] == "on") ? true : false;
$temp = array('title' => $title, 'DOI' => $doi, 'year' => $year, 'publicationDate' =>$pubDate, 'publicationType' => $pubType, 'pages' => $pages_v2, 'volume' => $volume,'authors' => $authors, 'journal' => $journal, 'scopusCitations' => $scopusC,'crossrefCitations' => $crossrefC, 'isHidden' => $irinsIsHidden);

$arr[$facultyIndex]["irins_pub"][] = $temp;
file_put_contents("faculty.json", json_encode($arr));

echo "<script>
alert('Publication added successfully.');
window.location.href='dashboard.php';
</script>";

?>