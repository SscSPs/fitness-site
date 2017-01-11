<?php
session_start();
if(!isset($_SESSION['authenticated'])){
  $_SESSION['message'] = "Login First";
  header("location: ./");
}
$db = mysqli_connect("localhost", "root", "", "Project_fitness");
if ($db->connect_error) {
    die("Connection failed: " . $db ->connect_error);
}

echo '<form action="changeOwnPass.php" method="post">';
echo '<label for="oldPass" style="width:200px;display: inline-block;">Current Password</label>';
echo '<input type="text" name="oldPass" id="oldPass" placeholder="Current Password" required/><br>';
echo '<label for="newPass1" style="width:200px;display: inline-block;">New Password</label>';
echo '<input type="text" name="newPass1" id="newPass1" placeholder="New Password" required/><br>';
echo '<label for="newPass2" style="width:200px;display: inline-block;">Confirm New Password.</label>';
echo '<input type="text" name="newPass2" id="newPass2" placeholder="Confirm New Password" required/><br>';
echo '<input type="submit" name="changeSelf" value="Add Exercise" />';
echo '</form>';

if(isset($_POST['changeSelf'])){
  $oldpass = md5($_POST['oldPass']);
  if($_POST['newPass1'] == $_POST['newPass2']){
    $newPass = md5($_POST['newPass1']);

    $email = $_SESSION['email'];
    $checkExercise = "SELECT * FROM project_admin_login where email = '$email' and passhash = '$oldpass' limit 1";
    $result2 = $db->query($checkExercise);
    if ($result2->num_rows == 1) {
      $changePass = "UPDATE project_admin_login set passhash = '$newPass' WHERE email = '$email'";
      $changePassResult = $db->query($bodypartupdate);
      if($bodypartresult === TRUE){
        echo "Update Successful <br>";
      }
      else echo "some error occured on updating password, the old one is not changed.";
    }
    else{
      echo "Password is wrong. Try again";
    }
  }
  else{
    echo "Passwords do not match. Fix that.";
  }
}



 ?>
