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
    <title>Students</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./CSS/sidebar.css" />
    <link rel="shortcut icon" href="../SVG/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/viewstaff.css" />
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
            <a href="#" class="active">
              <div class="icon">
                <i class="bx bx-user-circle"></i>
                <i class="bx bxs-user-circle"></i>
              </div>
              <span class="link hide">Students</span>
            </a>
          </li>
          <li>
            <a class="staff">
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
            <a href="./batch_view.php">
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
      <div class="vpmaincontainer container">
        <div class="vpcontainer content">
          <h1>STUDENTS</h1>
          <hr />
          <table>
            <tr>
              <th>Sl No.</th>
              <th>Name</th>
              <th>Mob No</th>
              <th>Date_of_Birth</th>
              <th>Age</th>
              <th>Gender</th>
              <th>E-mail</th>
              <th>Address</th>
              <th>Best Friend</th>
              <th>Allocate Batch</th>
              <th>Allocate Course</th>
              <th>USN No</th>
              <th>Allocate</th>
              <th>Delete</th>
            </tr>
            <?php
              include('connect.php');
              $student="select *from student";
              $result=mysqli_query($connect, $student)or die ("could not execute query");
              $slno=0;
              foreach($result as $row)
              {
              $slno++;
            ?>
          <form action="#" method="post">
            <input type="hidden" name="mobile" value="<?php echo $row['mobile']; ?>">
            <tr>
              <td><?php echo $slno; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['mobile']; ?></td>
              <td><?php echo $row['dob']; ?></td>
              <td><?php echo $row['age']; ?></td>
              <td><?php echo $row['gender']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['address']; ?></td>
              <td><?php echo $row['friend']; ?></td>
              <td><select name="batch">
                <?php
              include('connect.php');
              $student="select *from batch";
              $result=mysqli_query($connect,$student)or die ("could not execute query");
              while($row1=mysqli_fetch_array($result))
              {   
            ?><option><?php echo $row1['batch_year'];?></option>
            <?php }?>
              </select>
              </td>
              <td><select name="course">
                <?php
              include('connect.php');
              $student="select *from course";
              $result=mysqli_query($connect,$student)or die ("could not execute query");
              while($row2=mysqli_fetch_array($result))
              {
            ?><option><?php echo $row2['course_name']; ?></option>
            <?php }?>
              </select>
              </td>
              <td><input type="text" name="usn" id="usn" value="<?php echo $row['usn_no']; ?>"></td>
              <td><input type="submit" class="btn" name="allocate" value="Allocate"></td>
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
                  header('Refresh:0');
                }else{
                  echo '<script>';
                  echo 'swal("Sorry","Student deleted not successfully","error")';
                  echo '</script>';
                }
              }
              else if(isset($_POST['allocate']))
              {
                include('connect.php');
                $mobile=$_POST['mobile'];
                $usn=$_POST['usn'];
                $batch = $_POST['batch'];
                $course = $_POST['course'];
                $query = "";
                $allocate="update student set usn_no = '$usn', batch = '$batch', course = '$course' where mobile='$mobile'";
                $result=mysqli_query($connect,$allocate)or die("could not execute query");
                if($result==1)
                {
                  echo '<script>';
                  echo 'swal("Allocated","Student details allocated successfully","success")';
                  echo '</script>';
                  header("Refresh:3");
                }else{
                  echo '<script>';
                  echo 'swal("Sorry","Student details couldn\'t allocated ","error")';
                  echo '</script>';
                }
              }
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