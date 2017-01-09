<?php
$db = mysqli_connect("localhost", "root", "", "Project_fitness");
if ($db->connect_error) {
    die("Connection failed: " . $db ->connect_error);
}
//fetch list of body parts
$sql = "SELECT id, name, number_of_exercise FROM project_body_parts";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    echo '<form action="editexercise.php" method="post">';
    echo '<label for="BodyPart" style="width:200px;display: inline-block;">Body Part</label>';
    echo '<select>';
        while($row = $result->fetch_assoc()) {
            echo "<option value=" . $row["id"] . ">" . $row["name"] . "</option>";
        }

    echo '</select>';
}
else {
  echo "Add some body parts first.";
}

?>

<!DOCTYPE html>
<html>
    <body>

        <script>
            function loadform(task, tagname) {
                var text = '';
                if (task === "edit") {
                    text+='<form action="Exercises.php" method="post"><hr>';
                    text+='<label for="BodyPart" style="width:200px;display: inline-block;">Body Part</label>';
                    text+='';
                    text+='';
                    text+='</select><br>';
                    text+='<label for="password" style="width:200px;display: inline-block;">Password</label>';
                    text+='<input type="password" name="password" id="password" placeholder="Password" required/><br>';
                    text+='<input type="submit" name="add" value="Add Exercise" />';
                    text+='<p>Forgot password? Contact someone with authority.</p>';
                    text+='<p>Do not have an account? Then what are you doing here?</p>';
                    text+='</form>';
                } else if (task === "add") {
                    text += "asd";
                }
                tagname.innerHTML = text;
            }
        </script>
    </body>
</html>
