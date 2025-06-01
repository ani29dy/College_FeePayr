<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    h1, h2, p {
      text-align: center;
      color: #003366;
    }
    p {
      color: #111;
      font-size: 200%;
      margin-bottom: 1%;
    }
    h1 {
      margin-bottom: -3%;
    }
    table {
      padding: 1cm;
      padding-left: 1.75cm;
      text-align: center;
      width: 500px;
      margin: auto;
      border: 2px solid grey;
      border-radius: 0.85cm;
    }

    th, td {
      text-align: left;
      font-size: 125%;
    }
  </style>
</head>

<body>
  <h1>College FeePayr</h1>
  <h2>Fees Management System</h2>
    <p>Fee Reciept</p>
  <table>
    <tr>
      <th>Semester :</th>
      <td>
        <?php echo $row['sem']; ?>
      </td>
    </tr>
    <br>
    <tr>
      <th>Reciept No. :</th>
      <td>
        <?php echo $row['reciept_no']; ?>
      </td>
    </tr>
    <br>

    <tr>
      <th>Payment ID :</th>
      <td>
        <?php echo $row['payment_id']; ?>
      </td>
    </tr>
    <br>

    <tr>
      <th>Mobile No. :</th>
      <td>
        <?php echo $row['mobile']; ?>
      </td>
    </tr>
    <br>

    <tr>
      <th>Paid Amount :</th>
      <td>
        <?php echo $row['paid_amt']; ?>
      </td>
    </tr>
    <br>

    <tr>
      <th>Paid Date :</th>
      <td>
        <?php echo $row['paid_date']; ?>
      </td>
    </tr>
    <br>

    <tr>
      <th>Payment Status :</th>
      <td style="color:green;">
        <?php echo $row['payment_status']; ?>
      </td>
    </tr>
    <br>

  </table>
</body>

</html>