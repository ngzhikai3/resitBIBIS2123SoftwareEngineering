<style>
  .background-radial-gradient {
    background-color: hsl(218, 41%, 15%);
    background-image: radial-gradient(650px circle at 0% 0%,
        hsl(218, 41%, 35%) 15%,
        hsl(218, 41%, 30%) 35%,
        hsl(218, 41%, 20%) 75%,
        hsl(218, 41%, 19%) 80%,
        transparent 100%),
      radial-gradient(1250px circle at 100% 100%,
        hsl(218, 41%, 45%) 15%,
        hsl(218, 41%, 30%) 35%,
        hsl(218, 41%, 20%) 75%,
        hsl(218, 41%, 19%) 80%,
        transparent 100%);
  }

  #radius-shape-1 {
    height: 220px;
    width: 220px;
    top: -60px;
    left: -130px;
    background: radial-gradient(#44006b, #ad1fff);
    overflow: hidden;
  }

  #radius-shape-2 {
    border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
    bottom: -60px;
    right: -110px;
    width: 300px;
    height: 300px;
    background: radial-gradient(#44006b, #ad1fff);
    overflow: hidden;
  }

  .bg-glass {
    background-color: hsla(0, 0%, 100%, 0.9) !important;
    backdrop-filter: saturate(200%) blur(25px);
  }
</style>
<?php
include('session.php');
include('nav-header.php');
?>

<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden vh-100">
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Final Year Project <br />
          <span style="color: hsl(218, 81%, 75%)">Management System</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          Dear Student, This website is use for submit your Final Year Project.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">

          <div class="card-body px-4 py-5 px-md-5">
            <?php
            if (isset($_POST['submit'])) {

              $username = $_POST['username'];
              $pass = md5($_POST['password']);
              $password = ($pass);


              $query = "SELECT * FROM login WHERE user='$username' AND passwrd='$password'";
              $result = mysqli_query($dbcon, $query);
              $num_row = mysqli_num_rows($result);
              $user_row = mysqli_fetch_array($result);

              if ($num_row > 0) {
              $role = $user_row['role'];
                $_SESSION['id'] = $username;
                $_SESSION['role'] = $role;

                if ($role == 2) {
                  header('location:student/');
                } else if ($role == 1) {
                  header('location:supervisor/');
                } else if ($role == 0) {
                  header('location:coordinator/');
                }
                #$_SESSION['id'] = $username;
              } else {
                echo " <div class='alert alert-danger'>Access Denied</div> ";
              }
            }
            ?>
            <h6 class="text-muted">Please enter your ID and password to login.</h5>
              <form method="POST">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="mb-4">
                    <div class="form-outline">
                      <input class="w3-input" type="text" name="username" placeholder="User ID">

                    </div>
                  </div>
                  <div class=" mb-4">
                    <div class="form-outline">
                      <input class="w3-input" type="password" name="password" placeholder="Password">
                    </div>
                  </div>
                </div>



                <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">
                  Log In
                </button>

                <div class="mb-4">
                  <div class="form-outline">
                    Don't have an account?
                    Get it from your coordinator.!

                  </div>
                </div>


              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
