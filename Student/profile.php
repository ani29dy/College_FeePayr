<?php
ob_start();
session_start();
if (isset($_SESSION['mobile'])) {
  $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
  if (!$connect) {
    die("Could not connect to the MySQL Database...");
  } else {
    $mobile = $_SESSION['mobile'];
    $query = "select *from student where mobile = '$mobile'";
    $result = mysqli_query($connect, $query) or die("Could not execute query");
    $row = mysqli_fetch_array($result);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title><?php echo $row['name']; ?>Profile</title>
      <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="./CSS/navbar_footer.css" />
      <link rel="stylesheet" href="./CSS/student_home.css" />
      <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
      <link rel="stylesheet" href="./CSS/admin_create_staff.css" />
      <script src="sweetalert2.all.min.js"></script>
      <style>
        body .container {
          min-height: 100vh;
          align-items: center;
        }

        .container {
          width: 70vw;
          display: flex;
          flex-direction: column;
          padding: 3rem 0;
        }

        li a .btn {
          width: 125px;
          margin-left: 0;
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
            <!-- <li><a class="navbar-link" href="#cont">Features</a></li> -->
            <li>
              <a class="navbar-link" href="./fees_details.php">Fees Details</a>
            </li>
            <li>
              <a class="navbar-link show" href="#">Feedback</a>
              <ul class="view">
                <li>
                  <a href="./give_feedback.php"><input type="button" name="give" id="give" class="btn" value="Give Feedback"></a>
                </li>
                <li><a href="./student_view_feedback.php"><input type="button" name="view" id="view" value="View Feedback" class="btn"></a></li>
              </ul>
            </li>
            <li class="profile">
              <a class="navbar-link show-1 active" href="#"><i class="bx bx-user"></i></a>
              <ul class="view-1">
                <li><a href="#">Profile <p>
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

      <div class="container" style="margin: 2rem auto">
        <h1 style="margin-bottom: 3rem;">MY PROFILE</h1>
        <form action="#" method="post">
          <div class="input-container" style="margin: 0 3rem">
            <label for="usn">USN No.</label>
            <input type="text" name="usn" id="usn" value="<?php echo $row['usn_no']; ?>"/>
          </div>
          <div class="input-container" style="margin: 0 3rem">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="<?php echo $row['address']; ?>" />
          </div>
          <div class="input-container" style="margin: 0 3rem">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" />
          </div>
          <div class="input-container" style="margin: 0 3rem">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" />
          </div>
          <div class="input-container" style="margin: 0 3rem">
            <label for="mobile_no">Mobile No.</label>
            <input type="text" name="mobile_no" id="mobile_no" value="<?php echo $row['mobile']; ?>"
              readonly />
          </div>
          <div class="input-container" style="margin: 0 3rem">
            <label for="gender">Gender</label>
            <input type="text" name="gender" id="gender" value="<?php echo $row['gender']; ?>" />
          </div>
          <div class="input-container" style="margin: 0 3rem">
            <label for="dob">Date of Birth</label>
            <input type="text" name="dob" id="dob" value="<?php echo $row['dob']; ?>" />
          </div>
          <div class="input-container" style="margin: 0 3rem">
            <label for="age">Age</label>
            <input type="text" name="age" id="age" value="<?php echo $row['age']; ?>" />
          </div>
          <div class="input-container" style="margin: 0 3rem">
            <label for="friend">Best Friend</label>
            <input type="text" name="friend" id="friend" value="<?php echo $row['friend']; ?>" />
          </div>
          <div class="buttons">
            <div>
              <input class="submit" type="submit" name="update" id="update" value="Update" />
            </div>
          </div>
        </form>
        <?php
          }
          if (isset($_POST['update'])) {
            $mobile = $_SESSION['mobile'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $friend = $_POST['friend'];

            $queryUpdate = "update student set name = '$name', email = '$email', gender = '$gender', address = '$address', dob = '$dob', age = '$age', friend = '$friend' where mobile = '$mobile'";
            $result = mysqli_query($connect, $queryUpdate) or die("Could not execute Query");
            if ($result == 1) {
              echo '<script>';
              echo 'swal("Updated", "Your details Updated Successfully...", "success")';
              echo '</script>';
              header("Refresh:2");
            } else {
              echo '<script>';
              echo 'swal("Sorry", "Couldn\'t Update your details...", "error")';
              echo '</script>';
            }
          }
          ?>
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
?>