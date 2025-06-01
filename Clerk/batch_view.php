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
    <title>View Batch</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap"
      rel="stylesheet"
      />
    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/sidebar.css" />
    <link rel="stylesheet" href="./CSS/viewstaff.css">
    <script src="sweetalert2.all.min.js"></script>
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
        <p>CLERK</p>
      </div>
      <div class="sidebar-links">
        <ul>
          <li>
            <a href="./home_clerk.php">
              <div class="icon">
                <i class="bx bx-tachometer"></i>
                <i class="bx bxs-tachometer"></i>
              </div>
              <span class="link hide">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="students_view.php">
              <div class="icon">
                <i class="bx bx-user-circle"></i>
                <i class="bx bxs-user-circle"></i>
              </div>
              <span class="link hide">Students</span>
            </a>
          </li>
      
          <li>
            <a class="staff active">
              <div class="icon">
                <i class="bx bx-folder-open"></i>
                <i class="bx bxs-folder-open"></i>
              </div>
              <span class="link hide">Batch</span>
              <i class="bx bxs-chevron-down left"></i>
            </a>
          </li>
          <li class="staff-close">
            <a href="./batch_create.php">
              <div class="icon">
                <i class="bx bxs-file-plus"></i>
                <i class="bx bxs-file-plus"></i>
              </div>
              <span class="link hide">Create Batch</span>
            </a>
            <a href="#" class="live">
              <div class="icon">
                <i class="bx bx-file"></i>
                <i class="bx bxs-file"></i>
              </div>
              <span class="link hide">View Batch</span>
            </a>
          </li>
          <li>
            <a class="course">
              <div class="icon">
                <i class="bx bx-sitemap"></i>
                <i class="bx bx-sitemap"></i>
              </div>
              <span class="link hide">Course</span>
              <i class="bx bxs-chevron-down course_left"></i>
            </a>
          </li>
          <li class="course-close">
            <a href="./course_create.php">
              <div class="icon">
                <i class="bx bx-folder-plus"></i>
                <i class="bx bxs-folder-plus"></i>
              </div>
              <span class="link hide">Create Course</span>
            </a>
            <a href="./course_view.php">
              <div class="icon">
                <i class="bx bx-folder"></i>
                <i class="bx bxs-folder"></i>
              </div>
              <span class="link hide">View Course</span>
            </a>
          </li>
          <li>
            <a href="./students_promote.php">
              <div class="icon">
                <i class="bx bx-user-plus"></i>
                <i class="bx bxs-user-plus"></i>
              </div>
              <span class="link hide">Students Promote</span>
            </a>
          </li>
          <li>
            <a href="./fees_details.php">
              <div class="icon">
                <i class="bx bx-bar-chart-alt-2"></i>
                <i class="bx bxs-bar-chart-alt-2"></i>
              </div>
              <span class="link hide">Fees Details</span>
            </a>
          </li>
          <li>
            <a href="./change_password_clerk.php">
              <div class="icon">
                <i class="bx bx-lock-open-alt"></i>
                <i class="bx bxs-lock-open-alt"></i>
              </div>
              <span class="link hide">Change Password</span>
            </a>
          </li>
          <li>
            <a href="logout.php">
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
      <div class="vpmaincontainer">
        <div class="vpcontainer content">
          <h1>BATCHES</h1>
          <hr />
          <table>
            <tr>
              <th>Sl No.</th>
              <th>Batch Name</th>
              <th>Batch Year</th>
              <th>Total Students</th>
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
                $query = "select *from batch";
                $result = mysqli_query($connect, $query) or die("Could not execute query");
                $slno=0;
                while ($row =mysqli_fetch_array( $result )){
                  $slno++;
            ?>
            <form action="#" method="post">
              <input type="hidden" name="batch_id" value="<?php echo $row['batch_id']; ?>">
            <tr>
              <td><?php echo $slno; ?></td>
              <td><input type="text" name="batch_name" value="<?php echo $row['batch_name']; ?>"></td>
              <td><input type="text" name="batch_year" value="<?php echo $row['batch_year']; ?>"></td>
              <td><input type="text" name="no_of_students" value="<?php echo $row['no_of_students']; ?>"></td>
              <td><input class="btn" type="submit" name="update" value="Update"></td>
              <td><input class="btn" type="submit" name="delete" value="Delete"></td>
            </tr>
          </form>
          <?php
            }

          if(isset($_POST['update']))
          {
            $batch_id = $_POST['batch_id'];
            $batch_name = $_POST['batch_name'];
            $batch_year = $_POST['batch_year'];
            $no_of_students = $_POST['no_of_students'];

            $queryUpdate = "update batch set batch_name = '$batch_name', batch_year = '$batch_year', no_of_students = '$no_of_students' where batch_id = '$batch_id'";
            $result = mysqli_query($connect, $queryUpdate) or die("Could not execute Query");
            if($result == 1)
            {
              echo '<script>';
              echo 'swal("Updated", "Batch Details Updated Successfully...", "success")';
              echo '</script>';
              header("Refresh:2");
            }
            else{
              echo '<script>';
              echo 'swal("Sorry", "Couldnt Update Batch...", "error")';
              echo '</script>';
              header("Refresh:2");
            }
          }else if(isset($_POST['delete']))
            {
              $batch_id = $_POST['batch_id'];
              $delQuery = "delete from batch where batch_id = '$batch_id'";
              $result = mysqli_query($connect, $delQuery) or die("Could not execute Query");
              if($result==1)
              {
                echo '<script>';
                echo 'swal("Deleted", "Batch Deleted Successfully...", "success")';
                echo '</script>';
                header("Refresh:2");
              }
              else
              {
                echo '<script>';
                echo 'swal("Sorry", "Could not Delete Batch...", "error")';
                echo '</script>';
                header("Refresh:2");
              }
            }}
          ?>
          </table>
        </div>
      </div>

      <p class="copyright">
        &copy; 2023 - <span>College FeePayr</span> All Rights Reserved.
      </p>
    </main>
    <script src="../JS/sidebar.js"></script>
  </body>
</html>
<?php
  }
  else
  {
    header("Location:../index.php");
    exit();
  }
?>