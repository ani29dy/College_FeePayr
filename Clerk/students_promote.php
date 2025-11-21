<?php
session_start();
if (isset($_SESSION['username'])) {
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Students Promote</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap"
      rel="stylesheet" />
    <link rel="stylesheet" href="./CSS/sidebar.css" />
    <link rel="shortcut icon" href="../SVG/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/batch_course_create.css">
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
            <a href="#" class="active">
              <div class="icon">
                <i class="bx bx-user-plus"></i>
                <i class="bx bxs-user-plus"></i>
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
            <a href="./change_password_clerk.php">
              <div class="icon">
                <i class="bx bx-lock-open-alt"></i>
                <i class="bx bxs-lock-open-alt"></i>
              </div>
              <span class="link hide">Change Password</span>
            </a>
          </li>
          <li>
            <a href="logout.php">
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
        <h1>STUDENTS PROMOTE</h1>
        <form action="" method="post">
          <div class="input-container">
            <label for="batch_name">Batch Name</label>
            <select name="batch">
              <?php
              include('connect.php');
              $student = "select *from batch";
              $result = mysqli_query($connect, $student) or die("could not execute query");
              while ($row = mysqli_fetch_array($result)) {
                ?>
                <option>
                  <?php echo $row['batch_year']; ?>
                </option>
              <?php } ?>
            </select>
          </div>
          <div class="input-container">
            <label for="course_name">Course Name</label>
            <select name="course">
              <?php
              include('connect.php');
              $student = "select *from course";
              $result = mysqli_query($connect, $student) or die("could not execute query");
              while ($row = mysqli_fetch_array($result)) {
                ?>
                <option>
                  <?php echo $row['course_name']; ?>
                </option>
              <?php } ?>
            </select>
          </div>
          <div class="input-container">
            <label for="to_sem">To Semester</label>
            <select name="to_sem" id="">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
            </select>
          </div>
          <div class="buttons">
            <div>
              <input class="submit" type="submit" name="promote" id="promote" value="Promote">
            </div>
            <div>
              <input class="clear" type="button" onclick="go()" name="clear" id="clear"
                value="Cancel">
            </div>
          </div>
        </form>
        <?php
        if (isset($_POST['promote'])) {
          include('connect.php');
          $batch = $_POST['batch'];
          $course = $_POST['course'];
          $to_sem = $_POST['to_sem'];
          $query = "update student set sem = '$to_sem' where batch = '$batch' and course = '$course'";
          $result1 = mysqli_query($connect, $query) or die("Could not execute Query");

          $selectQuery = "select * from student where batch = '$batch' and course = '$course' ";
          $selectResult = mysqli_query($connect, $selectQuery) or die("Could not execute Query");
          while ($row = mysqli_fetch_array($selectResult)) {
            $mobile = $row['mobile'];
            $course1 = $row['course'];
            $sem = $row['sem'];

            $getQuery = "select * from course where course_name = '$course1'";
            $result = mysqli_query($connect, $getQuery) or die("Could not execute query");
            $courseRow = mysqli_fetch_array($result);
            $total_sem_fees = $courseRow['course_sem_wise_fees'];

            $semQuery = "select * from fees where mobile = '$mobile' and sem = '$sem'";
            $semResult = mysqli_query($connect, $semQuery) or die("Could not execute Query");
            if(mysqli_num_rows($semResult) == 0){
            $queryInsert = "insert into fees values('', '$mobile', '$course', '$sem', '$total_sem_fees',0.0, '$total_sem_fees')";

            mysqli_query($connect, $queryInsert) or die("Could not execute Query");
            }
          }
          if ($result1 == 1) {
            echo '<script>';
            echo 'swal("Promoted", "Students Promoted Successfully...", "success")';
            echo '</script>';
          } else {
            echo '<script>';
            echo 'swal("Sorry", "Student couldn\'t Promoted...", "error")';
            echo '</script>';
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