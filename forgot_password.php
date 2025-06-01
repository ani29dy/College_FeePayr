<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forget Password</title>
  <link rel="shortcut icon" href="./Images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="./CSS/forget_pass.css" />
  <script src="JS/sweetalert2.all.min.js"></script>
  <style>
    .signin {
      margin: auto;
      background-color: #fafafa;
      width: 40vw;
      box-shadow: 0 0 3px 3px rgba(0, 0, 0, 0.25);
      border-radius: 25px;
    }

    form {
      padding: 3rem 1rem;
    }

    a {
      text-decoration: none;
      color: #fff;
      padding: 18px 35px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="form-container">
      <div class="signin">
        <form action="#" class="clerk-signin" method="post">
          <i class="bx bxs-user"></i>
          <h2 class="title1">Forget Password</h2>
          <div class="input-field">
            <input type="text" name="friend" id="friend" placeholder="Your best friend Name" required/>
          </div>
          <div class="input-field">
            <input type="text" name="npass" id="pass" placeholder="New Password" required/>
          </div>
          <div class="input-field">
            <input type="text" name="cpass" id="pass" placeholder="Confirm Password" required/>
          </div>
          <div class="button">
            <input type="submit" name="submit" id="submit" value="Submit" class="btn solid" />
            <button class="btn solid"><a href="signin.php">Cancel</a></button>
          </div>
        </form>
        <?php
        if (isset($_POST['submit'])) {
          $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
          if (!$connect) {
            die("Could not connect to the database.....");
          } else {
            $friend = $_POST['friend'];
            $npass = $_POST['npass'];
            $cpass = $_POST['cpass'];
            $query = "select * from student where friend='$friend'";
            $result = mysqli_query($connect, $query) or die("Could not execute Query");
            $row = mysqli_num_rows($result);
            if ($row == 1) {
              if ($npass != $cpass) {
                echo '<script>';
                echo 'swal("Sorry", "Your New Password and Confirm Password didn\'t match", "error")';
                echo '</script>';
              } else {
                $queryUpdate = "update student set pass = '$cpass' where friend = '$friend'";
                $queryResult = mysqli_query($connect, $queryUpdate) or die("Could not Execute Query");
                if ($queryResult == 1) {
                  echo '<script>';
                  echo 'swal("Successful", "Your Password is Updated", "success")';
                  echo '</script>';
                } else {
                  echo '<script>';
                  echo 'swal("Sorry", "Your Password couldn\'t reset", "error")';
                  echo '</script>';
                }
              }
            } else {
              echo '<script>';
              echo 'swal("Sorry", "You entered Friend name is Incorrect", "error")';
              echo '</script>';
            }
          }
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>