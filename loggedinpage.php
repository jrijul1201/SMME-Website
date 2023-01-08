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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form - SMME</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/download.png" rel="icon">
    <link href="assets/img/download.png" rel="apple-touch-icon">

    <script src="ckeditor/ckeditor.js"></script>

    <style>
        input[type="file"]::-webkit-file-upload-button {
            display:none;
        }
    </style>
</head>

<body>
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
    <h1 style="text-align:center">Faculty Profile Form</h1>
    <form action="logout.php" method="post">
        <input style="float:right" type="submit" value="Logout">
    </form>
    
    <h3>Personal Information:</h3>
    <form action="data_update.php" method="post" id="faculty_update" enctype="multipart/form-data">
        <label for="photo">
            <img src="assets/img/team/<?php echo $arr[$index]["img"]; ?>" title="Click to upload new photo" alt="<?php echo $arr[$index]["img"]; ?>" style="width:15%;height:15%;border-radius:50%;cursor:pointer";><br>
        </label>
        <input type="file" id="photo" name="photo" accept="image/*" size="1000000"><br><br> 
        
        <label for="fname">Name:</label>
        <input type="text" id="fname" name="name" value="<?php echo $arr[$index]["name"]; ?>"><br><br>
        
        <label for="phone">Phone:</label> +91-1905-
        <input type="text" id="phone" name="phone" size="6" value="<?php echo $arr[$index]["phone"]; ?>"><br><br>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" size="30" value="<?php echo $arr[$index]["address"]; ?>"><br><br>
        
        <label for="post">Designation:</label>
        <input type="text" id="post" name="post" value="<?php echo $arr[$index]["post"]; ?>"><br><br>
        
        <label for="speciality">Specialisation:</label>
        <input type="text" id="speciality" name="speciality" size="30" value="<?php echo $arr[$index]["speciality"]; ?>"><br><br>
        
        <label for="gslink">Google Scholar Link:</label>
        <input type="url" id="gslink" name="gslink" size="30" value="<?php echo $arr[$index]["gs"]; ?>"><br><br>
        
        <label for="irinsid">IRINS ID:</label>
        <input type="text" id="irinsid" name="irinsid" size="8" value="<?php echo $arr[$index]["irins"]; ?>"><br><br>

        <label for="pplink">Personal Page Link (if any):</label>
        <input type="url" id="pplink" name="pplink" size="20" value="<?php echo $arr[$index]["personal_page_link"]; ?>"><br><br>
        
        <h3>Education Details:</h3><br>
        <table id="education-table">
            <tr>
                <th>Degree</th>
                <th>Duration</th>
                <th>Place</th>
                <th>Thesis Title (if any)</th>
                <th>To Hide</th>
            </tr>
            <tbody>
                <?php
                foreach ($arr[$index]["education"] as $ed) {
                    echo "<tr>";
                    echo "<td><input type='text' name='degree[]' value='{$ed['degree']}' required></td>";
                    echo "<td><input type='text' name='duration[]' value='{$ed['duration']}'></td>";
                    echo "<td><input type='text' name='place[]' value='{$ed['place']}'></td>";
                    echo "<td><input type='text' name='thesisTitle[]' value='{$ed['thesisTitle']}'></td>";
                    echo "<td><input type='checkbox' id='edCheckBox' name='edIsHidden[]' " . ($ed['isHidden'] ? "checked" : "") ."></td>";  
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <button type="button" onclick="addEducation()">Add</button>
        <button type="button" id="delEB" onclick="deleteEducation()">Delete</button><br><br>

        <h3>Publications:</h3>
        <textarea name="publications"><?php echo $arr[$index]["publications"]; ?></textarea>
        <h3>Reasearch Interests:</h3>
        <textarea name="interests"><?php echo $arr[$index]["interests"]; ?></textarea>
        <h3>Current Projects:</h3>
        <textarea name="projects"><?php echo $arr[$index]["projects"]; ?></textarea>
        <h3>Current Openings for Reasearch:</h3>
        <textarea name="openings"><?php echo $arr[$index]["openings"]; ?></textarea>
        <h3>Work Experiences:</h3>
        <textarea name="experiences"><?php echo $arr[$index]["experiences"]; ?></textarea>
        <h3>Conferences:</h3>
        <textarea name="conferences"><?php echo $arr[$index]["conferences"]; ?></textarea>
        <h3>Scholarships, Awards, Honors, and Invited Talks:</h3>
        <textarea name="awards"><?php echo $arr[$index]["awards"]; ?></textarea>
        <h3>Other Activities:</h3>
        <textarea name="activity"><?php echo $arr[$index]["activity"]; ?></textarea>

        <h3>IRINS Publications Details:</h3><br>
        <table id="irins-pub-table">
            <tr>
                <th>Title</th>
                <th>DOI</th>
                <th>Year</th>
                <th>Publication Date</th>
                <th>Publication Type</th>
                <th>Pages</th>
                <th>Volume</th>
                <th>Authors</th>
                <th>Journal</th>
                <th>Scopus Citations</th>
                <th>Cross Ref Citations</th>
                <th>To Hide</th>
            </tr>
            <tbody>
                <?php
                foreach ($arr[$index]["irins_pub"] as $ipub) {
                    echo "<tr>";
                    echo "<td><input type='text' name='ititle[]' value='{$ipub['title']}' required></td>";
                    echo "<td><input type='text' name='idoi[]' value='{$ipub['DOI']}'></td>";
                    echo "<td><input type='text' name='iyear[]' pattern='\d{4}' title='Enter valid year (4-digit)' value='{$ipub['year']}'></td>";
                    echo "<td><input type='text' name='ipubDate[]' value='{$ipub['publicationDate']}'></td>";
                    echo "<td><input type='text' name='ipubType[]' value='{$ipub['publicationType']}'></td>";
                    echo "<td><input type='text' name='ipages[]' value='{$ipub['pages']}'></td>";
                    echo "<td><input type='text' name='ivolume[]' value='{$ipub['volume']}'></td>";
                    echo "<td><input type='text' name='iauthors[]' value='{$ipub['authors']}'></td>";
                    echo "<td><input type='text' name='ijournal[]' value='{$ipub['journal']}'></td>";
                    echo "<td><input type='text' name='iscopusC[]' value='{$ipub['scopusCitations']}'></td>";
                    echo "<td><input type='text' name='icrossrefC[]' value='{$ipub['crossrefCitations']}'></td>";
                    echo "<td><input type='checkbox' id='iCheckBox' name='iIsHidden[]' " . ($ipub['isHidden'] ? "checked" : "") ."></td>";  
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <button type="button" onclick="addIRINSPub()">Add</button>
        <button type="button" id="delIPB" onclick="deleteIRINSPub()">Delete</button><br><br>

        <input type="submit" value="Update Changes">
    </form>

    <script>
        CKEDITOR.replace("publications");
        CKEDITOR.replace("interests");
        CKEDITOR.replace("projects");
        CKEDITOR.replace("openings");
        CKEDITOR.replace("experiences");
        CKEDITOR.replace("conferences");
        CKEDITOR.replace("awards");
        CKEDITOR.replace("activity");

        function addEducation() {
            var table = document.getElementById("education-table");
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            cell1.innerHTML = `<input type="text" name="degree[]" required>`;
            cell2.innerHTML = `<input type="text" name="duration[]">`;
            cell3.innerHTML = `<input type="text" name="place[]">`;
            cell4.innerHTML = `<input type="text" name="thesisTitle[]">`;
            cell5.innerHTML = `<input type="checkbox" id="edCheckBox" name="edIsHidden[]">`;
            if(table.rows.length >=1) {
                document.getElementById("delEB").disabled = false;
            }
    
        }
        function deleteEducation() {
            var table = document.getElementById("education-table");
            var rows = table.rows;
            var lastRow = rows[rows.length - 1];
            table.deleteRow(lastRow.rowIndex);
            if (rows.length == 1) {
                document.getElementById("delEB").disabled = true;
            }
    
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
            cell1.innerHTML = `<input type="text" name="ititle[]" required>`;
            cell2.innerHTML = `<input type="text" name="idoi[]">`;
            cell3.innerHTML = `<input type="text" name="iyear[]" pattern="\d{4}" title="Enter valid year (4-digit)">`;
            cell4.innerHTML = `<input type="text" name="ipubDate[]">`;
            cell5.innerHTML = `<input type="text" name="ipubType[]">`;
            cell6.innerHTML = `<input type="text" name="ipages[]">`;
            cell7.innerHTML = `<input type="text" name="ivolume[]">`;
            cell8.innerHTML = `<input type="text" name="iauthors[]">`;
            cell9.innerHTML = `<input type="text" name="ijournal[]">`;
            cell10.innerHTML = `<input type="text" name="iscopusC[]">`;
            cell11.innerHTML = `<input type="text" name="icrossrefC[]">`;
            cell12.innerHTML = `<input type="checkbox" id="iCheckBox" name="iIsHidden[]">`;
            if(table.rows.length >=1) {
                document.getElementById("delIPB").disabled = false;
            }
    
        }
        function deleteIRINSPub() {
            var table = document.getElementById("irins-pub-table");
            var rows = table.rows;
            var lastRow = rows[rows.length - 1];
            table.deleteRow(lastRow.rowIndex);
            if (rows.length == 1) {
                document.getElementById("delIPB").disabled = true;
            }
    
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

</body>

</html>