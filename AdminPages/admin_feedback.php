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
    <title>Feedback</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/sidebar.css">
    <link rel="stylesheet" href="./CSS/viewstaff.css">
    <script src="./sweetalert2.all.min.js"></script>
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
            <a href="admin_feedback.php" data-active="4" class="active">
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
            <h2><b>Feedback</b></h2>
          </center>
          <hr />
          <table>
            <tr>
              <th>Sl. No</th>
              <th>Username</th>
              <th>Mob No</th>
              <th>Feedback Date</th>
              <th>Feedback On</th>
              <th>Feedback Message</th>
              <th>Ratings</th>
              <th>Reply Message</th>
              <th>Action</th>
              <th>Delete</th>
            </tr>
            <?php
              $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
              if(!$connect)
              {
                die("Could not connect to the MySQL Database...".mysqli_error());
              }
              else{
                $query = "select * from feedback";
                $result = mysqli_query($connect, $query) or die("Could not execute Feedback Query");
                if(mysqli_num_rows($result)<1)
                {
                  ?>
                  <tr><td>No records Found</td></tr>
                  <?php
                }else{
                $slno = 0;
                while($row = mysqli_fetch_array($result))
                {
                  $slno++;
                ?>
                  <form action="#" method="post">
                <tr>
                    <input type="hidden" name="fid" value="<?php echo $row['fid'] ?>">
                    <td><?php echo $slno; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['fdate']; ?></td>
                    <td><?php echo $row['fon']; ?></td>
                    <td><?php echo $row['fmsg']; ?></td>
                    <td><?php echo $row['rating']; ?></td>
                    <td><textarea rows="1" style="resize: none; border: 1px solid #999; padding: 5px 0px 0 0; border-radius: 5px;" name="replymessage" ><?php echo $row['replymsg']; ?> </textarea></td>
                    <td><input type="submit" class="btn" name="reply" value="Reply"></td>
                    <td><input type="submit" class="btn" name="delete" value="Delete"></td>
                  </form>
                </tr>
                <?php
                }}    
                if(isset($_POST['reply']))
                {
                  $fid = $_POST['fid'];
                  $replymessage = $_POST['replymessage'];
                  $query = "update feedback set replymsg = '$replymessage' where fid = '$fid'";
                  $result = mysqli_query($connect, $query) or die("Could not Execute Query");
                  if($result==1)
                  {
                    echo '<script>';
                    echo 'swal("Sent", "Reply message sent Successfully...", "success")';
                    echo '</script>';
                  }
                  else{
                    echo '<script>';
                    echo 'swal("Sorry", "Reply message Could not sent ...", "error")';
                    echo '</script>';
                  }
                }
                else if(isset($_POST['delete']))
                {
                  $fid = $_POST['fid'];
                  $queryDelete = "delete from feedback where fid = '$fid'";
                  $result = mysqli_query($connect, $queryDelete) or die("Could not execute Query");
                  if($result == 1)
                  {
                    echo '<script>';
                    echo 'swal("Deleted", "Feedback deleted Successfully...", "success")';
                    echo '</script>';
                  }
                  else{
                    echo '<script>';
                    echo 'swal("Not Deleted", "Could not Delete Feedback...", "error")';
                    echo '</script>';
                  }
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