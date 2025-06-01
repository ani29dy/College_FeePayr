<?php
  session_start();
  if(isset($_SESSION['username']))
  {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Students</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/sidebar.css">
    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/viewstaff.css">
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
            <a href="#" data-active="1" class="staff">
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
            <a href="admin_staff_view.php" data-active="1">
              <div class="icon">
                <i class='bx bxs-user-detail'></i>
                <i class='bx bxs-user-detail'></i>
              </div>
              <span class="link hide">View Staff</span>
            </a>
          </li>
          <li>
            <a href="#" data-active="2" class="active">
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
            <h2><b>STUDENTS</b></h2>
          </center>
          <hr />
          <!-- <center>
            <p style="color: #bb2253">
              Please see the Students details you can delete or
              update of product.
            </p>
          </center> -->
          <table>
            <tr>
              <th>SL No.</th>
              <th>USN No.</th>
              <th>Course</th>
              <th>Batch</th>
              <th>Name</th>
              <th>Mob No</th>
              <th>Date_of_Birth</th>
              <th>Age</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Address</th>
              <th>Best Friend</th>
              <th>Delete</th>
            </tr>
            <?php
              include('connect.php');
              $student="select *from student";
              $result=mysqli_query($connect,$student)or die ("could not execute query");
              $slno=0;
              while($row=mysqli_fetch_array($result))
              {
              $slno++;
            ?>
          <form action="#" method="post">
            <input type="hidden" name="mobile" value="<?php echo $row['mobile']; ?>">
            <tr>
              <td><?php echo $slno; ?></td>
              <td><?php echo $row['usn_no']; ?></td>
              <td><?php echo $row['course']; ?></td>
              <td><?php echo $row['batch']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['mobile']; ?></td>
              <td><?php echo $row['dob']; ?></td>
              <td><?php echo $row['age']; ?></td>
              <td><?php echo $row['gender']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['address']; ?></td>
              <td><?php echo $row['friend']; ?></td>
              <td><input type="submit" class="btn" name="delete" value="Delete"></td> 
            </tr>
          </form>
            <?php
              }
              if(isset($_POST['delete']))
              {
                include('connect.php');
                $mobile=$_POST['mobile'];
                $delete="delete from student where mobile='$mobile'";
                $result=mysqli_query($connect,$delete)or die("could not execute query");
                if($result==1)
                {
                  echo '<script>';
                  echo 'swal("Success","Student deleted successfully","success")';
                  echo '</script>';

                }else{
                  echo '<script>';
                  echo 'swal("Sorry","Student deleted not successfully","error")';
                  echo '</script>';
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
  }else
  {
    header("Location:../index.php");
    exit();
  }
?>