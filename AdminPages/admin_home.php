<?php
  session_start();
  if(isset($_SESSION['username']))
  {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Home</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./CSS/sidebar.css" />
    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/admin_home.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="../CSS/viewstaff.css">
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
            <a href="#" class="active" data-active="0">
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
                <i class="bx bxs-user-plus"></i>
              </div>
              <span class="link hide">Create Staff</span>
            </a>
            <a href="admin_staff_view.php" data-active="1">
              <div class="icon">
                <i class="bx bxs-user-detail"></i>
                <i class="bx bxs-user-detail"></i>
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
      <h1>My Dashboard</h1>
      <div class="container">
        <div class="box" onclick="go('admin_student.php')">
          <div class="icon-1 student">
            <i class="bx bx-user-circle"></i>
          </div>
          <div class="info">
            <h1>Student's</h1>
            <?php
              include('connect.php');
              $query = "select *from student";
              $result = mysqli_query($connect, $query) or die("Could not execute Query");
              $row = mysqli_num_rows($result);
            ?>
            <p><?php echo $row; ?></p>
          </div>
        </div>
        <div class="box" onclick="go('admin_staff_view.php')">
          <div class="icon-1 teacher">
            <i class="bx bx-user"></i>
          </div>
          <div class="info">
            <h1>Teacher's</h1>
            <?php
              include('connect.php');
              $query = "select *from staff";
              $result = mysqli_query($connect, $query) or die("Could not execute Query");
              $row = mysqli_num_rows($result);
            ?>
            <p><?php echo $row; ?></p>
          </div>
        </div>
        <div class="box">
          <div class="icon-1 courses">
            <i class="bx bx-sitemap"></i>
          </div>
          <div class="info">
            <h1>Course's</h1>
            <?php
              include('connect.php');
              $query = "select *from course";
              $result = mysqli_query($connect, $query) or die("Could not execute Query");
              $row = mysqli_num_rows($result);
            ?>
            <p><?php echo $row; ?></p>
          </div>
        </div>
        <div class="box">
          <div class="icon-1 batchs">
            <i class="bx bx-folder-open"></i>
          </div>
          <div class="info">
            <h1>Batch's</h1>
            <?php
              include('connect.php');
              $query = "select *from batch";
              $result = mysqli_query($connect, $query) or die("Could not execute Query");
              $row = mysqli_num_rows($result);
            ?>
            <p><?php echo $row; ?></p>
          </div>
        </div>
        <div class="box" onclick="go('admin_feedback.php')">
          <div class="icon-1 student">
            <i class="bx bx-user-circle"></i>
          </div>
          <div class="info">
            <h1>Feedback's</h1>
            <?php
              include('connect.php');
              $query = "select *from feedback";
              $result = mysqli_query($connect, $query) or die("Could not execute Query");
              $row = mysqli_num_rows($result);
            ?>
            <p><?php echo $row; ?></p>
          </div>
        </div>
        <div class="box" onclick="go('admin_queries.php')">
          <div class="icon-1 student">
            <i class="bx bx-user-circle"></i>
          </div>
          <div class="info">
            <h1>Query's</h1>
            <?php
              include('connect.php');
              $query = "select *from query";
              $result = mysqli_query($connect, $query) or die("Could not execute Query");
              $row = mysqli_num_rows($result);
            ?>
            <p><?php echo $row; ?></p>
          </div>
        </div>
      </div>
      <p class="copyright">
        &copy; 2023 - <span>College FeePayr</span> All Rights Reserved.
      </p>
    </main>
    <script src="../JS/sidebar.js"></script>
    <script src="../JS/graphs.js"></script>
    <script>
      function go(locat) {
        window.location.href = locat;
      }
    </script>
  </body>
</html>
<?php
  }else{
    header("Location:../index.php");
    exit();
  }
?>