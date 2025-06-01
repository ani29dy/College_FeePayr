<?php
session_start();
if (isset($_SESSION['username'])) {
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Password</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap"
      rel="stylesheet" />
    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/sidebar.css" />
    <link rel="stylesheet" href="./CSS/admin_change_pass.css">
    <script src="sweetalert2.all.min.js"></script>
    <script>
      function change1() {
        var npass = document.getElementById("npass").value;

        // Validation for password: at least 8 characters long, containing at least one uppercase letter, one lowercase letter, and one number
        var passwordRegex = /^(?=.*[0-9])(?=.*[- ?!@#$%^&*])(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9- ?!@#$%^&*]{8,15}$/;
        if (!passwordRegex.test(npass)) {
          alert("Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.");
          document.myForm.npass.focus();
          document.myForm.npass.style.border = "solid 2px red";
          return false;
        }
        else {
          document.myForm.npass.focus();
          document.myForm.npass.style.border = "2px solid #2476c8";
        }
      }
    </script>
  </head>

  <body>
    <nav>
      <div class="sidebar-top">
        <span class="shrink-btn">
          <i class="bx bxs-chevron-left"></i>
        </span>
        <h3>College FeePayr</h3>
        <p>Fees Management System</p>
      </div>
      <div class="profile">
        <div class="pic">
          <img src="../SVG/ceo.png" alt="Admin" />
        </div>
        <p>CLERK</p>
      </div>
      <div class="sidebar-links">
        <ul>
          <li>
            <a href="./home_clerk.php">
              <div class="icon">
                <i class="bx bx-tachometer"></i>
                <i class="bx bxs-tachometer"></i>
              </div>
              <span class="link hide">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="students_view.php">
              <div class="icon">
                <i class="bx bx-user-circle"></i>
                <i class="bx bxs-user-circle"></i>
              </div>
              <span class="link hide">Students</span>
            </a>
          </li>
          <li>
            <a class="staff">
              <div class="icon">
                <i class="bx bx-folder-open"></i>
                <i class="bx bxs-folder-open"></i>
              </div>
              <span class="link hide">Batch</span>
              <i class="bx bxs-chevron-down left"></i>
            </a>
          </li>
          <li class="staff-close">
            <a href="./batch_create.php">
              <div class="icon">
                <i class="bx bxs-file-plus"></i>
                <i class="bx bxs-file-plus"></i>
              </div>
              <span class="link hide">Create Batch</span>
            </a>
            <a href="./batch_view.php">
              <div class="icon">
                <i class="bx bx-file"></i>
                <i class="bx bxs-file"></i>
              </div>
              <span class="link hide">View Batch</span>
            </a>
          </li>
          <li>
            <a class="course">
              <div class="icon">
                <i class="bx bx-sitemap"></i>
                <i class="bx bx-sitemap"></i>
              </div>
              <span class="link hide">Course</span>
              <i class="bx bxs-chevron-down course_left"></i>
            </a>
          </li>
          <li class="course-close">
            <a href="./course_create.php">
              <div class="icon">
                <i class="bx bx-folder-plus"></i>
                <i class="bx bxs-folder-plus"></i>
              </div>
              <span class="link hide">Create Course</span>
            </a>
            <a href="./course_view.php">
              <div class="icon">
                <i class="bx bx-folder"></i>
                <i class="bx bxs-folder"></i>
              </div>
              <span class="link hide">View Course</span>
            </a>
          </li>
          <li>
            <a href="./students_promote.php">
              <div class="icon">
                <i class="bx bx-message-dots"></i>
                <i class="bx bxs-message-dots"></i>
              </div>
              <span class="link hide">Students Promote</span>
            </a>
          </li>
          <li>
            <a href="./fees_details.php">
              <div class="icon">
                <i class="bx bx-bar-chart-alt-2"></i>
                <i class="bx bxs-bar-chart-alt-2"></i>
              </div>
              <span class="link hide">Fees Details</span>
            </a>
          </li>
          <li>
            <a href="#" class="active">
              <div class="icon">
                <i class="bx bx-lock-open-alt"></i>
                <i class="bx bxs-lock-open-alt"></i>
              </div>
              <span class="link hide">Change Password</span>
            </a>
          </li>
          <li>
            <a href="./logout.php">
              <div class="icon">
                <i class="bx bx-log-out-circle"></i>
                <i class="bx bxs-log-out-circle"></i>
              </div>
              <span class="link hide">Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <main>
      <div class="container">
        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>
          <form action="#" method="post" name="myForm" onsubmit="return change1()">
            <h1>Change Password</h1>
            <div class="input-container">
              <input type="text" name="opass" id="opass" class="input" placeholder="Old Password" required/>
            </div>
            <div class="input-container">
              <input type="text" name="npass" id="npass" class="input" placeholder="New Password" required/>
            </div>
            <div class="input-container">
              <input type="password" name="cnpass" id="cnpass" class="input" placeholder="Confirm Password" required/>
            </div>
            <input type="submit" name="change" id="change" value="Change" class="btn" />
            <input type="button" name="cancel" onclick="go()" id="cancel" value="Cancel" class="btn" />
          </form>
        </div>
        <?php
        if (isset($_POST['change'])) {
          $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
          if (!$connect) {
            die("Could not connect to the MySQL Database");
          } else {
            $username = $_SESSION['username'];
            $opass = $_POST['opass'];
            $npass = $_POST['npass'];
            $cnpass = $_POST['cnpass'];

            $query = "select pass from staff where name = '$username'";
            $result = mysqli_query($connect, $query) or die("Could not execute Query");
            $row = mysqli_fetch_array($result);
            $dbpass = $row['pass'];
            if ($opass == $dbpass) {
              if ($npass == $cnpass) {
                if($opass != $npass){
                  $upquery = "update staff set pass = '$npass' where name = '$username'";
                  $result = mysqli_query($connect, $upquery) or die("Could not execute query");
                  if ($result == 1) {
                    echo '<script>';
                    echo 'swal("Success","Your Password changed Successfully...","success")';
                    echo '</script>';
                  }
                }
                else{
                  echo '<script>';
                  echo 'swal("Sorry","New Password must be different from Old Password","error")';
                  echo '</script>';
                }
              } else {
                echo '<script>';
                echo 'swal("Sorry","New Password and Confirm Password does not Match","error")';
                echo '</script>';
              }
            } else {
              echo '<script>';
              echo 'swal("Sorry","Enter Old Password is incorrect","error")';
              echo '</script>';
            }
          }
        }

        ?>
      </div>
      <p class="copyright">
        &copy; 2023 - <span>College FeePayr</span> All Rights Reserved.
      </p>
    </main>
    <script src="../JS/sidebar.js"></script>
    <script src="../JS/contact.js"></script>
    <script>
      function go() {
        window.history.back(-1);
      }
    </script>
  </body>

  </html>
  <?php
} else {
  header("Location:../index.php");
  exit();
}
?>