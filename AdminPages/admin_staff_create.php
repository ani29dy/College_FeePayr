<?php
session_start();
if (isset($_SESSION['username'])) {
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Staff</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap"
      rel="stylesheet">
    <link rel="stylesheet" href="./CSS/sidebar.css">
    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/admin_create_staff.css">
    <script src="../JS/validation.js"></script>
    <style>
      .container {
        margin: 0rem 2rem;
        padding: 0 2rem;
      }

      form {
        margin-top: 2rem;
        grid-column-gap: 5rem;
      }

      input,
      select {
        font-size: 1.05rem;
        text-shadow: 0.5px 0 0px;
        letter-spacing: 1px;
      }
    </style>
    <script src="sweetalert2.all.min.js"></script>
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
            <a href="#" data-active="1" class="staff active">
              <div class="icon">
                <i class="bx bx-user"></i>
                <i class="bx bxs-user"></i>
              </div>
              <span class="link hide">Staff</span>
              <i class="bx bxs-chevron-down left"></i>
            </a>
          </li>
          <li class="staff-close">
            <a href="#" data-active="1" class="active1">
              <div class="icon">
                <i class="bx bx-user-plus"></i>
                <i class="bx bxs-user-plus"></i>
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
            <a href="admin_change_password.php" data-active="6">
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
        <h1>CREATE STAFF</h1>
        <form action="" name="myForm" onsubmit="return staffCreate()" method="post">
          <div class="input-container">
            <label for="designation">Staff Designation</label>
            <select name="designation" id="designation">
              <option value="">Select</option>
              <option class="opt" value="Lecturer">Lecturer</option>
              <option class="opt" value="Clerk">Clerk</option>
              <option class="opt" value="Attender">Attender</option>
            </select>
          </div>
          <div class="input-container">
            <label for="address">Address</label>
            <input type="text" name="address" id="address">
          </div>
          <div class="input-container">
            <label for="name">Staff Name</label>
            <input type="text" name="name" id="name">
          </div>
          <div class="input-container">
            <label for="mobile">Mobile No.</label>
            <input type="text" name="mobile" id="mobile">
          </div>
          <div class="input-container">
            <label for="gender">Gender</label>
            <select name="gender" id="gender">
              <option value="">Select</option>
              <option class="opt" value="Male">Male</option>
              <option class="opt" value="Female">Female</option>
            </select>
          </div>
          <div class="input-container">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" id="dob">
          </div>
          <div class="input-container">
            <label for="experience">Experience</label>
            <input type="text" name="experience" id="experience">
          </div>
          <div class="input-container">
            <label for="age">Age</label>
            <input type="text" name="age" id="age">
          </div>
          <div class="input-container">
            <label for="doj">Joining Date</label>
            <input type="date" name="doj" id="doj">
          </div>
          <div class="input-container">
            <label for="pass">Password</label>
            <input type="text" name="pass" id="pass">
          </div>
          <div class="buttons">
            <div>
              <input class="submit" type="submit" name="create" id="create" value="Create">
            </div>
            <div>
              <input class="clear" type="reset" name="clear" id="clear" value="Clear">
            </div>
          </div>
        </form>
        <?php
        if (isset($_POST['create'])) {
          $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
          if (!$connect) {
            die("Could not connect to MySQL database");
          } else {
            $mobile = $_POST['mobile'];
            $name = $_POST['name'];
            $designation = $_POST['designation'];
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $address = $_POST['address'];
            $doj = $_POST['doj'];
            $experience = $_POST['experience'];
            $pass = $_POST['pass'];

            $sql = "select *from staff where mobile = '$mobile'";
            $res = mysqli_query($connect, $sql) or die("Could not execute Query");
            if (mysqli_num_rows($res) == 1) {
              echo '<script>';
              echo 'swal("Ooop\'s", "This Staff is already Created...", "error")';
              echo '</script>';
            } else {

              $query = "insert into staff(mobile, name, designation, gender, date_of_birth, age, address, date_of_joining, experience, pass) values ('$mobile', '$name', '$designation', '$gender', '$dob', '$age', '$address', '$doj', '$experience', '$pass' )";
              $result = mysqli_query($connect, $query) or die("Could not execute Query");

              if ($result == 1) {
                echo '<script>';
                echo 'swal("Well Done", "Staff created successfully...", "success")';
                echo '</script>';
              } else {
                echo '<script>';
                echo 'swal("Failed", "Could not create Staff...", "error")';
                echo '</script>';
              }
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
    <script>
      document.getElementById("dob").addEventListener("input", function () {
        var dob = new Date(document.getElementById("dob").value);
        var currentDate = new Date();
        var age = calculateAge(dob, currentDate);
        document.getElementById("age").value = age + " Years";
      });

      function calculateAge(birthDate, currentDate) {
        var years = currentDate.getFullYear() - birthDate.getFullYear();
        if (
          currentDate.getMonth() < birthDate.getMonth() ||
          (currentDate.getMonth() === birthDate.getMonth() && currentDate.getDate() < birthDate.getDate())
        ) {
          years--;
        }
        return years;
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