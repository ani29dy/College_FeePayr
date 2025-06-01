<?php
ob_start();
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
      <title>Give Feedback</title>
      <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="./CSS/navbar_footer.css" />
      <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
      <link rel="stylesheet" href="./CSS/student_home.css" />
      <script src="sweetalert2.all.min.js"></script>
      <!-- <link rel="stylesheet" href="./CSS/admin_create_staff.css"> -->
      <style>
        .ccontainer {
          min-height: 100vh;
        }

        textarea, input {
          width: 100%;
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
              <li onclick="showgivefeedback()">
                  <a href="#"><input type="button" name="give" id="give" class="btn" value="Give Feedback"></a>
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
        <div class="ccontainer">
          
            <!-- start give feedback html-->
            <div class="gfb gfbview">
        <form action="#" class="fbform" method="post">
          <div class="fbheader">
            <h1>Give Feedback</h1>
          </div>
          <div class="gfcontainer">
            <div class="input-container">
              <label>Name</label>
              <input type="text" name="name" value="<?php echo $row['name']; ?>" readonly/>
            </div>
            <div class="input-container">
              <label>Mobile No.</label>
              <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" readonly/>
            </div>
            <div class="input-container">
              <label>Feedback Date</label>
              <input type="text" name="fdate" value="<?php date_default_timezone_set("Asia/Kolkata");
              echo date("Y-m-d h:i:s"); ?>" readonly/>
            </div>
            <div class="input-container">
              <label>Feedback on</label>
              <input type="text" name="fon" placeholder="Feedback on which Services" required/>
            </div>
            <div class="input-container">
              <label>Feedback Message</label>
              <textarea cols="15" rows="3" placeholder="Enter Feedback Message" name="fmsg" required></textarea>
            </div>
            <div class="input-container">
              <label for="">Ratings
                <select name="ratings">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </label>
            </div>
          </div>
          <div class="buttons">
            <input type="submit" value="Send" name="send" class="btn" />
            <input type="reset" value="Clear" class="btn" />
          </div>
        </form>
      </div>

      </div>

      <?php
      if (isset($_POST['send'])) {
        $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
        if (!$connect) {
          die("Could not connect to the MySQL Database");
        } else {
          $name = $_POST['name'];
          $mobile = $_POST['mobile'];
          $fdate = $_POST['fdate'];
          $fon = $_POST['fon'];
          $fmsg = $_POST['fmsg'];
          $ratings = $_POST['ratings'];

          $query = "insert into feedback(name, mobile, fdate, fon, fmsg, rating) values('$name', '$mobile','$fdate', '$fon', '$fmsg', '$ratings')";
          $result1 = mysqli_query($connect, $query) or die("could not execute query");
          if ($result1 == 1) {
            echo '<script>';
            echo 'swal("Thank you", "Your feedback sent Successfully","success")';
            echo '</script>';
          } else {
            echo '<script>';
            echo 'swal("Sorry","Your feedback sent Successfully","error")';
            echo '</script>';
          }
        }
      }
      ?>
      <!-- end give feedback html-->
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