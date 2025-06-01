<?php
ob_start();
session_start();
if (isset($_SESSION['mobile'])) {
  header("Location:Student/student_home.php");
  exit();
} else{
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignIn</title>
    <link rel="stylesheet" href="CSS/signin.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap"
      rel="stylesheet" />
  <link rel="shortcut icon" href="./Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/navbar_footer.css" />
    <script src="./JS/sweetalert2.all.min.js"></script>
    <style>
      
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
          <li><a class="navbar-link" href="index.php">Home</a></li>
          <li><a class="navbar-link" href="about.php">About</a></li>
          <li><a class="navbar-link" href="contact.php">Contact</a></li>
          <li><a class="navbar-link" href="signup.php">SignUp</a></li>
          <li><a class="navbar-link active" href="#">SignIn</a></li>
        </ul>
      </nav>
      <div class="mobile-navbar-btn">
        <i class="bx bx-menu"></i>
      </div>
    </header>

    <div class="container">
      <div class="form-container">
        <div class="signin">
          <form action="#" class="student-signin" method="post">
            <i class="bx bx-user"></i>
            <h2 class="title1">Student SignIn</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="mobile" id="mobile" placeholder="Mobile Number" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="pass" id="pass" placeholder="Password" required/>
            </div>
            <div class="forgot">
              <a href="./forgot_password.php">Forgot Password?</a>
            </div>
            <input type="submit" name="signin" id="signin" value="SignIn" class="btn solid" />
          </form>

          <form action="#" class="clerk-signin" method="post">
            <i class="bx bxs-user"></i>
            <h2 class="title1">Admin/Clerk SignIn</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" id="username" placeholder="Username" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="apass" id="apass" placeholder="Password" required/>
            </div>
            <!-- <div class="forgot">
              <a href="#">Forgot Password?</a>
            </div> -->
            <div class="btn-2">
            <input type="submit" name="asignin" id="asignin" value="Admin SignIn" class="btn solid" />
            <input type="submit" name="csignin" id="csignin" value="Clerk SignIn" class="btn solid" />
            </div>
          </form>
        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Admin/Clerk?</h3>
            <p>
              If your an Admin/Clerk then you can manage your institution's fees here.
              And can also view student's Queries and Feedback's by Sign In
              here.
            </p>
            <button style="width: 180px;" class="btn transparent" id="clerksignin">
              Admin/Clerk SignIn
            </button>
          </div>
          <img src="SVG/adminpic.svg" alt="Logo" class="image" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Student</h3>
            <p>
              If you are a Student you can Sign In by Clicking
              the below button.
            </p>
            <button class="btn transparent" id="studentsignin">SignIn</button>
          </div>
          <img src="SVG/userpic.svg" alt="Logo" class="image" />
        </div>
      </div>
    </div>

    <footer>
      <p>&copy; 2023 College FeePayr. All rights Reserved.</p>
    </footer>
    <script src="JS/signin.js"></script>
  </body>

  </html>

  <?php
  if (isset($_POST['signin'])) {
    $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
    if (!$connect) {
      die("Could not connect to the database.....");
    } else {
      $mobile = $_POST['mobile'];
      $pass = $_POST['pass'];
      $query = "select * from student where mobile='$mobile' and pass = '$pass'";
      $result = mysqli_query($connect, $query) or die("Could not execute Query");
      $row = mysqli_num_rows($result);
      if ($row == 1) {
        $_SESSION['mobile'] = $mobile;
        header("Location:Student/student_home.php");
        exit();
      } else {
        echo '<script>';
        echo 'swal("Sorry", "Your Mobile number or Password is Incorrect", "error")';
        echo '</script>';
      }
    }
  } else if (isset($_POST['asignin'])) {
    $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
    if (!$connect) {

      die("Could not connect to MySQL database ".mysqli_error());

    } else {
      $username = $_POST['username'];
      $apass = $_POST['apass'];
      $select = "select *from admin where username = '$username' and password='$apass'";
      $result = mysqli_query($connect, $select) or die("Counld not execute query!");
      $row = mysqli_num_rows($result);
      if ($row == 1) {
        $_SESSION['username'] = $username;
        header("Location:AdminPages/admin_home.php");
        exit();
      } else {
        echo '<script>';
        echo 'swal("Sorry","Your Username or Password is wrong, Please check the details!", "error")';
        echo '</script>';
      }
    }
  }
  else if (isset($_POST['csignin'])) {
    $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
    if (!$connect) {

      die("Could not connect to MySQL database ".mysqli_error());

    } else {
      $username = $_POST['username'];
      $apass = $_POST['apass'];
      $select = "select *from staff where name = '$username' and pass='$apass' and designation = 'Clerk'";
      $result = mysqli_query($connect, $select) or die("Counld not execute query!");
      $row = mysqli_num_rows($result);
      if ($row == 1) {
        $_SESSION['username'] = $username;
        header("Location:Clerk/home_clerk.php");
        exit();
      } else {
        echo '<script>';
        echo 'swal("Sorry","Your Username or Password is wrong, Please check the details!", "error")';
        echo '</script>';
      }
    }
  }
  ?>
  <?php
}
?>