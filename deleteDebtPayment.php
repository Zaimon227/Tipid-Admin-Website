<?php
require "DBConfig.php";

$id = $_GET['id'];

$sql = "SELECT * FROM debt_payments WHERE id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$debt_id = $row['debt_id'];
$amount = $row['amount'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Archive Debt Payment</title>
    <link rel="stylesheet" type="text/css" href="tipid_style.css">
</head>
<body>
    <div class="background_container">
        <div class="overlay_container">
            <div class="delete_form_payment">
                <h1 class="delete_header">Archived Debt Payment</h1>
                <p class="delete_dialog">Are you sure you want to archive debt payment record <?php echo $id;?> of debt ID <?php echo $debt_id;?> with an amount of <?php echo $amount;?>?</p><br>
                <a class="delete_button" href="debtPayments.php">Cancel</a>
                <a class="delete_button" href="deleteDebtPayment_process.php?id=<?php echo $id;?>">Archive</a>
            </div>
        </div>
    </div>

</body>
</html>