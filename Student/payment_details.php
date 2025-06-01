<?php
session_start();
if (isset($_SESSION['mobile'])) {
  $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
  if (!$connect) {
    die("Could not connect to the MySQL Database" . mysqli_error());
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
      <title>View Feedback</title>
      <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="./CSS/navbar_footer.css" />
      <link rel="stylesheet" href="./CSS/student_home.css" />
      <link rel="stylesheet" href="./CSS/viewstaff.css" />
      <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
      <script>
        function goback() {
          window.history.back(-1);
        }
      </script>
      <style>
        tr {
          box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.15);
        }

        .vpmaincontainer {
          margin-top: 2rem;
          width: 80vw;
        }

        .vpcontainer .btn {
          padding: 10px 10px;
          text-shadow: 0.5px 0px 1px;
          font-size: 0.9rem;
        }

        .vpcontainer {
          position: relative;
        }

        .cancel {
          font-size: 40px;
          border: 2px solid;
          color: #003366;
          border-radius: 10px;
          text-align: center;
          position: absolute;
          right: 3rem;
          top: 1.75rem;
          cursor: pointer;
        }

        .cancel:hover {
          color: #fff;
          background-color: #003366;
          border: 2px solid;
        }
      </style>
    </head>

    <body>

      <!-- start view Product container -->
      <div class="vpmaincontainer side">
        <div class="vpcontainer">
        <i class='bx bx-arrow-back cancel' onclick="goback()"></i>
          <center>
            <h2><b>Payment Details</b></h2>
          </center>
          <hr />
          <table>
            <tr>
              <th>Sem</th>
              <th>Mobile No</th>
              <th>Receipt No</th>
              <th>Payment ID</th>
              <th>Paid Amount</th>
              <th>Paid Date</th>
              <th>Payment Status</th>
              <th>Print Receipt</th>
            </tr>
            <?php
            $mobile = $_GET['mobile'];
            $sem = $_GET['sem'];
            $query = "select * from transaction_details where mobile = '$mobile' and sem = '$sem'";
            $result = mysqli_query($connect, $query) or die("could not exceute query");
            while ($row = mysqli_fetch_array($result)) {
              ?>
              <tr>
                <td>
                  <?php echo $row['sem']; ?>
                </td>
                <td>
                  <?php echo $row['mobile']; ?>
                </td>
                <td>
                  <?php echo $row['reciept_no']; ?>
                </td>
                <td>
                  <?php echo $row['payment_id']; ?>
                </td>
                <td>
                  <?php echo $row['paid_amt']; ?>
                </td>
                <td>
                  <?php echo $row['paid_date']; ?>
                </td>
                <td>
                  <?php echo $row['payment_status']; ?>
                </td>
                <td>
                  <a class="btn" href="pdf.php?reciept_no=<?php echo $row['reciept_no']; ?>">Print
                    Receipt</a>
                </td>
              </tr>
              <?php
            }
            ?>
          </table>
        </div>
      </div>

      <script src="../JS/index.js"></script>
      <script src="../JS/student.js"></script>
    </body>

    </html>

    <?php
  }
} else {
  header("Location:../index.php");
  exit();
}

?>