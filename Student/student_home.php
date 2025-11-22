<?php
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
      <title>Student Home</title>
      <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="./CSS/navbar_footer.css">
      <link rel="stylesheet" href="./CSS/home.css">
      <link rel="stylesheet" href="./CSS/student_home.css">
      <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
      <script src="../JS/sweetalert2.all.min.js"></script>
    </head>

    <body>
      <header class="header">
        <div class="logo">
          <p class="title">College FeePayr</p>
          <p class="slogan">Fees Management System</p>
        </div>
        <nav class="navbar">
          <ul class="navbar-list">
            <li><a class="navbar-link active" href="#">Home</a></li>
            <li><a class="navbar-link" href="#cont">Features</a></li>
            <li><a class="navbar-link" href="./fees_details.php">Fees Details</a></li>
            <li>
              <a class="navbar-link show" href="#">Feedback</a>
              <ul class="view">
                <li>
                  <a href="./give_feedback.php"><input type="button" name="give" id="give" value="Give Feedback" class="btn"></a>
                </li>
                <li>
                  <a href="./student_view_feedback.php"><input type="button" name="view" id="view" value="View Feedback" class="btn"></a>
                </li>
              </ul>
            </li>
            <li class="profile">
              <a class="navbar-link show-1" href="#"><i class="bx bx-user">
                </i></a>
              <ul class="view-1">
                <li><a href="profile.php">Profile<p>
                      <?php echo $row['name']; ?>
                    </p></a></li>
                <li><a href="./change_pass.php">Change Password</a></li>
                <li><a href="./logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </nav>
        <div class="mobile-navbar-btn">
          <i class="bx bx-menu"></i>
        </div>
      </header>

      <div class="title-div">
        <div class="main-title">
          <h1 class="main-title-h1">
            Pay your fees without stepping out of home<br />
          </h1>
        </div>
        <div class="sub-title">
          <h2>So, How does College FeePayr benefit me as a Student?</h2>
          <h5>Here's why you should use FeePayr to pay your fees</h5>
        </div>
      </div>

      <div class="container" id="cont">
        <div class="details">
          <div class="img">
            <img src="../Images/benefit-student-1.png" alt="" height="250px">
          </div>
          <div class="content" style="padding-left: 2rem">
            <h2>No Queues, Zero Waiting</h2>
            <p>
              Everyone dislikes waiting in queues to pay their fees. With
              FeePayr, there are no queues. You can pay your fees by
              logging in to your account instantly.<br /><br />College FeePayr lets
              you pay your Institute's fees as a 'king' with zero waiting.
            </p>
          </div>
        </div>
        <div class="details">
          <div class="content" style="padding-right: 2rem">
            <h2>Pay at your convenience</h2>
            <p>
              Say bye-bye to your institute's office and bank timings.
              College FeePayr works <em>24 x 7 x 365</em> so you can pay your fees
              even after the day is over, as per your convenience.<br /><br />College FeePayr
              saves time &amp; money and works or your smart phone.
            </p>
          </div>
          <div class="img">
            <img src="../Images/benefit-institute-3.png" alt="" height="250px">
          </div>
        </div>
        <div class="details">
          <div class="img">
            <img src="../Images/benefit-institute-9.png" alt="" height="250px">
          </div>
          <div class="content" style="padding-left: 2rem">
            <h2>Pay faster, with ease</h2>
            <p>
              With College FeePayr, students can pay their fees faster &amp; in a
              much easier way than before. College FeePayr processes payments in
              real-time, meaning students receive payment receipts as they
              pay - without having to wait in long queues.<br /><br />You
              can pay your fees by logging in to your account instantly.
            </p>
          </div>
        </div>
        <div class="details">
          <div class="content" style="padding-right: 2rem;">
            <h2>Wide range of payment options</h2>
            <p>
              College FeePayr supports and accepts payments from a wide range of
              payment options. Currently we support all major Indian Banks
              via Internet Banking, Credit &amp; Debit Cards, Mobile Wallets
              &amp; UPI.<br /><br />Over 6 Credit Card Networks, 53+ Net
              Banking, 98+ Debit Cards, 6 ATM Cards, 48 Bank's IMPS, 16
              Prepaid Instruments &amp; 11 Bank EMIs are supported as of
              now.
            </p>
          </div>
          <div class="img">
            <img src="../Images/benefit-student-2.png" alt="" height="250px">
          </div>
        </div>
        <div class="details">
          <div class="img">
            <img src="../Images/benefit-student-3.png" alt="" height="250px">
          </div>
          <div class="content" style="padding-left: 2rem">
            <h2>Lost Receipt? No Problem!</h2>
            <p>
              Have you ever lost the payment receipt you got from the bank
              or the institute, &amp; faced problems due to it? Not anymore.
              <br /><br />You will find receipts of all fee payments done
              online through College FeePayr to your institute inside your
              dashboard, kept safely. These payment receipts can be
              downloaded anytime required by simply logging in to your
              account.
            </p>
          </div>
        </div>
        <div class="details">
          <div class="content" style="padding-right: 2rem">
            <h2>Proper Alerts &amp; Notifications</h2>
            <p>
              All students receive proper Email &amp; SMS alerts upon
              successful payments done via the College FeePayr platform. Also, your
              payment is instantly reflected in the Institute's portal.<br /><br />Students
              can also download the payment receipts multiple times from the
              portal, if lost.
            </p>
          </div>
          <div class="img">
            <img src="../Images/benefit-institute-8.png" height="250px" alt="">
          </div>
        </div>
        <div class="details">
          <div class="img">
            <img src="../Images/benefit-institute-10.svg" height="250px" alt="">
          </div>
          <div class="content" style="padding-left: 2rem;">
            <h2>Your safety is our priority</h2>
            <p>
              College FeePayr is staged in a 256-bit SSL secured environment, which
              encrypts all data to-and-fro the servers. Apart from this, all
              students have their own logins &amp; we
              <em>DO NOT</em> store
              your Card / Banking details. <br /><br />Your profile data is
              secure with us &amp; we do not sell it to 3rd parties. That's
              a promise.
            </p>
          </div>
        </div>
      </div>
      </div>

      <script src="../JS/index.js"></script>
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