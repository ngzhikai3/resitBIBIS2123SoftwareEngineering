<?php
include '../header.php';

$result = mysqli_query($dbcon, "SELECT * FROM supervisor") or die(mysqli_error($dbcon));

?>

<!-- Page Container -->
<div class="w3-container " style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="container-fluid">
      <div class="row d-flex flex-row-reverse">
        <div class="col-md-4 col-lg-3">
          <?php
          include 'coord-nav.php';
          ?>
          <!-- End Left Column -->
        </div>

        <!-- Middle Column -->
        <div class="col-md-8 col-lg-9">

          <div id="main">


            <div class="w3-row-padding w3-container">
              <div id="import" class="">
                <button onclick="importSupervisor()" class="w3-btn bg-primary">Import Supervisors with CSV file</button>
                <!--button class="w3-btn w3-red">Archive</button -->
              </div>
              <div id="grade" class="w3-card-2 "> </div>

              <br />
              <div class="w3-card-2 ">
                <table class="w3-table w3-hoverable" border="0">
                  <thead>
                    <tr class="bg-info">
                      <!-- th><input type="checkbox" id="selectall" /></th -->
                      <th>Name</th>
                      <th>Expertise</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>Office</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <?php
                  while ($user_sup = mysqli_fetch_array($result)) {
                    $theuser = $user_sup['empId'];
                    $roleresult = mysqli_query($dbcon, "SELECT * FROM login WHERE user = '$theuser'  ") or die(mysqli_error($dbcon));
                    $user_role = mysqli_fetch_array($roleresult);
                    $role = $user_role['role'];

                  ?>

                    <tr>
                      <!-- td><input type="checkbox" class="archive" name="archive" value="" ></td -->
                      <td><?php echo $user_sup['fName'] . " " . $user_sup['lName']; ?></td>
                      <td><?php echo $user_sup['expertise']; ?></td>
                      <td><?php echo $user_sup['phoneNo']; ?></td>
                      <td><?php echo $user_sup['email']; ?></td>
                      <td><?php echo $user_sup['office'];  ?></td>
                      <td>
                        <?php echo "<a href='edituser.php?user=" . $theuser . "'><i class='fa-solid fa-pen-to-square ms-4'></i></a>"; ?>

                      </td>

                    </tr>
                  <?php } ?>
                </table>
              </div>
            </div>
            <br />

          </div>

          <!-- End Middle Column -->
        </div>


        <!-- End Grid -->
      </div>

      <!-- End Page Container -->
    </div>
    <br>

    <!-- Footer -->
    <?php
    include '../footer.php';
    ?>

    <script>
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("main").innerHTML = this.responseText;
        }
      };

      function importSupervisor() {
        xhttp.open("GET", "importsupervisor.php", true);
        xhttp.send();
      }
    </script>
    <script>
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("grade").innerHTML = this.responseText;
        }
      };

      function upgradeUser() {
        xhttp.open("GET", "<?php echo 'gradeuser.php?user=' . $theuser; ?>", true);
        xhttp.send();
      }

      function downgradeUser() {
        xhttp.open("GET", "<?php echo 'gradeuser.php?user=' . $theuser; ?>", true);
        xhttp.send();
      }
    </script>