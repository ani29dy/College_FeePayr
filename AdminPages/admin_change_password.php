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
    <link rel="stylesheet" href="./CSS/sidebar.css" />
    <link rel="stylesheet" href="./CSS/admin_change_pass.css">
    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
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
        <p>ADMIN</p>
      </div>

      <div class="sidebar-links">
        <ul>
          <li>
            <a href="admin_home.php" data-active="0">
              <div class="icon">
                <i class="bx bx-tachometer"></i>
                <i class="bx bxs-tachometer"></i>
              </div>
              <span class="link hide">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="#" data-active="1" class="staff">
              <div class="icon">
                <i class="bx bx-user"></i>
                <i class="bx bxs-user"></i>
              </div>
              <span class="link hide">Staff</span>
              <i class="bx bxs-chevron-down left"></i>
            </a>
          </li>
          <li class="staff-close">
            <a href="admin_staff_create.php" data-active="1">
              <div class="icon">
                <i class="bx bx-user-plus"></i>
                <i class='bx bxs-user-plus'></i>
              </div>
              <span class="link hide">Create Staff</span>
            </a>
            <a href="admin_staff_view.php" data-active="1">
              <div class="icon">
                <i class='bx bxs-user-detail'></i>
                <i class='bx bxs-user-detail'></i>
              </div>
              <span class="link hide">View Staff</span>
            </a>
          </li>
          <li>
            <a href="admin_student.php" data-active="2">
              <div class="icon">
                <i class="bx bx-user-circle"></i>
                <i class="bx bxs-user-circle"></i>
              </div>
              <span class="link hide">Students</span>
            </a>
          </li>
          <li>
            <a href="admin_fees_report.php" data-active="3">
              <div class="icon">
                <i class="bx bx-bar-chart-alt-2"></i>
                <i class="bx bxs-bar-chart-alt-2"></i>
              </div>
              <span class="link hide">Fees Reports</span>
            </a>
          </li>
          <li>
            <a href="admin_feedback.php" data-active="4">
              <div class="icon">
                <i class="bx bx-message-dots"></i>
                <i class="bx bxs-message-dots"></i>
              </div>
              <span class="link hide">Feedback</span>
            </a>
          </li>
          <li>
            <a href="admin_queries.php" data-active="5">
              <div class="icon">
                <i class="bx bx-message-alt-error"></i>
                <i class="bx bxs-message-alt-error"></i>
              </div>
              <span class="link hide">Queries</span>
            </a>
          </li>
          <li>
            <a href="#" data-active="6" class="active">
              <div class="icon">
                <i class="bx bx-lock-open-alt"></i>
                <i class="bx bxs-lock-open-alt"></i>
              </div>
              <span class="link hide">Change Password</span>
            </a>
          </li>
          <li>
            <a href="./logout.php" data-active="7">
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
              <input type="text" name="opass" id="opass" class="input" placeholder="Old Password"
                required />
            </div>
            <div class="input-container">
              <input type="text" name="npass" id="npass" class="input" placeholder="New Password"
                required />
            </div>
            <div class="input-container">
              <input type="password" name="cnpass" id="cnpass" class="input"
                placeholder="Confirm Password" required />
            </div>
            <input type="submit" name="change" id="change" value="Change" class="btn" />
            <input type="button" name="cancel" id="cancel" onclick="go()" value="Cancel"
              class="btn" />
            <script>
              function go() {
                window.history.back(-1);
              }
            </script>
          </form>
        </div>
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
          $query = "select password from admin where username = '$username'";
          $result = mysqli_query($connect, $query) or die("Could not execute Query");
          $row = mysqli_fetch_array($result);
          $dbpass = $row['password'];
          if ($opass == $dbpass) {
            if ($npass == $cnpass) {
              if ($opass != $npass) {
                $upquery = "update admin set password = '$npass' where username = '$username'";
                $result = mysqli_query($connect, $upquery) or die("Could not execute query");
                if ($result == 1) {
                  echo '<script>';
                  echo 'swal("Success","Your Password changed Successfully...","success")';
                  echo '</script>';
                }
              } else {
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
      <p class="copyright">
        &copy; 2023 - <span>College FeePayr</span> All Rights Reserved.
      </p>
    </main>

    <script src="../JS/sidebar.js"></script>
    <script src="../JS/contact.js"></script>
  </body>

  </html>

  <?php
} else {
  header("Location:../index.php");
  exit();
}
?>