<?php
  ob_start();
  session_start();
  if(isset($_SESSION['username']))
  {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Course</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap"
      rel="stylesheet"
    />
    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/sidebar.css" />
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
            <a href="./students_view.php">
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
            <a class="course active">
              <div class="icon">
                <i class="bx bx-sitemap"></i>
                <i class="bx bx-sitemap"></i>
              </div>
              <span class="link hide">Course</span>
              <i class="bx bxs-chevron-down course_left"></i>
            </a>
          </li>
          <li class="course-close">
            <a href="#" class="live">
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
        <h1>CREATE COURSE</h1>
        <form action="" method="post">
          <div class="input-container">
            <label for="course_name">Course Name</label>
            <input type="text" name="course_name" id="course_name" required>
          </div>
          <div class="input-container">
            <label for="course_sem">Course Sem</label>
            <input type="text" name="course_sem" id="course_sem" required>
          </div>
          <div class="input-container">
            <label for="course_total_years">Course Total Years</label>
            <input type="text" name="course_total_years" id="course_total_years" required>
          </div>
          <div class="input-container">
            <label for="course_sem_wise_fees">Course Sem Wise Fees</label>
            <input type="text" name="course_sem_wise_fees" id="course_sem_wise_fees" required>
          </div>
          <div class="input-container">
            <label for="course_total_fees">Course Total Fees</label>
            <input type="text" name="course_total_fees" id="course_total_fees" required >
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
        if(isset($_POST['create']))
        {
          $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
          if(!$connect)
          {
            die("Could not connect to the MySQL database".mysqli_error());
          }
          else{
            $course_name = $_POST['course_name'];
            $course_sem = $_POST['course_sem'];
            $course_total_years = $_POST['course_total_years'];
            $course_sem_wise_fees = $_POST['course_sem_wise_fees'];
            $course_total_fees = $_POST['course_total_fees'];
            $query = "insert into course(course_name, course_sem, course_total_years, course_sem_wise_fees, course_total_fees) values('$course_name', '$course_sem', '$course_total_years', '$course_sem_wise_fees', '$course_total_fees')";
            $result = mysqli_query($connect, $query) or die("Could not execute Query");
            if($result == 1)
            {
              echo '<script>';
              echo 'swal("Created", "Course Created Successfully...", "success")';
              echo '</script>';
              header("Refresh:2");
            }
            else{
              echo '<script>';
              echo 'swal("Failed", "Course couldnt create...", "error")';
              echo '</script>';
              header("Refresh:2");
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
  </body>
</html>
<?php
  }
  else
  {
    header("Location:../index.php");
    exit();
  }
?>