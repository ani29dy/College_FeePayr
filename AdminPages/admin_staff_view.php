<?php
ob_start();
session_start();
if(isset($_SESSION['username']))
{
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Staff</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./CSS/sidebar.css" />
    <link rel="stylesheet" href="./CSS/viewstaff.css" />
    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
    <script src="sweetalert2.all.min.js"></script>
    <script src="../JS/validation.js"></script>
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
            <a href="#" data-active="1" class="staff active">
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
            <a href="#" data-active="1" class="active1 active">
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
            <a href="admin_fees_report.php" data-active="3">
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
            <h2><b>STAFF DETAILS</b></h2>
          </center>
          <hr />
          <table>
            <tr>
              <th>SL. No</th>
              <th>Mobile No</th>
              <th>Staff Name</th>
              <th>Staff Designation</th>
              <th>Gender</th>
              <th>DoB</th>
              <th>Age</th>
              <th>Address</th>
              <th>Joining Date</th>
              <th>Experience (in years)</th>
              <th>Password</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>
            <?php
              $connect = mysqli_connect("localhost","root","","collegefeepayr");
              if(!$connect)
              {
                die("Could not connect to the MySQL Database...");
              }
              else
              {
                $query = "select *from staff";
                $result = mysqli_query($connect, $query) or die("Could not execute query");
                $slno=0;
                while ($row =mysqli_fetch_array( $result )){
                  $slno++;
            ?>
            <form action="#" method="post" name="myForm" onsubmit="return staffCreate()">
            <tr>
              <td><?php echo $slno; ?></td>
              <td><input type="text" name="mobile" id="mobile" value="<?php echo $row['mobile']; ?>"></td>
              <td><input type="text" name="name" id="name" value="<?php echo $row['name']; ?>"></td>
              <td><input type="text" name="designation" id="designation" value="<?php echo $row['designation']; ?>"></td>
              <td><input type="text" name="gender" id="gender" value="<?php echo $row['gender']; ?>"></td>
              <td><input type="date" name="dob" id="dob" value="<?php echo $row['date_of_birth']; ?>"></td>
              <td><input type="text" name="age" id="age" value="<?php echo $row['age']; ?>"></td>
              <td><input type="text" name="address" id="address" value="<?php echo $row['address']; ?>"></td>
              <td><input type="date" name="doj" id="doj" value="<?php echo $row['date_of_joining']; ?>"></td>
              <td><input type="text" name="experience" id="experience" value="<?php echo $row['experience']; ?>"></td>
              <td><input type="text" name="pass" id="pass" value="<?php echo $row['pass']; ?>"></td>
              <td><input class="btn" type="submit" name="update" value="Update"></td>
              <td><input class="btn" type="submit" name="delete" value="Delete"></td>
            </tr>
          </form>
          <?php
            }
          }

          if(isset($_POST['update']))
          {
            $username = $_SESSION['username'];
            $mobile = $_POST['mobile'];
            $name = $_POST['name'];
            $designation = $_POST['designation'];
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $address = $_POST['address'];
            $doj = $_POST['doj'];
            $exp = $_POST['experience'];

            $queryUpdate = "update staff set name = '$name', designation = '$designation', gender = '$gender', date_of_birth = '$dob', age = '$age', address = '$address', date_of_joining = '$doj', experience = '$exp' where mobile = '$mobile'";
            $result = mysqli_query($connect, $queryUpdate) or die("Could not execute Query");
            if($result == 1)
            {
              echo '<script>';
              echo 'swal("Updated", "Staff Details Updated Successfully...", "success")';
              echo '</script>';
              header("Refresh:2");
            }
            else{
              echo '<script>';
              echo 'swal("Sorry", "Couldnt Update Staff...", "error")';
              echo '</script>';
              header("Refresh:2");
            }
          }
            else if(isset($_POST['delete']))
            {
              $name = $_POST['name'];
              $delQuery = "delete from staff where name = '$name'";
              $result = mysqli_query($connect, $delQuery) or die("Could not execute Query");
              if($result==1)
              {
                echo '<script>';
                echo 'swal("Deleted", "Staff Deleted Successfully...", "success")';
                echo '</script>';
                header("Refresh:2");
              }
              else
              {
                echo '<script>';
                echo 'swal("Sorry", "Could not Delete Staff...", "error")';
                echo '</script>';
                header("Refresh:2");
              }
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