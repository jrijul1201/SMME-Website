<?php
session_start();
if (!isset($_SESSION['faculty_index'])) {
  header('location:faculty.html');
}
$facultyIndex = $_SESSION['faculty_index'];

// header("Cache-Control: no-cache, must-revalidate");
// ini_set('opcache.enable', 0);

$data = file_get_contents('faculty.json');
$arr = json_decode($data, true);

$index_pub = $_POST['index_pub'];
$title = $_POST['etitle'];
$authors = $_POST['eauthors'];
$journal = $_POST['ejournal'];
$doi = $_POST['edoi'];
$year = $_POST['eyear'];
$pubDate = $_POST['epubDate'];
$pubType = $_POST['epubType'];
$pages = $_POST['epages'];
$pages_v2 = str_replace('-', '&#8211;', $pages);
$volume = $_POST['evolume'];
$scopusC = $_POST['escopusC'];
$crossrefC = $_POST['ecrossrefC'];
$irinsIsHidden = false;
$temp = array('title' => $title, 'DOI' => $doi, 'year' => $year, 'publicationDate' =>$pubDate, 'publicationType' => $pubType, 'pages' => $pages_v2, 'volume' => $volume,'authors' => $authors, 'journal' => $journal, 'scopusCitations' => $scopusC,'crossrefCitations' => $crossrefC, 'isHidden' => $irinsIsHidden);


$arr[$facultyIndex]["irins_pub"][$index_pub] = $temp;
file_put_contents("faculty.json", json_encode($arr));

echo "<script>
alert('Publication edited successfully.');
window.location.href='dashboard.php';
</script>";

?>