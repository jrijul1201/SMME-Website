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

// Updating Personal Info
$arr[$facultyIndex]["name"] = $_POST['name'];
$arr[$facultyIndex]["phone"] = $_POST['phone'];
$arr[$facultyIndex]["address"] = $_POST['address'];
$arr[$facultyIndex]["post"] = $_POST['post'];
$arr[$facultyIndex]["speciality"] = $_POST['speciality'];
$arr[$facultyIndex]["gs"] = $_POST['gslink'];
$arr[$facultyIndex]["irins"] = $_POST['irinsid'];
$arr[$facultyIndex]["personal_page_link"] = $_POST['pplink'];
$arr[$facultyIndex]["interests"] = $_POST['interests'];
$arr[$facultyIndex]["openings"] = $_POST['openings'];
$arr[$facultyIndex]["experiences"] = $_POST['experiences'];
$arr[$facultyIndex]["projects"] = $_POST['projects'];
$arr[$facultyIndex]["contributions"] = $_POST['contributions'];

//  Updating Education Info
$educationInfo = [];
if (isset($_POST['degree'])) {
  foreach ($_POST['degree'] as $index => $degree) {
    $degreeOther = ($degree == "Other") ? $_POST['degreeOther'][$index] : $degree;
    $specialization = $_POST['specialization'][$index];
    $start_year = $_POST['start_year'][$index];
    $end_year = $_POST['end_year'][$index];
    $start_year = ($start_year == $end_year) ? "" : $start_year;
    $place = $_POST['place'][$index];
    $other_info = $_POST['other_info'][$index];
    $edIsHidden = ($_POST['educationIsHidden'][$index] == "on") ? true : false;
    $temp = array('degree' => $degreeOther, 'specialization' => $specialization, 'start_year' => $start_year, 'end_year' => $end_year, 'place' => $place, 'other_info' => $other_info, 'isHidden' => $edIsHidden);
    if($specialization != "" || $start_year != "" || $end_year != "" || $place != "") {
      $educationInfo[] = $temp;
    }
  }
}

// if degrees are same then the latest entry of that education persists and other removed

$last_indexes = []; // store index of last occurrence of each degree

foreach ($educationInfo as $i => $degree) {
    if (isset($last_indexes[$degree["degree"]])) {
        $marked_for_deletion[] = $last_indexes[$degree["degree"]];
    }
    $last_indexes[$degree["degree"]] = $i;
}

// remove marked elements in reverse order to avoid index issues
if (isset($marked_for_deletion)) {
    rsort($marked_for_deletion);
    foreach ($marked_for_deletion as $index) {
        unset($educationInfo[$index]);
    }
}
$educationInfo = array_values($educationInfo);
$arr[$facultyIndex]["education"] = $educationInfo;

//  Updating Recognition Info
$recognitionInfo = [];
if (isset($_POST['achievement'])) {
  foreach ($_POST['achievement'] as $index => $achievement) {
    $achieveOther = ($achievement == "Other") ? $_POST['achieveOther'][$index] : $achievement;
    $description = $_POST['description2'][$index];
    $temp = array('achievement' => $achieveOther, 'description' => $description);
    if($description != "") {
      $recognitionInfo[] = $temp;
    }
  }
}

$arr[$facultyIndex]["recognition"] = $recognitionInfo;

//  Updating Patent Info
$patentInfo = [];
if (isset($_POST['title'])) {
  foreach ($_POST['title'] as $index => $title) {
    $inventors = $_POST['inventors'][$index];
    $applicationNumber = $_POST['applicationNumber'][$index];
    $applicationDate = $_POST['applicationDate'][$index];
    $patentStatus = $_POST['patentStatus'][$index];
    $patentStatusOther = ($patentStatus == "Other") ? $_POST['patentStatOther'][$index] : $patentStatus;
    $patentNumber = $_POST['patentNumber'][$index];
    $grantDate = $_POST['grantDate'][$index];
    $temp = array('applicationNumber' => $applicationNumber, 'title' => $title, 'inventors' => $inventors, 'patentStatus' => $patentStatusOther, 'patentNumber' => $patentNumber, 'applicationDate' => $applicationDate, 'grantDate' => $grantDate);
    $patentInfo[] = $temp;
  }
}

$arr[$facultyIndex]["patents"] = $patentInfo;

//  Updating IRINS Publications Info
// $irinsPubInfo = [];
// if (isset($_POST['ititle'])) {
//   foreach ($_POST['ititle'] as $index => $title) {

//     $doi = $_POST['idoi'][$index];
//     $year = $_POST['iyear'][$index];
//     $pubDate = $_POST['ipubDate'][$index];
//     $pubType = $_POST['ipubType'][$index];
//     $pages = $_POST['ipages'][$index];
//     $pages_v2 = str_replace('-', '&#8211;', $pages);
//     $volume = $_POST['ivolume'][$index];
//     $authors = $_POST['iauthors'][$index];
//     $journal = $_POST['ijournal'][$index];
//     $scopusC = $_POST['iscopusC'][$index];
//     $crossrefC = $_POST['icrossrefC'][$index];
//     $irinsIsHidden = ($_POST['irinsIsHidden'][$index] == "on") ? true : false;
//     $temp = array('title' => $title, 'DOI' => $doi, 'year' => $year, 'publicationDate' => $pubDate, 'publicationType' => $pubType, 'pages' => $pages_v2, 'volume' => $volume, 'authors' => $authors, 'journal' => $journal, 'scopusCitations' => $scopusC, 'crossrefCitations' => $crossrefC, 'isHidden' => $irinsIsHidden);
//     $irinsPubInfo[] = $temp;
//   }
// }
// $arr[$facultyIndex]["irins_pub"] = $irinsPubInfo;

file_put_contents("faculty.json", json_encode($arr));

echo "<script>
alert('Changes have been updated successfully. If unable to see the changes, then clear your browser cache');
window.location.href='dashboard.php';
</script>";

// header("Location: logout.php");
exit();
?>
