<!DOCTYPE html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>

  <?php
  include '../header.php';
  if (!($_SESSION['id'])) {
    header('location:../index.php');
    exit();
  }

  ?>

  <!-- Page Container -->

  <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">

    <!-- The Grid -->
    <div class="w3-row">
      <div class="container-fluid">
        <div class="row d-flex flex-row-reverse">
          <div class="col-md-4 col-lg-3">
            <?php include 'stu-nav.php'; ?>
          </div>
          
          <div class="col-md-8 col-lg-9">
            <div id="main">
              <div class="row">
                <div class="col-md-12">
                </div>
              </div>
              <?php include '../functions/announcements.php'; ?>
            </div>
          </div>
        </div>
      </div>

      <!-- Left Column
      <div class="w3-col m3 col-lg">
        <?php //include 'stu-nav.php';     
        ?>
      </div> -->
      <!-- End Left Column -->

      <!-- Middle Column 
      <div class="w3-col m9">
        <div id="main">
          <div class="w3-row-padding">
            <div class="w3-col m12">
            </div>
          </div>
          <?php //include '../functions/announcements.php'; ?>
        </div>
      </div>-->
      <!-- End Middle Column -->
    </div>
    <!-- End Grid -->
  </div>

  <!-- End Page Container -->

  <br>

  <!-- Footer -->

  <?php include '..\footer.php'; ?>
</body>

<script>
  function openNav() {
    document.getElementById("myNav").style.width = "100%";
  }

  function closeNav() {
    document.getElementById("myNav").style.width = "0%";
  }
</script>