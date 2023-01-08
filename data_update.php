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
      $volume = $_POST['ivolume'][$index];
      $authors = $_POST['iauthors'][$index];
      $journal = $_POST['ijournal'][$index];
      $scopusC = $_POST['iscopusC'][$index];
      $crossrefC = $_POST['icrossrefC'][$index];
      $irinsIsHidden = ($_POST['irinsIsHidden'][$index] == "on") ? true : false;
      $temp = array('title' => $title, 'DOI' => $doi, 'year' => $year, 'publicationDate' => $pubDate, 'publicationType' => $pubType, 'pages' => $pages, 'volume' => $volume, 'authors' => $authors, 'journal' => $journal, 'scopusCitations' => $scopusC, 'crossrefCitations' => $crossrefC, 'isHidden' => $irinsIsHidden);
      $irinsPubInfo[] =  $temp;
    }
}
$arr[$facultyIndex]["irins_pub"] = $irinsPubInfo;

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