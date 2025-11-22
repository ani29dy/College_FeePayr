<?php
session_start();
if (isset($_SESSION['mobile'])) {
  $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
  if (!$connect) {
    die("Could not connect to the MySQL Database" . mysqli_error());
  } else {
    $mobile = $_SESSION['mobile'];
    $selectQuery = "select *from student where mobile='$mobile'";
    $result = mysqli_query($connect, $selectQuery) or die("Could not execute Query");
    $row = mysqli_fetch_array($result);
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>View Feedback</title>
      <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="./CSS/navbar_footer.css" />
      <link rel="stylesheet" href="./CSS/student_home.css" />
      <link rel="stylesheet" href="./CSS/viewstaff.css" />
      <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
      <style>
        select,
        option {
          padding: 5px 10px;
        }

        .show {
          /* display: inline-block; */
          text-transform: uppercase;
          font-size: 20px;
          color: #dee2e6;
          transition: all 0.3s linear;
        }

        tr {
          box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.15);
        }
      </style>
    </head>

    <body>
      <header class="header">
        <div class="logo">
          <p class="title">College FeePayr</p>
          <p class="slogan">Fees Management System</p>
        </div>
        <nav class="navbar">
          <ul class="navbar-list">
            <li><a class="navbar-link" href="./student_home.php">Home</a></li>
            <li>
              <a class="navbar-link" href="./fees_details.php">Fees Details</a>
            </li>
            <li>
              <a class="navbar-link show active" href="#">Feedback</a>
              <ul class="view">
              <li>
                  <a href="./give_feedback.php"><input type="button" name="give" id="give" class="btn" value="Give Feedback"></a>
                </li>
                <li><a href="./student_view_feedback.php"><input type="button" name="view" id="view" value="View Feedback" class="btn"></a></li>
              </ul>
            </li>
            <li class="profile">
              <a class="navbar-link show-1" href="#"><i class="bx bx-user"></i></a>
              <ul class="view-1">
                <li><a href="./profile.php">Profile <p>
                      <?php echo $row['name']; ?>
                    </p></a></li>
                <li><a href="./change_pass.php">Change Password</a></li>
                <li><a href="./logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </nav>
        <div class="mobile-navbar-btn">
          <i class="bx bx-menu"></i>
        </div>
      </header>

      <!-- start view Product container -->
      <div class="vpmaincontainer side">
        <div class="vpcontainer">
          <center>
            <h2><b>Feedback</b></h2>
          </center>
          <hr />
          <table>
            <tr>
              <th>Sl. No</th>
              <th>Name</th>
              <th>Mobile No</th>
              <th>Feedback Date</th>
              <th>Feedback On</th>
              <th>Feedback Message</th>
              <th>Ratings</th>
              <th>Reply Message</th>
            </tr>
            <?php
            $mobile = $_SESSION['mobile'];
            $query = "select * from feedback";
            $result = mysqli_query($connect, $query) or die("could not exceute query");
            $slno = 0;
            while ($row = mysqli_fetch_array($result)) {
              $slno++;
              ?>
              <tr>
                <td>
                  <?php echo $slno; ?>
                </td>
                <td>
                  <?php echo $row['name']; ?>
                </td>
                <td>
                  <?php echo $row['mobile']; ?>
                </td>
                <td>
                  <?php echo $row['fdate']; ?>
                </td>
                <td>
                  <?php echo $row['fon']; ?>
                </td>
                <td>
                  <?php echo $row['fmsg']; ?>
                </td>
                <td>
                  <?php echo $row['rating']; ?>
                </td>
                <td>
                  <?php echo $row['replymsg']; ?>
                </td>
              </tr>
              <?php
            }
            ?>
          </table>
        </div>
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