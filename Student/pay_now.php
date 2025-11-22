<?php
ob_start();
session_start();
if (isset($_SESSION['mobile'])) {
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pay Fees</title>
    <link rel="stylesheet" href="./CSS/admin_create_staff.css" />
    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
      body {
        overflow: scroll;
      }

      .signin {
        margin: auto;
        background-color: #fafafa;
        width: 40vw;
        box-shadow: 0 0 3px 3px rgba(0, 0, 0, 0.25);
        border-radius: 25px;
      }

      form {
        padding: 2rem 1rem;
        grid-column-gap: 5rem;
      }

      a {
        text-decoration: none;
        color: #fff;
        padding: 18px 35px;
      }

      h1 {
        font-size: 3rem;
        text-align: center;
        color: #003366;
      }

      .btn {
        width: 150px;
        box-shadow: 0 2px 2px 1px grey;
        text-shadow: 0.75px 0px 0px;
        cursor: pointer;
      }

      .btn1:hover {
        color: #fff;
        background-color: green;
      }

      .btn2:hover {
        color: #fff;
        background-color: red;
      }
    </style>
  </head>

  <body>
    <?php
    $connect = mysqli_connect("localhost", "root", "", "collegefeepayr");
    $mobile = $_GET['mobile'];
    $sem = $_GET['sem'];
    $searchQuery = "select * from fees where mobile = '$mobile' and sem = '$sem'";
    $resultQuery = mysqli_query($connect, $searchQuery) or die("Could not execute Query");
    $row = mysqli_fetch_array($resultQuery);
    ?>
    <div class="container">
      <h1>Pay Fees</h1>
      <form action="#" method="post">

        <input type="hidden" name="mobile" id="mobile" value="<?php echo $row['mobile']; ?>">

        <div class="input-container">
          <label for="mobile">Mobile</label>
          <input type="text" name="mobile" id="mobile" value="<?php echo $row['mobile']; ?>"
            readonly />
        </div>
        <div class="input-container">
          <label for="sem">Sem</label>
          <input type="text" name="sem" id="sem" value="<?php echo $row['sem']; ?>"
            readonly />
        </div>
        <div class="input-container">
          <label for="total_sem_fees">Total sem Fees</label>
          <input type="text" name="total_sem_fees" id="total_sem_fees"
            value="<?php echo $row['total_sem_fees']; ?>" readonly />
        </div>
        <div class="input-container">
          <label for="total_fees_paid">Total Fees Paid</label>
          <input type="text" name="total_fees_paid" id="total_fees_paid"
            value="<?php echo $row['total_fees_paid']; ?>" readonly />
        </div>
        <div class="input-container">
          <label for="rem_fees">Remaining fees</label>
          <input type="text" name="rem_fees" id="rem_fees"
            value="<?php echo $row['total_fees_remaining']; ?>" readonly />
        </div>
        <div class="input-container">
          <label for="amt_to_pay">Amount To Pay</label>
          <input type="text" name="amt_to_pay" id="amt_to_pay" />
        </div>
        <div class="buttons">
          <input type="button" onclick="return pay_now()" class="btn btn1" name="pay" id="pay"
            value="PayNow">
          <input type="button" name="cancel" id="cancel" value="Cancel" class="btn btn2"
            onclick="goback()">
        </div>
      </form>
    </div>
    <script>
      function goback() {
        window.history.back(-1);
      }
    </script>
    <script>
      function pay_now() {
        var mobile = jQuery('#mobile').val();
        var amt_to_pay = jQuery('#amt_to_pay').val();
        var rem_fees = jQuery("#rem_fees").val();
        var sem =jQuery("#sem").val();
        amt_to_pay =Number.parseInt(amt_to_pay);
        rem_fees =Number.parseInt(rem_fees);
        var mobnoRegex = /^[0-9]+$/;
        if (!mobnoRegex.test(amt_to_pay) || amt_to_pay == "" ) {
          alert("Enter Valid Amount to Pay.\nAmount should be only Numbers");
          return false;
        }
        else if (amt_to_pay > rem_fees) {
          swal("Ooop\'s", "You\'r trying to Pay more than remaining fees!", "error");
        } else {
          jQuery.ajax({
            type: 'post',
            url: 'payment_process.php',
            data: "mobile=" + mobile + "&amt_to_pay=" + amt_to_pay + "&sem=" + sem,
            success: function (result) {
              var options =
              {
                "key": "rzp_live_kk5tGkTaooRTd0",
                "amount": 1 * 100,
                "currency": "INR",
                "name": "College FeePayr",
                "description": "Test Transaction",
                "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                "handler": function (response) {
                  jQuery.ajax(
                    {
                      type: 'post',
                      url: 'payment_process.php',
                      data: "payment_id=" + response.razorpay_payment_id,
                      success: function (result) {
                        window.location.href = "thank_you.php";
                      }
                    });
                }
              };
              var rzp1 = new Razorpay(options);
              rzp1.open();
            }
          });
        }
      }
    </script>
  </body>

  </html>

  <?php
} else {
  header("Location:../index.php");
  exit();
}
?>