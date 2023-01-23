<?php
session_start();
if (!isset($_SESSION['faculty_index'])) {
    header('location:faculty.html');
}
$facultyIndex = $_SESSION['faculty_index'];
$data = file_get_contents('faculty.json');
$arr = json_decode($data, true);

// Updating Personal Info
$arr[$facultyIndex]["name"] = $_POST['name'];
$arr[$facultyIndex]["phone"] = $_POST['phone'];
$arr[$facultyIndex]["address"] = $_POST['address'];
$arr[$facultyIndex]["post"] = $_POST['post'];
$arr[$facultyIndex]["speciality"] = $_POST['speciality'];
$arr[$facultyIndex]["gs"] = $_POST['gslink'];
$arr[$facultyIndex]["irins"] = $_POST['irinsid'];
$arr[$facultyIndex]["personal_page_link"] = $_POST['pplink'];
$arr[$facultyIndex]["publications"] = $_POST['publications'];
$arr[$facultyIndex]["interests"] = $_POST['interests'];
$arr[$facultyIndex]["projects"] = $_POST['projects'];
$arr[$facultyIndex]["openings"] = $_POST['openings'];
$arr[$facultyIndex]["experiences"] = $_POST['experiences'];
$arr[$facultyIndex]["conferences"] = $_POST['conferences'];
$arr[$facultyIndex]["awards"] = $_POST['awards'];
$arr[$facultyIndex]["activity"] = $_POST['activity'];

//  Updating Education Info
$educationInfo = [];
if (isset($_POST['degree'])) {
    foreach ($_POST['degree'] as $index => $degree) {

      $duration = $_POST['duration'][$index];
      $place = $_POST['place'][$index];
      $thesisTitle = $_POST['thesisTitle'][$index];
      $edIsHidden = ($_POST['educationIsHidden'][$index] == "on") ? true : false;
      $temp = array('degree' => $degree, 'duration' => $duration, 'place' => $place, 'thesisTitle' => $thesisTitle, 'isHidden' => $edIsHidden);
      $educationInfo[] =  $temp;
    }
}
$arr[$facultyIndex]["education"] = $educationInfo;

//  Updating IRINS Publications Info
$irinsPubInfo = [];
if (isset($_POST['ititle'])) {
    foreach ($_POST['ititle'] as $index => $title) {

      $doi = $_POST['idoi'][$index];
      $year = $_POST['iyear'][$index];
      $pubDate = $_POST['ipubDate'][$index];
      $pubType = $_POST['ipubType'][$index];
      $pages = $_POST['ipages'][$index];
      $pages_v2 = str_replace('-', '&#8211;', $pages);
      $volume = $_POST['ivolume'][$index];
      $authors = $_POST['iauthors'][$index];
      $journal = $_POST['ijournal'][$index];
      $scopusC = $_POST['iscopusC'][$index];
      $crossrefC = $_POST['icrossrefC'][$index];
      $irinsIsHidden = ($_POST['irinsIsHidden'][$index] == "on") ? true : false;
      $temp = array('title' => $title, 'DOI' => $doi, 'year' => $year, 'publicationDate' => $pubDate, 'publicationType' => $pubType, 'pages' => $pages_v2, 'volume' => $volume, 'authors' => $authors, 'journal' => $journal, 'scopusCitations' => $scopusC, 'crossrefCitations' => $crossrefC, 'isHidden' => $irinsIsHidden);
      $irinsPubInfo[] =  $temp;
    }
}
$arr[$facultyIndex]["irins_pub"] = $irinsPubInfo;

file_put_contents("faculty.json", json_encode($arr));

header('location:faculty.html');
?>