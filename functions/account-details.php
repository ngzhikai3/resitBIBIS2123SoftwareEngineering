<?php
include '../dbcon.php';
session_start();


$get_user = $_SESSION['id'];
$role = $_SESSION['role'];


if ($role == 2) {

  $result = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$get_user'") or die(mysqli_error($dbcon));
  $student_row = mysqli_fetch_array($result);

  $regNo =  $student_row['regNo'];


  $sqlgrp = mysqli_query($dbcon, "SELECT * FROM members WHERE regNo='$get_user'") or die(mysqli_error($dbcon));
  $group_row = mysqli_fetch_array($sqlgrp);
  $num_row = mysqli_num_rows($sqlgrp);
  $groupNo = $group_row['grpNo'];

  $supId =  "SELECT * FROM `supervisor` WHERE empId = (SELECT empId FROM grp WHERE grpNo = '$groupNo')";
  $supIdsql = mysqli_query($dbcon, $supId) or die(mysqli_error($dbcon));
  $sup_row = mysqli_fetch_array($supIdsql);
  $supervisor = $sup_row['fName'] . " " . $sup_row['lName'];


?>

<?php
} else if ($role == 1) {

  //echo "I am a supervisor";
  $supervisor_result = mysqli_query($dbcon, "SELECT * FROM supervisor WHERE empId = '$get_user'") or die(mysqli_error($dbcon));
  $supervisor_row = mysqli_fetch_array($supervisor_result);
} else if ($role == 0) {
  //echo "I am a coordinator";
  $coordinator_result = mysqli_query($dbcon, "SELECT * FROM supervisor WHERE empId = '$get_user'") or die(mysqli_error($dbcon));
  $coordinator_row = mysqli_fetch_array($coordinator_result);
}


?>

<div class="w3-row-padding">
  <div class="w3-card-2 ">
    <div class="w3-container w3-padding">
      <div class="w3-col m12">
        <h3 class="w3-center">UPDATE PASSWORD</h3>
      </div>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="w3-col m4 w3-padding"><input class="w3-input" type="password" name="pass" placeholder="Password"> </div>
        <div class="w3-col m4 w3-padding"><input class="w3-input" type="password" name="confirmpass" placeholder="Confirm Password"></div>
        <div class="w3-col m4 w3-padding"><button name="update" class="w3-btn"> Update Password</button></div>
      </form>

      <?php
      if (isset($_POST['update'])) {
        $pass = $_POST['pass'];
        $confirmpass = $_POST['confirmpass'];
        if ($pass == $confirmpass) {
          $loginsql = mysqli_query($dbcon, "UPDATE login SET passwrd='$confirmpass' WHERE user = '$get_user'") or die(mysqli_error($dbcon));
          if ($loginsql) {
            if ($role == 2) {
              header('location:../student/');
            } else if ($role == 1) {
              header('location:../supervisor/');
            } else if ($role == 0) {
              header('location:../coordinator/');
            }

      ?>
            <script>
              alert("Password changed successfully");
            </script>
          <?php

          } else { ?>
            <script>
              alert("Something went wrong password was not changed");
            </script>
          <?php

          }
        } else { ?>
          <script>
            alert("Passwords don't match");
          </script>
      <?php
          if ($role == 2) {
            header('location:../student/');
          } else if ($role == 1) {
            header('location:../supervisor/');
          } else if ($role == 0) {
            header('location:../coordinator/');
          }
        }
      }
      ?>
    </div>
  </div>
</div>
<br />