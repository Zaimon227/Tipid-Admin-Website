<?php
require "DBConfig.php";

$id = $_GET['id'];

$sql = "SELECT * FROM debts WHERE id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Debt</title>
    <link rel="stylesheet" type="text/css" href="tipid_style.css">
</head>
<body>
    <div class="background_container">
        <div class="overlay_container">
            <form class="add_form" method="post" action="editDebt_process.php?id=<?php echo $id;?>">
                <div class="close">
                    <a href="debts.php"><img src="graphics/icon_exit.png" alt="Cancel" width="20" height="20"></a>
                </div>
                <div>
                    <h1 class="add_header">Edit Debt</h1>
                    User ID:<br>
                    <input class="add_input" type="number" name="UserID" value="<?php echo $row['user_id'];?>" readonly><br>
                    Debt Name:<br>
                    <input class="add_input" type="text" name="Name" value="<?php echo $row['name'];?>"><br>
                    Amount Paid<br>
                    <input class="add_input" type="text" name="PaidAmount" value="<?php echo $row['paid_amount'];?>"><br>
                    Total Debt:<br>
                    <input class="add_input" type="text" name="TotalDebt" value="<?php echo $row['total_debt'];?>"><br>
                    Date Debt Created:<br>
                    <input class="add_input" type="date" name="Date" value="<?php echo $row['date'];?>"><br>
                    <button class="add_button" type="submit" name="Submit">Apply</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>