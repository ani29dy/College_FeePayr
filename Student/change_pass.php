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
    $row = mysqli_fetch_array($result);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Change Password</title>
      <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="./CSS/navbar_footer.css" />
      <link rel="stylesheet" href="./CSS/student_home.css" />
      <link rel="stylesheet" href="./CSS/forget_pass.css">
      <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
      <script src="sweetalert2.all.min.js"></script>
      <script>
        function change1() {
          var npass = document.getElementById("npass").value;

          // Validation for password: at least 8 characters long, containing at least one uppercase letter, one lowercase letter, and one number
          var passwordRegex = /^(?=.*[0-9])(?=.*[- ?!@#$%^&*])(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9- ?!@#$%^&*]{8,15}$/;
          if (!passwordRegex.test(npass)) {
            alert("Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.");
            document.myForm.npass.focus();
            document.myForm.npass.style.border = "solid 2px red";
            return false;
          }
          else {
            document.myForm.npass.focus();
            document.myForm.npass.style.border = "2px solid #2476c8";
          }
        }
      </script>
      <style>
        body .signin {
          min-height: 100vh;
        }

        .pass {
          margin-top: -3rem;
          font-size: 4rem;
          color: #003366;
        }

        footer {
          position: relative;
          top: 117px;
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
                <li>
                  <a href="./student_view_feedback.php"><input type="button" name="view" id="view" value="View Feedback" class="btn"></a>
                </li>
              </ul>
            </li>
            <li class="profile">
              <a class="navbar-link show-1 active" href="#"><i class="bx bx-user"></i></a>
              <ul class="view-1">
                <li><a href="./profile.php">Profile <p>
                      <?php echo $row['name']; ?>
                    </p></a></li>
                <li><a href="#">Change Password</a></li>
                <li><a href="./logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </nav>
        <div class="mobile-navbar-btn">
          <i class="bx bx-menu"></i>
        </div>
      </header>

      <!-- Start of Change Password -->
      <div class="container">
        <div class="form-container">
          <div class="signin">
            <form action="#" class="clerk-signin" name="myForm" method="post"
              onsubmit="return change1()">
              <i class="bx bx-user-circle pass"></i>
              <h2 class="title1">Change Password</h2>
              <div class="input-field">
                <input type="text" name="opass" id="opass" placeholder="Old Password" required />
              </div>
              <div class="input-field">
                <input type="text" name="npass" id="npass" placeholder="New Password" required />
              </div>
              <div class="input-field">
                <input type="text" name="cnpass" id="cnpass" placeholder="Confirm Password" required />
              </div>
              <div class="button">
                <input type="submit" name="change" id="change" value="Change" class="btn2 solid" />
                <button class="btn2 solid"><a href="student_home.php">Cancel</a></button>
              </div>
            </form>
          </div>
          <?php
          if (isset($_POST['change'])) {
            $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
            if (!$connect) {
              die("Could not connect to the MySQL Database");
            } else {
              $mobile = $_SESSION['mobile'];
              $opass = $_POST['opass'];
              $npass = $_POST['npass'];
              $cnpass = $_POST['cnpass'];

              $query = "select pass from student where mobile = '$mobile'";
              $result = mysqli_query($connect, $query) or die("Could not execute Query");
              $row = mysqli_fetch_array($result);
              $dbpass = $row['pass'];
              if ($opass == $dbpass) {
                if ($npass == $cnpass) {
                  if ($opass != $npass) {
                    $upquery = "update student set pass = '$npass' where mobile = '$mobile'";
                    $result = mysqli_query($connect, $upquery) or die("Could not execute query");
                    if ($result == 1) {
                      echo '<script>';
                      echo 'swal("Success","Your Password changed Successfully...","success")';
                      echo '</script>';
                    }
                  } else {
                    echo '<script>';
                    echo 'swal("Sorry","New Password must be different from Old Password","error")';
                    echo '</script>';
                  }
                } else {
                  echo '<script>';
                  echo 'swal("Sorry","New Password and Confirm Password does not Match","error")';
                  echo '</script>';
                }
              } else {
                echo '<script>';
                echo 'swal("Sorry","Enter Old Password is incorrect","error")';
                echo '</script>';
              }
            }
          }
          ?>
        </div>
      </div>

      <!-- End of Change Password -->

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
      <script src="../JS/contact.js"></script>
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