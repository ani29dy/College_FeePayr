<?php
ob_start();
session_start();
if (isset($_SESSION['mobile'])) {
  $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
  if (!$connect) {
    die("Could not connect to the MySQL Database");
  } else {
    $mobile = $_SESSION['mobile'];
    $selectQuery = "select *from student where mobile='$mobile'";
    $result = mysqli_query($connect, $selectQuery) or die("Could not execute Query");
    $row1 = mysqli_fetch_array($result);
    // $sem = $row1['sem'];
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Fees Details</title>
      <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="./CSS/navbar_footer.css" />
      <link rel="stylesheet" href="./CSS/admin_create_staff.css" />
      <link rel="stylesheet" href="./CSS/student_home.css" />
      <link rel="stylesheet" href="./CSS/viewstaff.css" />
      <link rel="stylesheet" href="./CSS/student_fees.css">
      <link rel="shortcut icon" href="../SVG/favicon.ico" type="image/x-icon">
      <script src="sweetalert2.all.min.js"></script>
      <style>
        .input-container {
          display: flex;
          justify-content: space-between;
        }

        form {
          grid-column-gap: 4rem;
        }

        li a .btn {
          margin-left: 0;
        }

        .btn1 {
          box-shadow: 0px 2px 5px 1px grey;
          background-color: #fafafa;
          width: 125px;
          cursor: pointer;
          color: #003366;
          font-size: 1.1rem;
          text-shadow: 1px 0px 1px;
          border-radius: 30px;
        }

        .btn1:hover {
          background-color: #003366;
          color: #fff;
        }

        .vpcontainer {
          box-shadow: 0 0 0;
        }

        td {
          font-size: 1rem;
        }

        .input {
          width: 100px;
          font-size: 1rem;
        }

        .container h1 {
          margin-top: 0;
        }
      </style>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    </head>

    <body>
      <header class="header">
        <div class="logo">
          <p class="title">College FeePayr</p>
          <p class="slogan">Fees Management System</p>
        </div>
        <nav class="navbar">
          <ul class="navbar-list">
            <li>
              <a class="navbar-link" href="./student_home.php">Home</a>
            </li>
            <li><a class="navbar-link active" href="#">Fees Details</a></li>
            <li>
              <a class="navbar-link show" href="#">Feedback</a>
              <ul class="view">
                <li>
                  <a href="./give_feedback.php"><input type="button" style="width:125px;" name="give"
                      id="give" class="btn" value="Give Feedback"></a>
                </li>
                <li><a href="./student_view_feedback.php"><input style="width:125px;" type="button"
                      name="view" id="view" value="View Feedback" class="btn"></a></li>
              </ul>
            </li>
            <li class="profile">
              <a class="navbar-link show-1" href="#"><i class="bx bx-user"></i></a>
              <ul class="view-1">
                <li>
                  <a href="./profile.php">Profile<p>
                      <?php echo $row1['name']; ?>
                    </p></a>
                </li>
                <li>
                  <a href="./change_pass.php">Change Password</a>
                </li>
                <li>
                  <a href="./logout.php">Logout</a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <div class="mobile-navbar-btn">
          <i class="bx bx-menu"></i>
        </div>
      </header>

      <div class="container">
        <h1>Your Details</h1>
        <form action="#" method="post" onsubmit="return myfun()">

          <div class="input-container">
            <label for="usn">USN No.</label>
            <input type="text" name="usn" id="usn" value="<?php echo $row1['usn_no']; ?>" readonly />
          </div>
          <div class="input-container">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $row1['name']; ?>" readonly />
          </div>
          <div class="input-container">
            <label for="batch">Batch</label>
            <input type="text" name="batch" id="batch" value="<?php echo $row1['batch']; ?>" readonly />
          </div>
          <div class="input-container">
            <label for="course">Course</label>
            <input type="text" name="course" id="course" value="<?php echo $row1['course']; ?>"
              readonly />
          </div>
        </form>
      </div>
      <!-- start view Product container -->
      <div class="container">
        <div class="vpmaincontainer">
          <div class="vpcontainer" style="z-index: 1">
            <center>
              <h2><b>Fees Details</b></h2>
            </center>
            <hr />
            <table>
              <tr>
                <th>Course</th>
                <th>Semester</th>
                <th>Sem Fees</th>
                <th>Total Fees Paid</th>
                <th>Fees Remaining</th>
                <th>View Payments</th>
                <th>Pay Fees Now</th>
              </tr>
              <?php
              $query = "select * from fees where mobile = '$mobile'";
              $result2 = mysqli_query($connect, $query) or die("Could not execute Query");
              while ($feesRow = mysqli_fetch_array($result2)) {
                ?>
                <tr>
                  <td>
                    <?php echo $feesRow['course']; ?>
                  </td>
                  <td>
                    <?php echo $feesRow['sem']; ?>
                  </td>
                  <td>
                    <?php echo $feesRow['total_sem_fees']; ?>
                  </td>
                  <td>
                    <?php echo $feesRow['total_fees_paid']; ?>
                  </td>
                  <td>
                    <?php echo $feesRow['total_fees_remaining']; ?>
                  </td>
                  <td>
                    <a href="payment_details.php?mobile=<?php echo $feesRow['mobile']; ?>&sem=<?php echo $feesRow['sem'];?>">View Payments</a>
                  </td>
                  <td>
                    <a href="pay_now.php?mobile=<?php echo $feesRow['mobile']; ?>&sem=<?php echo $feesRow['sem'];?>">Pay Now</a></td>
                  </td>
                </tr>
                <?php
              }
              ?>
            </table>
          </div>
        </div>

        <!-- end view Product container -->
      </div>

      <script src="../JS/index.js"></script>
      <script src="../JS/student.js"></script>
      <footer>
        <p>&copy; 2023 College FeePayr. All rights Reserved.</p>
      </footer>
    </body>

    </html>
    <?php
  }
} else {
  header("Location:../index.php");
  exit();
}
?>