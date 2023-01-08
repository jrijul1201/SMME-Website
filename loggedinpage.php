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
    <div class="background">
        <h1 style="text-align:center;"> Welcome,
            <?php echo $arr[$index]["name"]; ?>. You are successfully logged in
        </h1>
        <center><a href="logout.php"
                style="cursor:pointer;padding:10px 20px; color:white; background:black; border-radius:3px; text-decoration:none;">LOGOUT</a>
        </center>
    </div>
    <h3>Personal Information</h3>
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
                    echo "<td><input type='text' name='degree[]' value='{$ed['degree']}'></td>";
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

        <input type="submit" value="Update Changes">
    </form>

    <script>
        CKEDITOR.replace("publications");

        function addEducation() {
            var table = document.getElementById("education-table");
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            cell1.innerHTML = `<input type="text" name="degree[]">`;
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

        // this is for getting the info of all the To_Hide checkboxes

        document.getElementById('faculty_update').addEventListener('submit', function(event) {
            var checkboxes = this.querySelectorAll('input#edCheckBox');

            // Add a hidden field for each checkbox
            for (var i = 0; i < checkboxes.length; i++) {
                var hiddenField = document.createElement('input');
                hiddenField.setAttribute('type', 'hidden');
                hiddenField.setAttribute('name', 'educationIsHidden[]');
                hiddenField.setAttribute('value', checkboxes[i].checked ? 'on' : 'off');
                this.appendChild(hiddenField);
            }
        });
    </script>

</body>

</html>