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
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Update Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/download.png" rel="icon">
    <link href="assets/img/download.png" rel="apple-touch-icon">

    <script src="ckeditor/ckeditor.js"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" /> -->
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
    <!-- <script src="https://unpkg.com/dropzone"></script> -->
    <script src="https://unpkg.com/cropperjs"></script>

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <!-- <link href="assets/css/variables.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-green.css" rel="stylesheet"> -->
    <link href="assets/css/variables-orange.css" rel="stylesheet">
    <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

    <!-- ctalate Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- Partials loading script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script>
        $(function() {
            $("#head").load("header.html");
            $("#footer").load("footer.html");
            $("#hero").load("hero.html");
            $("#login-modal").load("login-modal.html");
            $("#about").load("about.html");
            $("#blog-posts").load("blog-posts.html");
            $("#clients").load("clients.html");
            $("#contact").load("contact.html");
            $("#cta").load("cta.html");
            $("#faq").load("faq.html");
            $("#featured-services").load("featured-services.html");
            $("#features").load("features.html");
            $("#fac-demo").load("fac-demo.html");
            $("#index").load("index.html");
            $("#on-focus").load("on-focus.html");
            $("#portfolio").load("portfolio.html");
            $("#pricing").load("pricing.html");
            $("#services").load("services.html");
            $("#team").load("team.html");
            $("#contact-us").load("contact-us.html");
            $("#testimonials").load("testimonials.html");
        });
    </script>

    <style>
        .image_area {
            position: relative;
            width: 15%;
            height: 15%;
        }

        img {
            display: block;
            max-width: 100%;
            cursor: pointer;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }

        .overlay {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.5);
            overflow: hidden;
            height: 0;
            transition: .5s ease;
            width: 100%;
        }

        .image_area:hover .overlay {
            height: 30%;
            cursor: pointer;
        }

        .text {
            color: #333;
            font-size: 15px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .dashboard {
            overflow: scroll;
        }

        /* table{
            position: absolute;
        } */
        td,
        th {
            /* position: absolute; */
            width: 200px !important;
            height: 30px !important;
            border: 0.5px solid gray !important;
        }

        .input-css {
            border: none !important;
            width: 100% !important;
            height: 100% !important;
        }

        .php-email-form {
            width: 90% !important;
            margin: auto;
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            align-items: center !important;
        }

        .profile-section {
            padding: 10px;
        }

        .edubtn {
            margin: 10px !important;
        }

        .delete-icon {
            color: orangered;
            cursor: pointer;
        }
       
.modal-pub {
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 0.4rem;
  width: 450px;
  padding: 1.3rem;
  min-height: 250px;
  float:center;
  /* position: absolute; */
  /* top: 20%; */
  background-color: white;
  border: 1px solid #ddd;
  border-radius: 15px;
}

.modal-pub .flex {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.modal-pub input {
  padding: 0.7rem 1rem;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 0.9em;
}

.modal-pub p {
  font-size: 0.9rem;
  color: #777;
  margin: 0.4rem 0 0.2rem;
}

button {
  cursor: pointer;
  border: none;
  font-weight: 600;
}

.btn-pub {
  display: inline-block;
  padding: 0.8rem 1.4rem;
  font-weight: 700;
  background-color: orangered;
  color: white;
  border-radius: 5px;
  text-align: center;
  font-size: 1em;
}

.btn-open {
  /* position: absolute; */
  /* bottom: 150px; */
}

.btn-close {
  /* transform: translate(10px, -20px); */
  padding: 0.5rem 0.7rem;
  background: #eee;
  border-radius: 50%;
}

/* .modal-pub {
  z-index: 2;
} */
.hidden {
  display: none;
}
    </style>

    <!-- show a textbox when other degree is selected in education section -->
    <script>
      
        function showOther(id) {
            let educationTable = document.getElementById(id);
            let degreeSelections = educationTable.getElementsByTagName("select");
            for (let i = 0; i < degreeSelections.length; i++) {
                let degreeSelection = degreeSelections[i];
                let degreeOther = degreeSelection.nextElementSibling;
                degreeSelection.addEventListener("change", function() {
                    if (degreeSelection.value === "Other") {
                        degreeOther.style.display = "inline";
                        deg
                        degreeOther.required = true;
                    } else {
                        degreeOther.style.display = "none";
                    }
                });
            }
        }

        function autoSelectOption(value, ind, first, other) {
            var found = false;
            var id = first.concat(ind);
            var select = document.getElementById(id);
            var options = select.options;
            for (var i = 0; i < options.length; i++) {
                if (options[i].value === value) {
                    select.selectedIndex = i;
                    found = true;
                    break;
                }
            }
            if (!found) {
                var id2 = other.concat(ind);
                var input = document.getElementById(id2);
                input.value = value;
                input.classList.add("input-css");
                input.style.display = "inline";
                select.selectedIndex = options.length - 1;
            }
        }

        window.addEventListener("load", function() {
            showOther("education-table");
            showOther("recognition-table");
        });
    </script>

</head>

<body>

    <div id="head"></div>
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

    <main id="main">
        <section id="dashboard" class="dashboard">

            <div class="section-header" style="margin-top:5vh;padding-bottom:0px;font-weight:700">
                <h2 style="padding-bottom:0px">Faculty Profile Form</h2>
            </div>
            <form method="post">
                <div class="image_area ">

                    <label for="upload_image">
                        <img src="assets/img/team/<?php echo $arr[$index]["img"]; ?>" id="uploaded_image" class="img-responsive img-circle" />
                        <div class="overlay">
                            <div class="text">Click to Change Profile Image</div>
                        </div>
                        <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                    </label>
                </div>
            </form>

            <!-- Crop Modal Code -->

            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crop Image Before Upload</h5>
                            <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="img-container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img src="" id="sample_image" />
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="crop" class="btn btn-primary">Crop</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <form action="logout.php" method="post">
                <button type="submit">Logout</button>
            </form> -->

            <!-- start here -->
            <!-- Personal info -->

            <form action="data_update.php" method="post" id="faculty_update" enctype="multipart/form-data" role="form" class="php-email-form">
                <div class="profile-section section-header">
                    <h3>Personal Information</h3>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="fname">Name:</label>
                            <input type="text" name="name" class="form-control" id="fname" value="<?php echo $arr[$index]["name"]; ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="phone">Phone:</label> +91-1905-
                            <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $arr[$index]["phone"]; ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="address" class="form-control" id="address" value="<?php echo $arr[$index]["address"]; ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="post">Designation:</label>
                            <input type="text" name="post" class="form-control" id="post" value="<?php echo $arr[$index]["post"]; ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="speciality">Specialisation:</label>
                            <input type="text" name="speciality" class="form-control" id="speciality" value="<?php echo $arr[$index]["speciality"]; ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="gslink">Google Scholar Link:</label>
                            <input type="text" name="gslink" class="form-control" id="gslink" value="<?php echo $arr[$index]["gs"]; ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="irinsid">IRINS ID:</label>
                            <input type="text" name="irinsid" class="form-control" id="irinsid" value="<?php echo $arr[$index]["irins"]; ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="pplink">Personal Page Link(if any):</label>
                            <input type="text" name="pplink" class="form-control" id="pplink" value="<?php echo $arr[$index]["personal_page_link"]; ?>">
                        </div>
                    </div>
                </div>
                <!-- Educational Details -->
                <div class="profile-section section-header">
                    <h3>Education Details</h3>
                    <div class="row">
                        <table id="education-table" class="text-center">
                            <tr>
                                <th>Degree</th>
                                <th>Specialization</th>
                                <th>Start Year</th>
                                <th>End Year</th>
                                <th>Place</th>
                                <th>Other Info</th>
                                <th>To Hide</th>
                                <th>Delete Action</th>
                            </tr>
                            <tbody>
                                <?php
                                foreach ($arr[$index]["education"] as $ind => $ed) {
                                    echo "<tr class='edutablerow'>";
                                    echo "<td><select class='input-css' id='eduDegree" . "$ind' name='degree[]' required>
                            <option value='' disabled selected>Select a Degree</option>
                            <option value='BTech'>BTech</option>
                            <option value='BTech - MTech (Dual)'>BTech - MTech (Dual)</option>
                            <option value='BSc'>BSc</option>
                            <option value='MTech'>MTech</option>
                            <option value='MSc'>MSc</option>
                            <option value='MS'>MS</option>
                            <option value='MTech - PhD'>MTech - PhD</option>
                            <option value='PhD'>PhD</option>
                            <option value='Masters'>Masters</option>
                            <option value='Bachelors'>Bachelors</option>
                            <option value='ME'>ME</option>
                            <option value='BE'>BE</option>
                            <option value='Other'>Other</option>
                        </select><input type='text' id='degreeOther" . "$ind' name='degreeOther[]' value='' style='display:none' ></td>";
                                    echo "<script>autoSelectOption('{$ed['degree']}', '$ind', 'eduDegree', 'degreeOther' );</script>";
                                    echo "<td><input type='text' class='input-css' name='specialization[]' value='{$ed['specialization']}'></td>";
                                    echo "<td><input type='text' class='input-css' name='start_year[]' value='{$ed['start_year']}' pattern='\d{4}' title='Enter valid year (4-digit)'></td>";
                                    echo "<td><input type='text' class='input-css' name='end_year[]' value='{$ed['end_year']}' pattern='\d{4}' title='Enter valid year (4-digit)'></td>";
                                    echo "<td><input type='text' class='input-css' name='place[]' value='{$ed['place']}' placeholder='University/College Name'></td>";
                                    echo "<td><input type='text' class='input-css' name='other_info[]' value='{$ed['other_info']}' placeholder='Thesis Title or Supervisor etc.'></td>";
                                    echo "<td><input type='checkbox' id='edCheckBox' name='edIsHidden[]' " . ($ed['isHidden'] ? "checked" : "") . "></td>";
                                    echo "<td><i class='fa fa-trash delete-icon' onclick='deleteEducation()'></i></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="text-center header">
                            <button type="button" class="dash-btn btn btn-getstarted " onclick="addEducation()">Add</button>
                        </div>
                    </div>
                </div>
                <!-- Recognition Details -->
                <div class="profile-section section-header">
                    <h3>Recognition Details</h3>
                    <div class="row">
                        <table id="recognition-table" class="text-center">
                            <tr>
                                <th>Achievement</th>
                                <th>Description</th>
                                <th>Delete Action</th>
                            </tr>
                            <tbody>
                                <?php
                                foreach ($arr[$index]["recognition"] as $ind => $rg) {
                                    echo "<tr class='edutablerow'>";
                                    echo "<td><select class='input-css' id='recAchieve" . "$ind' name='achievement[]' required>
                            <option value='' disabled selected>Select an Achievement</option>
                            <option value='Scholarships'>Scholarships</option>
                            <option value='Awards'>Awards</option>
                            <option value='Honours'>Honours</option>
                            <option value='Other'>Other</option>
                        </select><input type='text' id='achieveOther" . "$ind' name='achieveOther[]' value='' style='display:none'></td>";
                                    echo "<script>autoSelectOption('{$rg['achievement']}', '$ind', 'recAchieve', 'achieveOther');</script>";
                                    echo "<td><input type='text' class='input-css' name='description[]' value='{$rg['description']}'></td>";
                                    echo "<td><i class='fa fa-trash delete-icon' onclick='deleteRecognition()'></i></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="text-center header"><button type="button" class="dash-btn btn btn-getstarted" onclick="addRecognition()">Add</button></div>
                    </div>
                </div>
                <!-- Patent Details -->
                <div class="profile-section section-header">
                    <h3>Patent Details</h3>
                    <div class="row">
                        <table id="patent-table" class="text-center">
                            <tr>
                                <th>Title</th>
                                <th>Inventors</th>
                                <th>Application No.</th>
                                <th>Application Date</th>
                                <th>Patent Status</th>
                                <th>Patent No. (if granted)</th>
                                <th>Date of grant (if granted)</th>
                                <th>Delete Action</th>
                            </tr>
                            <tbody>
                                <?php
                                foreach ($arr[$index]["patents"] as $ind => $pt) {
                                    echo "<tr class='edutablerow'>";
                                    echo "<td><input type='text' class='input-css' name='title[]' value='{$pt['title']}' required></td>";
                                    echo "<td><input type='text' class='input-css' name='inventors[]' value='{$pt['inventors']}'></td>";
                                    echo "<td><input type='text' class='input-css' name='applicationNumber[]' value='{$pt['applicationNumber']}'></td>";
                                    echo "<td><input type='text' class='input-css' name='applicationDate[]' value='{$pt['applicationDate']}'></td>";
                                    echo "<td><select class='input-css' id='patentStat" . "$ind' name='patentStatus[]'>
                            <option value='' disabled selected>Select Patent Status</option>
                            <option value='granted'>Granted</option>
                            <option value='FER response submitted'>FER response submitted</option>
                            <option value='Hearing scheduled'>Hearing scheduled</option>
                            <option value='Deemed to be withdrawn u/s 11B(4)'>Deemed to be withdrawn u/s 11B(4)</option>
                            <option value='FER issued'>FER issued</option>
                            <option value='Awaiting Examination'>Awaiting Examination</option>
                            <option value='Reply not Filed Deemed to be abandoned U/s 21(1)'>Reply not Filed Deemed to be abandoned U/s 21(1)</option>
                            <option value='Filed (Provisional)'>Filed (Provisional)</option>
                            <option value='Other'>Other</option>
                        </select><input type='text' id='patentStatOther" . "$ind' name='patentStatOther[]' value='' style='display:none'></td>";
                                    echo "<script>autoSelectOption('{$pt['patentStatus']}', '$ind', 'patentStat', 'patentStatOther');</script>";
                                    echo "<td><input type='text' class='input-css' name='patentNumber[]' value='{$pt['patentNumber']}'></td>";
                                    echo "<td><input type='text' class='input-css' name='grantDate[]' value='{$pt['grantDate']}'></td>";
                                    echo "<td><i class='fa fa-trash delete-icon' onclick='deletePatent()'></i></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="text-center header"><button type="button" class="dash-btn btn btn-getstarted" onclick="addPatent()">Add</button></div>
                    </div>
                </div>
                <!-- Text Areas -->
                <div class="profile-section section-header">
                    <div class="row">
                        <!-- <div class="form-group mt-3 md-6">
                            <h3>Publications:</h3>
                            <textarea class="form-control"
                                name="publications"><?php echo $arr[$index]["publications"]; ?></textarea>
                        </div> -->
                        <div class="form-group mt-3 md-6">
                            <h3>Research Interests</h3>
                            <textarea class="form-control" name="interests"><?php echo $arr[$index]["interests"]; ?></textarea>
                        </div>
                        <!-- <div class="form-group mt-3 md-6">
                            <h3>Current Projects:</h3>
                            <textarea class="form-control"
                                name="projects"><?php echo $arr[$index]["projects"]; ?></textarea>
                        </div> -->
                        <div class="form-group mt-3 md-6">
                            <h3>Current Openings for research</h3>
                            <textarea class="form-control" name="openings"><?php echo $arr[$index]["openings"]; ?></textarea>
                        </div>
                        <div class="form-group mt-3 md-6">
                            <h3>Work Experiences</h3>
                            <textarea class="form-control" name="experiences"><?php echo $arr[$index]["experiences"]; ?></textarea>
                        </div>
                        <!-- <div class="form-group mt-3 md-6">
                            <h3>Conferences:</h3>
                            <textarea class="form-control"
                                name="conferences"><?php echo $arr[$index]["conferences"]; ?></textarea>
                        </div> -->
                        <!-- <div class="form-group mt-3 md-6">
                            <h3>Scholarships, Awards, Honours, and Invited Talks:</h3>
                            <textarea class="form-control"
                                name="awards"><?php echo $arr[$index]["awards"]; ?></textarea>
                        </div> -->
                        <!-- <div class="form-group mt-3 md-6">
                            <h3>Other Activities:</h3>
                            <textarea class="form-control"
                                name="activity"><?php echo $arr[$index]["activity"]; ?></textarea>
                        </div> -->
                    </div>
                </div>
                <!-- IRINS Publications -->

                <div class="profile-section section-header">
                    <h3>IRINS Publications Details</h3>
                    <small  style="justify-content:center"><i>
                            <?php echo htmlspecialchars("Note: In Title, use 'sub' tag (<sub> and </sub>) for subscript eg. CO2 should be written as CO<sub>2</sub>", ENT_QUOTES); ?>
                        </i></small><br>
                        <br/>
                        <!-- <div class="text-center header"> -->
                        <!-- <button type="button" class="dash-btn btn btn-getstarted " onclick="addIRINSPub()">Add Publication</button> -->
                    <!-- </div><br> -->
                    <div class="text-center header"><button type="button" class="btn-open dash-btn btn btn-getstarted" >Add Publication</button></div>
                    <center>
                     <section class='modal-pub hidden'>
                    <div class='flex'>
                        <button style='float:right' class='btn-close'>⨉</button>
                    </div><br>
                    <div>
                        <h4>Add Publication</h4>
                    </div>
                    <div class="row">
                    <div class="col">Title
                    <input type='text' id='title'/></div>
                    <div class="col">  DOI
                    <input type='text' id='doi' /></div>
                    <div class="col"> Year
                    <input type='text' id='year' /></div>
                    <div class="col">Publication-Date
                    <input type='text' id='pub_date' /></div>
                    <div class="col">Publication-Type
                    <input type='text' id='pub_type' /></div>
                    <div class="col">Pages
                    <input type='text' id='pages' /></div>
                    <div class="col">Volume
                    <input type='text' id='volume' /></div>
                    <div class="col">Authors
                    <input type='text' id='authors' /></div>
                    <div class="col">Scopus
                    <input type='text' id='scopus' /></div>
                    <div class="col">CrossRef
                    <input type='text' id='crossref' /></div>
                    </div>
                    <div class="text-center header"><button type="button" class="dash-btn btn btn-getstarted" >Submit</button>
                    </section>
                            </center>
                    <div class='overlay-form hidden'></div>
                   <br>

                        <table id="irins-pub-table" class="text-center">
                            <tr>
                                <th>Title</th>
                                <th>DOI</th>
                                <th>Year</th>
                                <th>Publication Date</th>
                                <th>Publication Type</th>
                                <th>pages</th>
                                <th>Volume</th>
                                <th>Authors</th>
                                <th>Journal</th>
                                <th>scopus</th>
                                <th>CrossRef</th>
                                <th>IsHidden</th>
                            </tr>
                            <tbody>
                            </tbody>
                            </table><br>
                           

                           <div id="irins-pub" class="row">
                          
                        <?php
                        foreach ($arr[$index]["irins_pub"] as $ipub) {
                            $publicationType = '';
                            $title = '';
                            $subtitle = '';
                            $authors = '';
                            $journal = '';
                            $DOI = '';
                            $id='';
                            if (isset($ipub['title']) && $ipub['title'] != 'NA') {
                                $title = $ipub['title'] . " ";
                            }
                            if (isset($ipub['title']) && $ipub['title'] != 'NA') {
                                $subtitle = strtoupper($ipub['journal']);
                            }
                            if (isset($ipub['authors']) && $ipub['authors'] != 'NA') {
                                $authors = $ipub['authors'];
                            }
                            if (isset($ipub['volume']) && $ipub['year'] != 'NA') {
                                $journal = $journal . $ipub['year'] . '; ';
                            }
                            if (isset($ipub['year']) && $ipub['volume'] != 'NA') {
                                $journal = $journal . $ipub['volume'] . ': ';
                            }
                            if (isset($ipub['pages']) && $ipub['pages'] != 'NA') {
                                $journal = $journal . $ipub['pages'];
                            }
                            if (isset($ipub['DOI']) && $ipub['DOI'] != 'NA') {
                                $DOI = $ipub['DOI'];
                            }
                            if (isset($ipub['id']) && $ipub['id'] != 'NA') {
                                $id = $ipub['id'];
                            }
                            $comp = "
                            
                          <div id='$id' class='col-md-12 plates'>
                                        <div class='row g-0 overflow-hidden flex-md-row mb-0 h-md-250 position-relative'>
                                            <div class='col d-flex flex-column section-header position-static plate-child'>
                                                <h4 class='mb-1'>
                                                    $title <br/>
                                                    <i style='float:right' class='fa fa-trash delete-icon' onclick=deleteIRINSPub('$id')></i><br><br>
                                                    <i style='float:right' class='bi bi-pencil-square delete-icon' onclick=editIRINSPub('$id')></i>
                                                    <span style='font-size:15px; font-style: italic;' class='text-muted'>
                                                        $subtitle
                                                </h4>
                                                
                                                <p class='card-text mb-auto'>
                                                    $authors
                                                </p>
                                                <p class='mb-auto text-muted'>
                                                    $journal
                                                </p>
                                                <p class='text-primary' style='font-size:1rem'>
                                                    <a href='https://doi.org/$DOI' target='_blank'>$DOI</a>
                                                </p>
                                            </div>
                                        </div>
                                       
                                    </div>
                                 
                                                               
                                    ";
                            echo $comp;
                        }

                        // echo "<button>Add Publications</button>"
                        ?>
                        <!-- $id1="test" -->
                      
                    </div>

                    <div class="text-center header"><button type="submit" class="dash-btn btn btn-getstarted">Update Changes</button></div>
                </div>
            </form>

        </section>

    </main><!-- End #main -->

    <div id="footer"></div>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script>  -->

    <!-- ctalate Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- Font Awesome Icons -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</body>

</html>

<!-- Cropping functionality enable script -->
<script>
const modal = document.querySelector(".modal-pub");
const overlay = document.querySelector(".overlay-form");
const openModalBtn = document.querySelector(".btn-open");
const closeModalBtn = document.querySelector(".btn-close");
const openModal = function () {
  modal.classList.remove("hidden");
//   overlay.classList.remove("hidden");
};
openModalBtn.addEventListener("click", openModal);

const closeModal = function () {
  modal.classList.add("hidden");
//   overlay.classList.add("hidden");
};
closeModalBtn.addEventListener("click", closeModal);

    $(document).ready(function() {

        var $modal = $('#modal');

        var image = document.getElementById('sample_image');

        var cropper;

        $('#upload_image').change(function(event) {
            var files = event.target.files;

            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };

            if (files && files.length > 0) {
                reader = new FileReader();
                reader.onload = function(event) {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $('#crop').click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 400
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    $.ajax({
                        url: 'upload.php',
                        method: 'POST',
                        data: {
                            image: base64data
                        },
                        success: function(data) {
                            // console.log(data);
                            $modal.modal('hide');
                            $('#uploaded_image').attr('src', data);
                        }
                    });
                };
            });
        });

    });
</script>

<script>
    // CKEDITOR.replace("publications");
    CKEDITOR.replace("interests");
    // CKEDITOR.replace("projects");
    CKEDITOR.replace("openings");
    CKEDITOR.replace("experiences");
    // CKEDITOR.replace("conferences");
    // CKEDITOR.replace("awards");
    // CKEDITOR.replace("activity");

    function addEducation() {
        var table = document.getElementById("education-table");
        var row = table.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);
        var cell8 = row.insertCell(7);
        cell1.innerHTML = `<select name="degree[]" class='input-css' required>
                        <option value="" disabled selected>Select a Degree</option>
                        <option value="BTech">BTech</option>
                        <option value="BTech - MTech (Dual)">BTech - MTech (Dual)</option>
                        <option value="BSc">BSc</option>
                        <option value="MTech">MTech</option>
                        <option value="MSc">MSc</option>
                        <option value="MS">MS</option>
                        <option value="MTech - PhD">MTech - PhD</option>
                        <option value="PhD">PhD</option>
                        <option value="Masters">Masters</option>
                        <option value="Bachelors">Bachelors</option>
                        <option value="ME">ME</option>
                        <option value="BE">BE</option>
                        <option value="Other">Other</option>
                    </select><input type="text" name="degreeOther[]" value="" style="display:none">`;
        cell2.innerHTML = `<input type="text" class='input-css' name="specialization[]">`;
        cell3.innerHTML = `<input type="text" class='input-css' name="start_year[]" pattern="\\d{4}" title="Enter valid year (4-digit)">`;
        cell4.innerHTML = `<input type="text" class='input-css' name="end_year[]" pattern="\\d{4}" title="Enter valid year (4-digit)">`;
        cell5.innerHTML = `<input type="text" class='input-css' name="place[]" placeholder="University/College Name">`;
        cell6.innerHTML = `<input type="text" class='input-css' name="other_info[]" placeholder="Thesis Title or Supervisor etc.">`;
        cell7.innerHTML = `<input type="checkbox" id="edCheckBox" name="edIsHidden[]">`;
        cell8.innerHTML = `<i class='fa fa-trash delete-icon' onclick="deleteEducation()"></i>`;
        showOther("education-table");

    }

    function deleteEducation() {
        var table = document.getElementById("education-table");

        table.addEventListener('click', event => {
            // Check if the clicked element is a delete button
            if (event.target.classList.contains('delete-icon')) {
                // Get the row to delete
                var row = event.target.closest('tr');
                row.remove();
            }
        });
    }

    function addRecognition() {
        var table = document.getElementById("recognition-table");
        var row = table.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        cell1.innerHTML = `<select name="achievement[]" class='input-css' required>
                        <option value="" disabled selected>Select an Achievement</option>
                        <option value="Scholarships">Scholarships</option>
                        <option value="Awards">Awards</option>
                        <option value="Honours">Honours</option>
                        <option value="Other">Other</option>
                    </select><input type="text" name="achieveOther[]" value="" style="display:none">`;
        cell2.innerHTML = `<input type="text" class='input-css' name="description[]">`;
        cell3.innerHTML = `<i class='fa fa-trash delete-icon' onclick="deleteRecognition()"></i>`;
        showOther("recognition-table");

    }

    function deleteRecognition() {
        var table = document.getElementById("recognition-table");

        table.addEventListener('click', event => {
            // Check if the clicked element is a delete button
            if (event.target.classList.contains('delete-icon')) {
                // Get the row to delete
                var row = event.target.closest('tr');
                row.remove();
            }
        });
    }

    function addPatent() {
        var table = document.getElementById("patent-table");
        var row = table.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);
        var cell8 = row.insertCell(7);

        
        cell1.innerHTML = `<input type='text' class='input-css' name='title[]' required>`;
        cell2.innerHTML = `<input type='text' class='input-css' name='inventors[]'>`;
        cell3.innerHTML = `<input type='text' class='input-css' name='applicationNumber[]'>`;
        cell4.innerHTML = `<input type='text' class='input-css' name='applicationDate[]'>`;
        cell5.innerHTML = `<select name="patentStatus[]" class='input-css'>
                            <option value='' disabled selected>Select Patent Status</option>
                            <option value='granted'>Granted</option>
                            <option value='FER response submitted'>FER response submitted</option>
                            <option value='Hearing scheduled'>Hearing scheduled</option>
                            <option value='Deemed to be withdrawn u/s 11B(4)'>Deemed to be withdrawn u/s 11B(4)</option>
                            <option value='FER issued'>FER issued</option>
                            <option value='Awaiting Examination'>Awaiting Examination</option>
                            <option value='Reply not Filed Deemed to be abandoned U/s 21(1)'>Reply not Filed Deemed to be abandoned U/s 21(1)</option>
                            <option value='Filed (Provisional)'>Filed (Provisional)</option>
                            <option value='Other'>Other</option>
                    </select><input type="text" name="patentStatOther[]" value="" style="display:none">`;
        cell6.innerHTML = `<input type='text' class='input-css' name='patentNumber[]'>`;
        cell7.innerHTML = `<input type='text' class='input-css' name='grantDate[]'>`;
        cell8.innerHTML = `<i class='fa fa-trash delete-icon' onclick="deletePatent()"></i>`;

        showOther("patent-table");

    }

    function deletePatent() {
        var table = document.getElementById("patent-table");

        table.addEventListener('click', event => {
            // Check if the clicked element is a delete button
            if (event.target.classList.contains('delete-icon')) {
                // Get the row to delete
                var row = event.target.closest('tr');
                row.remove();
            }
        });
    }

    function addIRINSPub() {
        var table = document.getElementById("irins-pub-table");
        var row = table.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);
        var cell8 = row.insertCell(7);
        var cell9 = row.insertCell(8);
        var cell10 = row.insertCell(9);
        var cell11 = row.insertCell(10);
        var cell12 = row.insertCell(11);
        cell1.innerHTML = `<input type="text" class='input-css' name="ititle[]" required>`;
        cell2.innerHTML = `<input type="text" class='input-css' name="idoi[]">`;
        cell3.innerHTML = `<input type="text" class='input-css' name="iyear[]" pattern="\\d{4}" title="Enter valid year (4-digit)">`;
        cell4.innerHTML = `<input type="text" class='input-css' name="ipubDate[]">`;
        cell5.innerHTML = `<input type="text" class='input-css' name="ipubType[]">`;
        cell6.innerHTML = `<input type="text" class='input-css' name="ipages[]">`;
        cell7.innerHTML = `<input type="text" class='input-css' name="ivolume[]">`;
        cell8.innerHTML = `<input type="text" class='input-css' name="iauthors[]">`;
        cell9.innerHTML = `<input type="text" class='input-css' name="ijournal[]">`;
        cell10.innerHTML = `<input type="text" class='input-css' name="iscopusC[]">`;
        cell11.innerHTML = `<input type="text" class='input-css' name="icrossrefC[]">`;
        cell12.innerHTML = `<input type="checkbox" id="iCheckBox" name="iIsHidden[]">`;
        if (table.rows.length >= 1) {
            document.getElementById("delIPB").disabled = false;
        }

    }

    function deleteIRINSPub(id) {
        var card = document.getElementById(id).remove();

    }
    function editIRINSPub(id) {
        var card = document.getElementById(id).remove();

    }
   

    // this is for getting the info of all the To_Hide checkboxes

    document.getElementById('faculty_update').addEventListener('submit', function(event) {
        var edcheckboxes = this.querySelectorAll('input#edCheckBox');

        // Add a hidden field for each education block checkbox
        for (var i = 0; i < edcheckboxes.length; i++) {
            var hiddenField = document.createElement('input');
            hiddenField.setAttribute('type', 'hidden');
            hiddenField.setAttribute('name', 'educationIsHidden[]');
            hiddenField.setAttribute('value', edcheckboxes[i].checked ? 'on' : 'off');
            this.appendChild(hiddenField);
        }

        var irinscheckboxes = this.querySelectorAll('input#iCheckBox');

        // Add a hidden field for each irins pub block checkbox
        for (var i = 0; i < irinscheckboxes.length; i++) {
            var hiddenField2 = document.createElement('input');
            hiddenField2.setAttribute('type', 'hidden');
            hiddenField2.setAttribute('name', 'irinsIsHidden[]');
            hiddenField2.setAttribute('value', irinscheckboxes[i].checked ? 'on' : 'off');
            this.appendChild(hiddenField2);
        }
    });
</script>