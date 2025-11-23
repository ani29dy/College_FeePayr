<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us</title>
  <link rel="stylesheet" href="./CSS/contact.css" />
  <link rel="shortcut icon" href="./Images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="./CSS/navbar_footer.css" />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap"
    rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <script src="./JS/sweetalert2.all.min.js"></script>
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
        <li><a class="navbar-link active" href="#">Contact</a></li>
        <li><a class="navbar-link" href="signup.php">SignUp</a></li>
        <li><a class="navbar-link" href="signin.php">SignIn</a></li>
      </ul>
    </nav>
    <div class="mobile-navbar-btn">
      <i class="bx bx-menu"></i>
    </div>
  </header>

  <!-- Start of Contact Us Page -->

  <div class="container">
    <span class="big-circle"></span>
    <div class="form">
      <div class="contact-info">
        <h3 class="title-info">Let's get in touch</h3>
        <div class="info">
          <div class="information">
            <i class="bx bxs-envelope icon"></i>
            <p>apkfeepayr@gmail.com</p>
          </div>
        </div>
        <div class="info">
          <div class="information">
            <i class="bx bxs-phone icon"></i>
            <p>9380694613<br />9900941079<br />9620244422</p>
          </div>
        </div>
        <div class="info">
          <div class="information">
            <i class="bx bxs-map icon"></i>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61271.653651467386!2d74.45939898490904!3d16.29848464337082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc094f1fa4002af%3A0x5052ee5dcb4b8154!2sSJPN%20Trusts%20BCA%20and%20PUC%20College!5e0!3m2!1sen!2sin!4v1657448031724!5m2!1sen!2sin"
              style="border: 0" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
      <div class="contact-form">
        <span class="circle one"></span>
        <span class="circle two"></span>
        <form action="#" method="post" name="myForm" onsubmit="return formValidate()">
          <h3 class="title">Contact Us</h3>
          <div class="input-container">
            <input type="text" name="name" id="name" class="input" />
            <label for=""><i class="bx bxs-user"></i> Username</label>
            <span>Username</span>
          </div>
          <div class="input-container">
            <input type="email" name="email" id="email" class="input" />
            <label for=""><i class="bx bxs-envelope"></i> Email</label>
            <span>Email</span>
          </div>
          <div class="input-container">
            <input type="tel" name="mobile" id="mobile" class="input" />
            <label for=""><i class="bx bxs-phone"></i> Mobile No.</label>
            <span>Mobile No.</span>
          </div>
          <div class="input-container textarea">
            <textarea name="message" id="message" cols="" rows="" class="input"></textarea>
            <label for=""><i class="bx bxs-message"></i> Message</label>
            <span>Message</span>
          </div>
          <input type="submit" name="send" id="send" value="Send" class="btn" />
        </form>
        <script>
          function formValidate() {
            var name = document.getElementById("name").value;
            var mobile = document.getElementById("mobile").value;
            var email = document.getElementById("email").value;
            var msg = document.getElementById("message").value;

            var nameRegex = /^[a-zA-Z\s]{3,50}$/;
            if (!nameRegex.test(name)) {
              alert("Please Enter Your Full Name.\nName must contain only letters and spaces.");
              document.myForm.name.focus();
              document.myForm.name.style.border = "solid 2px red";
              return false;
            }
            else {
              document.myForm.name.focus();
              document.myForm.name.style.border = "2px solid #fff";
            }

            var emailRegex = /^[A-Za-z0-9._]{3,}@[A_Za-z]{3,}[.]{1}[A-Za-z.]{2,6}/;
            if (!emailRegex.test(email)) {
              alert("Invalid Email address");
              document.myForm.email.focus();
              document.myForm.email.style.border = "solid 2px red";
              return false;
            }
            else {
              document.myForm.email.focus();
              document.myForm.email.style.border = "2px solid #fff";
            }

            var mobnoRegex = /^[0-9]+$/;
            if (!mobnoRegex.test(mobile)) {
              alert("Please enter Mobile number.");
              document.myForm.mobile.focus();
              document.myForm.mobile.style.border = "solid 2px red";
              return false;
            }
            else if (mobile == "" || mobile.length < 10) {
              alert("Please enter valid mobile number!");
              document.myForm.mobile.focus();
              document.myForm.mobile.style.border = "solid 2px red";
              return false;
            }
            else {
              document.myForm.mobile.focus();
              document.myForm.mobile.style.border = "2px solid #fff";
            }


            if (msg == "") {
              alert("Please write your Message!");
              document.myForm.message.focus();
              document.myForm.message.style.border = "solid 2px red";
              return false;
            }
            else {
              document.myForm.message.focus();
              document.myForm.message.style.border = "2px solid #fff";
            }
          }
        </script>
      </div>
    </div>
  </div>
  <!-- E  nd of Contact Us Page -->

  <footer>
    <p>&copy; 2023 College FeePayr. All rights Reserved.</p>
  </footer>

  <script src="JS/contact.js"></script>
  <script src="./JS/index.js"></script>
</body>

</html>

<?php
if (isset($_POST['send'])) {
  $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
  if (!$connect) {
    die("Could not connect to the database");
  } else {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $query = "insert into query values('$name', '$mobile', '$email', '$message')";
    $result = mysqli_query($connect, $query) or die("Could not execute Query");
    if ($result == 1) {
      echo '<script>';
      echo 'swal("Thank You", "Your Query is sent Successfully...", "success")';
      echo '</script>';
    } else {
      echo '<script>';
      echo 'swal("Sorry", "Your Query could not Sent", "Error")';
      echo '</script>';
    }
  }
}
?>