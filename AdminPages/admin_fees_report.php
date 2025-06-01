<?php
session_start();
if(isset($_SESSION['username']))
{
  include('connect.php');
  $studentQuery = "select * from student";
  $studentResult = mysqli_query($connect, $studentQuery) or die("Could not execute Query");
  $row = mysqli_fetch_array($studentResult);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fees Reports</title>
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
    <link rel="stylesheet" href="./CSS/viewstaff.css">
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
      <!-- start view Product container -->
      <div class="vpmaincontainer">
        <div class="vpcontainer">
          <center>
            <h2><b>Fees Reports</b></h2>
          </center>
          <hr />
          <!-- <center>
            <p style="color: #bb2253">
              Please see the fees details you can delete or update of product.
            </p>
          </center> -->
          <table>
            <tr>
              <th>Mobile</th>
              <th>Course</th>
              <th>Sem</th>
              <th>Total Sem Fees</th>
              <th>Total Fees Paid</th>
              <th>Fees Remaining</th>
              <th>View Transactions Details</th>
            </tr>
            <?php
              include('connect.php');
              $feesQuery = "select * from fees";
              $feesResult = mysqli_query($connect, $feesQuery) or die("Could not execute Query");
              while($feesRow = mysqli_fetch_array($feesResult))
              {
            ?>

                <tr>
                <td><?php echo $feesRow['mobile']; ?></td>
                <td><?php echo $feesRow['course']; ?></td>
                <td><?php echo $feesRow['sem']; ?></td>
                <td><?php echo $feesRow['total_sem_fees']; ?></td>
                <td><?php echo $feesRow['total_fees_paid']; ?></td>
                <td><?php echo $feesRow['total_fees_remaining']; ?></td>
                <td><a href="payment_details.php?mobile=<?php echo $feesRow['mobile'] ?>">Payment Details</a></td>
                </tr>

            <?php
              }
            ?>
          </table>
        </div>
      </div>

      <!-- end view Product container -->
      <p class="copyright">
        &copy; 2023 - <span>College FeePayr</span> All Rights Reserved.
      </p>
    </main>

    <script src="../JS/sidebar.js"></script>
  </body>
</html>
<?php
}else{
  header("Location:../index.php");
  exit();
}
?>