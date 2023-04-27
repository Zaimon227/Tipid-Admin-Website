<?php
require "DBConfig.php";

$id = $_GET['id'];

$sql = "SELECT * FROM debt_payments WHERE id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Debt Payment</title>
    <link rel="stylesheet" type="text/css" href="tipid_style.css">
</head>
<body>
    <div class="background_container">
        <div class="overlay_container">
            <form class="add_form" method="post" action="editDebtPayment_process.php?id=<?php echo $id;?>">
                <div class="close">
                    <a href="debtPayments.php"><img src="graphics/icon_exit.png" alt="Cancel" width="20" height="20"></a>
                </div>
                <div>
                    <h1 class="add_header">Edit Debt Payment</h1>
                    User ID:<br>
                    <input class="add_input" type="number" name="UserID" value="<?php echo $row['user_id'];?>" readonly><br>
                    Debt ID:<br>
                    <input class="add_input" type="number" name="DebtID" value="<?php echo $row['debt_id'];?>"><br>
                    Amount Paid:<br>
                    <input class="add_input" type="text" name="Amount" value="<?php echo $row['amount'];?>"><br>
                    Date Paid:<br>
                    <input class="add_input" type="date" name="Date" value="<?php echo $row['date'];?>"><br>
                    <button class="add_button" type="submit" name="Submit">Apply</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>