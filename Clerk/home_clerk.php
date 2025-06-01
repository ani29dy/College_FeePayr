<?php
  session_start();
  if(isset($_SESSION['username']))
  {
    $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
    if(!$connect)
    {
      die("Could not connect to the MySQL Database".mysqli_error());
    }
    else{
      $query = "select * from ";
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clerk Home</title>
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
    <link rel="stylesheet" href="./CSS/admin_home.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
            <a class="active">
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
      <h1>My Dashboard</h1>
      <div class="container">
        <div class="box" onclick="go('students_view.php')">
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
        <div class="box">
          <div class="icon-1 teacher">
            <i class="bx bx-user"></i>
          </div>
          <div class="info">
            <h1>Staff</h1>
            <?php
              include('connect.php');
              $query = "select *from staff";
              $result = mysqli_query($connect, $query) or die("Could not execute Query");
              $row = mysqli_num_rows($result);
            ?>
            <p><?php echo $row; ?></p>
          </div>
        </div>
        <div class="box" onclick="go('course_view.php')">
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
        <div class="box" onclick="go('batch_view.php')">
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
      </div>
      
        <div class="graph doughnut">
        <?php
          include('connect.php');
          $sql = "SELECT * FROM student where gender = 'Male'";
          $sql2 = "SELECT * FROM student where gender = 'Female'";
          $result = mysqli_query($connect, $sql) or die("Could not execute Query");
          $result2 = mysqli_query($connect, $sql2) or die("Could not execute Query");
          $row = mysqli_num_rows($result);
          $frow = mysqli_num_rows($result2);
          $dataPoints = array(
            array("label"=>"Male", "y"=>$row),
            array("label"=>"Female", "y"=>$frow)
          )
            
          ?>
          <!DOCTYPE HTML>
          <html>
          <head>
          <script>
          window.onload = function() {
            
          var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2",
            animationEnabled: true,
            title: {
              text: "Number of Students as per Gender"
            },
            data: [{
              type: "doughnut",
              indexLabel: "{symbol} {y}",
              yValueFormatString: "",
              showInLegend: true,
              legendText: "{label} : {y}",
              dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
          });
          chart.render();
            
          }
          </script>
          </head>
          <body>
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
          <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
          </body>
          </html>
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

      <?php
        include('connect.php');
        $sql = "SELECT * FROM student where gender = 'Male'";
        $sql2 = "SELECT * FROM student where gender = 'Female'";
        $result = mysqli_query($connect, $sql) or die("Could not execute Query");
        $result2 = mysqli_query($connect, $sql2) or die("Could not execute Query");
        $row = mysqli_num_rows($result);
        $frow = mysqli_num_rows($result2);
      ?>
      <script>
        const aValues = ["Male", "Female"];
        const bValues = [<?php echo $row; ?>, <?php echo $frow; ?>];
        const genderColors = ["#0096FF", "#5800FF"];

        new Chart("genderStudents", {
          type: "doughnut",
          data: {
            labels: aValues,
            datasets: [
              {
                backgroundColor: genderColors,
                data: bValues,
              },
            ],
          },
          options: {
            title: {
              display: true,
              text: "Number of Students As Per Gender",
            },
          },
        });
      </script>



        <?php
          include('connect.php');
          $sql = "SELECT * FROM student";
          $sql2 = "SELECT * FROM course";
          $result = mysqli_query($connect, $sql2) or die("Could not execute Query");
          $row = mysqli_fetch_array($result);
        ?>
      <script>
        const mValues = [<?php echo $row['course_name']; ?>];
        const nValues = [500, 150, 100];
        const semColors = ["#712cf9", "#712313", "#ffffas"];

        new Chart("semStudents", {
          type: "pie",
          data: {
            labels: mValues,
            datasets: [
              {
                backgroundColor: semColors,
                data: nValues,
              },
            ],
          },
          options: {
            title: {
              display: true,
              text: "Number of Students As Per Course",
            },
          },
        });

      </script>

  </body>
</html>
<?php
  }else
  {
    header("Location:../index.php");
    exit();
  }
?>