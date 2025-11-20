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
    <link rel="stylesheet" href="./CSS/admin_create_staff.css" />
    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/viewstaff.css">
    <style>
      .container::before, form::before {
        display: none;
      }
      .container {
        margin: 0;
        padding: 0;
      }
      .bx-x {
        font-size: 3rem;
        color: #003366;
        position: absolute;
        top: 3.5rem;
        right: 4rem;
        border: 2px solid #003366;
        border-radius: 10px;
        cursor: pointer;
      }
      .bx-x:hover {
        color: #fff;
        background-color: #003366;
      }
    </style>
    <script>
      function goback() {
        window.history.back(-1);
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
                <i class="bx bxs-user-plus"></i>
              </div>
              <span class="link hide">Create Staff</span>
            </a>
            <a href="#" data-active="1">
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
            <a href="#" data-active="3" class="active">
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
        <i class="bx bx-x" onclick="goback()"></i>
        <!-- <h1>FEES DETAILS</h1> -->
        <!-- start view Product container -->
        <div class="vpmaincontainer">
          <div class="vpcontainer">
            <center>
              <h2><b>Payment Details</b></h2>
            </center>
            <hr />
            <table>
            <tr>
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
  else{
    header("location:../index.php");
    exit();
  }
?>