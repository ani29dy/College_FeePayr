<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <link rel="stylesheet" href="./CSS/contact.css">
  <link rel="stylesheet" href="./CSS/navbar_footer.css" />
  <link rel="stylesheet" href="./CSS/signup.css" />
  <link rel="shortcut icon" href="./Images/favicon.ico" type="image/x-icon">
  <script src="./JS/validation.js"></script>
  <script src="./JS/sweetalert2.all.min.js"></script>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap"
    rel="stylesheet" />
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
        <li><a class="navbar-link active" href="#">SignUp</a></li>
        <li><a class="navbar-link" href="signin.php">SignIn</a></li>
      </ul>
    </nav>
    <div class="mobile-navbar-btn">
      <i class="bx bx-menu"></i>
    </div>
  </header>
  <div class="container">
    <form action="#" name="myForm" method="post" onsubmit="return formValidate()">
      <div class="contact-form">
        <h1 class="title1">Sign Up</h1>
        <div class="input-container">
          <input type="text" name="sname" id="sname" class="input" />
          <label for="sname"><i class="bx bxs-user"></i> Full Name</label>
          <span>Full Name</span>
        </div>
        <div class="input-container">
          <input type="email" name="email" id="email" class="input" />
          <label for="email"><i class="bx bxs-envelope"></i> Email</label>
          <span>Email</span>
        </div>
        <div class="input-container">
          <input type="tel" name="mobile" id="mobile" class="input" />
          <label for="mobile"><i class="bx bxs-phone"></i> Mobile No.</label>
          <span>Mobile No.</span>
        </div>
        <div class="input-container">
          <input type="date" name="dob" id="dob"
            style="padding-left: 8.5rem; font-size: 1rem;" class="input" />
          <label for="dob" style="margin-left: 0.5rem;"> Date of Birth</label>
          <span>Date of Birth</span>
        </div>
        <div class="input-container">
          <input type="text" name="pass" id="pass" class="input" />
          <label for="pass"><i class="bx bxs-lock"></i> Password</label>
          <span>Password</span>
        </div>
        <script>
          document.getElementById("dob").addEventListener("input", function () {
            var dob = new Date(document.getElementById("dob").value);
            var currentDate = new Date();
            var age = calculateAge(dob, currentDate);
            document.getElementById("age").value = age + " Years";
          });

          function calculateAge(birthDate, currentDate) {
            var years = currentDate.getFullYear() - birthDate.getFullYear();
            if (
              currentDate.getMonth() < birthDate.getMonth() ||
              (currentDate.getMonth() === birthDate.getMonth() && currentDate.getDate() < birthDate.getDate())
            ) {
              years--;
            }
            return years;
          }
        </script>
      </div>
      <div class="contact-form" style="padding-top: 85px;">
        <div class="input-container">
          <select name="gender" id="gender" class="input">
            <option class="opt" value="">Gender</option>
            <option class="opt" value="Male"><i class='bx bx-male-sign'></i> Male</option>
            <option class="opt" value="Female"><i class='bx bx-female-sign'></i> Female</option>
            <option class="opt" value="Others">Others</option>
          </select>
        </div>
        <div class="input-container textarea">
          <textarea name="address" id="address" cols="" rows="3" class="input"></textarea>
          <label for="address"><i class="bx bxs-map"></i> Address</label>
          <span>Address</span>
        </div>
        <div class="input-container">
          <input type="text" name="age" id="age" class="input" placeholder="Your Age"/>
        </div>
        <div class="input-container">
          <input type="text" name="friend" id="friend" class="input" />
          <label for="friend"> Your Best Friend</label>
          <span>Your Best Friend</span>
        </div>
        <input type="submit" name="submit" id="send" value="SignUp" class="btn" />
      </div>
    </form>
  </div>

  <footer>
    <p>&copy; 2023 College FeePayr. All rights Reserved.</p>
  </footer>
  <!-- <script type="text/javascript" src="JS/signup.js"></script> -->
  <script src="./JS/contact.js"></script>
  <script src="./JS/index.js"></script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
  $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
  if (!$connect) {
    die("Could not connect to MySQL database " . mysqli_error());
  } else {
    $mobile = $_POST['mobile'];
    $name = $_POST['sname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $pass = $_POST['pass'];
    $friend = $_POST['friend'];

    $alreadyAccount = "select * from student where mobile = '$mobile'";

    $result = mysqli_query($connect, $alreadyAccount) or die("Could not execute query");

    if (mysqli_num_rows($result) == 1) {
      echo '<script>';
      echo 'swal("Sorry", "Your account is already Created, please SignIn", "error")';
      echo '</script>';
    } else {

      $insertQuery = "insert into student(mobile, name, email, address, gender, dob, age, pass, friend) values('$mobile','$name','$email','$address','$gender','$dob', '$age', '$pass', '$friend')";

      $result = mysqli_query($connect, $insertQuery);

      if ($result == 1) {
        echo '<script>';
        echo 'swal("Thank You", "Registration Done Successfully", "success")';
        echo '</script>';
      } else {
        echo '<script>';
        echo 'swal("Sorry", "Could not registration , Please check details", "error")';
        echo '</script>';
      }
    }
  }
}
?>