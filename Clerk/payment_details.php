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
    <title>Payment Details</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./CSS/sidebar.css" />
    <link rel="shortcut icon" href="../SVG/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/admin_create_staff.css" />
    <link rel="stylesheet" href="./CSS/viewstaff.css">
    <style>
      .container::before, form::before {
        display: none;
      }
      .container {
        margin: 0;
        padding: 0;
      }

      main {
        padding: 0;
      }

      .vpcontainer {
        padding-top: 2rem;
        box-shadow: 0 0px 5px 1px #003366;
        position: relative;
      }
      .cancel {
        /* width: 50px; */
        font-size: 40px;
        border: 2px solid;
        color: #003366;
        border-radius: 10px;
        text-align: center;
        position: absolute;
        right: 2rem;
        top: 4rem;
        cursor: pointer;
      }
      .cancel:hover {
        color: #fff;
        background-color: #003366;
        border: 2px solid;
      }
    </style>
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
                <i class="bx bx-user-plus"></i>
                <i class="bx bxs-user-plus"></i>
              </div>
              <span class="link hide">Students Promote</span>
            </a>
          </li>
          <li>
            <a href="#" class="active">
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
      <!-- <div class="container"> -->
        <!-- start view Product container -->
      <div class="vpmaincontainer">
        <div class="vpcontainer">
          <a href="fees_details.php">
            <i class="bx bx-arrow-back cancel"></i>
          </a>
          <center>
            <h2><b>Payment Details</b></h2>
          </center>
          <hr />
          <table>
            <tr>
              <th>Sem</th>
              <th>Mob No</th>
              <th>Receipt No.</th>
              <th>Payment Id</th>
              <th>Total Fees Paid</th>
              <th>Paid Date</th>
              <th>Payment Status</th>
            </tr>
            <?php
              $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
                $mobile = $_GET['mobile'];
                $searchQuery = "select * from transaction_details where mobile = '$mobile'";
                $resultQuery = mysqli_query($connect, $searchQuery) or die("Could not execute Query");
                while($row=mysqli_fetch_array($resultQuery))
                {
                  ?>
                  <tr>
                  <td><?php echo $row['sem']; ?></td>
                  <td><?php echo $row['mobile']; ?></td>
                  <td><?php echo $row['reciept_no']; ?></td>
                  <td><?php echo $row['payment_id']; ?></td>
                  <td><?php echo $row['paid_amt']; ?></td>
                  <td><?php echo $row['paid_date']; ?></td>
                  <td><?php echo $row['payment_status']; ?></td>
                  </tr>
                  <?php
                }
            ?>
          </table>
        </div>
      </div>
      <!-- </div> -->

      <p class="copyright">
        &copy; 2023 - <span>College FeePayr</span> All Rights Reserved.
      </p>
    </main>
    <script src="../JS/sidebar.js"></script>
  </body>
</html>
<?php
  }
  else{
    header("location:../index.php");
    exit();
  }
?>