<?php
session_start();
if (isset($_SESSION['username'])) {
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fees Details</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap"
      rel="stylesheet" />
    <link rel="stylesheet" href="./CSS/sidebar.css" />
    <link rel="stylesheet" href="./CSS/admin_create_staff.css" />
    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/viewstaff.css">
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
      .container::before,
      form::before {
        display: none;
      }

      .container {
        margin: 0;
        padding: 0;
      }

      .vpmaincontainer {
        margin: 2rem 0;
      }

      body.shrink .vpcontainer {
        width: 80vw;
        margin: 0 0 0 3rem;
      }

      .bx-x {
        font-size: 2.5rem;
        color: #003366;
        position: absolute;
        top: 8rem;
        right: 3rem;
        border-radius: 10px;
        border: 2px solid #003366;
        cursor: pointer;
      }
      .bx-x:hover {
        background-color: #003366;
        color: #fff;
      }
    </style>
    <script>
      function goback() {
        window.location.href = "fees_details.php";
      }
      function sea() {
        var mobile = document.getElementById("mobile_no").value;
        // Validation for user mobile number
        var mobnoRegex = /^[0-9]+$/;
        if (!mobnoRegex.test(mobile)) {
          alert("Enter Valid Mobile Number.");
          document.myForm.mobile_no.focus();
          document.myForm.mobile_no.style.border = "solid 2px red";
          return false;
        }
        else if (mobile == "" || mobile.length < 10) {
          alert("Please Provide valid Mobile Number");
          document.myForm.mobile_no.focus();
          document.myForm.mobile_no.style.border = "solid 2px red";
          return false;
        }
        else {
          document.myForm.mobile_no.focus();
          document.myForm.mobile_no.style.border = "2px solid #2476c8";
        }
      }
    </script>
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
            <a href="#" class="active">
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
      <div class="container">
        <h1>FEES DETAILS</h1>
        <form action="#" method="post" class="search_form" name="myForm" onsubmit="return sea()">
          <div class="input-container">
            <label for="mobile">Mobile No.</label>
            <input type="text" name="mobile" id="mobile_no" />
          </div>
          <div class="buttons">
            <div>
              <input class="submit" type="submit" name="search" id="search" value="Search">
            </div>
          </div>
        </form>
        <i class="bx bx-x" onclick="goback()"></i>
        <!-- start view Product container -->
        <div class="vpmaincontainer">
          <div class="vpcontainer">
            <table>
              <tr>
                <th>Mob No</th>
                <th>Course</th>
                <th>Sem</th>
                <th>Total sem Fees</th>
                <th>Total Fees Paid</th>
                <th>Fees Remaining</th>
                <th>Pay Now</th>
                <th>Payment Details</th>
              </tr>
              <?php
              $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
              if (isset($_POST['search'])) {
                $mobile = $_POST['mobile'];
                $searchQuery = "select * from fees where mobile = '$mobile'";
                $resultQuery = mysqli_query($connect, $searchQuery) or die("Could not execute Query");
                while ($row = mysqli_fetch_array($resultQuery)) {
                  ?>
                  <tr id="myUL">
                    <input type="hidden" name="mobile" id="mobile" value="<?php echo $row['mobile']; ?>">
                    <td>
                      <?php echo $row['mobile']; ?>
                    </td>
                    <td>
                      <?php echo $row['course']; ?>
                    </td>
                    <td>
                      <?php echo $row['sem']; ?>
                    </td>
                    <td>
                      <?php echo $row['total_sem_fees']; ?>
                    </td>
                    <td>
                      <?php echo $row['total_fees_paid']; ?>
                    </td>
                    <td>
                      <?php echo $row['total_fees_remaining']; ?>
                    </td>
                    <td>
                      <a href="pay_now.php?mobile=<?php echo $row['mobile']; ?>&sem=<?php echo $row['sem']; ?>">Pay Now</a>
                    </td>
                    <td>
                      <a href="payment_details.php?mobile=<?php echo $row['mobile']; ?>">View Payments</a>
                    </td>
                  </tr>
                  <?php
                }
              } else {
                $query = "select *from fees";
                $result = mysqli_query($connect, $query) or die("could not exceute query");
                while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <tr>
                    <input type="hidden" name="mobile" id="mobile" value="<?php echo $row['mobile']; ?>">
                    <td>
                      <?php echo $row['mobile']; ?>
                    </td>
                    <td>
                      <?php echo $row['course']; ?>
                    </td>
                    <td>
                      <?php echo $row['sem']; ?>
                    </td>
                    <td>
                      <?php echo $row['total_sem_fees']; ?>
                    </td>
                    <td>
                      <?php echo $row['total_fees_paid']; ?>
                    </td>
                    <td>
                      <?php echo $row['total_fees_remaining']; ?>
                    </td>
                    <td><a href="pay_now.php?mobile=<?php echo $row['mobile']; ?>&sem=<?php echo $row['sem'];?>">Pay Now</a></td>
                    <td><a href="payment_details.php?mobile=<?php echo $row['mobile']; ?>">View Payments</a></td>
                  </tr>
                  <?php
                }
              }
              ?>
            </table>
          </div>
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
} else {
  header("location:../index.php");
  exit();
}
?>