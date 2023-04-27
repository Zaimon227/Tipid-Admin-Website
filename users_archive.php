<?php
session_start();
require "DBConfig.php";

if (isset($_SESSION['username'])) {
    $sql = "SELECT * FROM users WHERE is_archived = 1";
    $result = mysqli_query($conn, $sql);

    if(isset($_POST['val'])) {
        $val = $_POST['val'];
        $field = $_POST['field'];

        $sql = "SELECT * FROM users WHERE $field = '$val' AND is_archived = 1";
        $result = mysqli_query($conn, $sql);
    }
    if(isset($_POST['refresh'])) {
        $sql = "SELECT * FROM users WHERE is_archived = 1";
        $result = mysqli_query($conn, $sql);

    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users Page</title>
    <link rel="stylesheet" type="text/css" href="tipid_style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
    <div class="main_container">
        <div class="menu_container">
            <img class="menu_logo" src="graphics/tipid_logo.png" height="100px" width="100px">
            <h2 class="menu_app_label">Tipid</h2>
            <h4 class="admin_label">Admin <?php echo $_SESSION['username'];?></h4>
            <ul>
                <a href="home.php">
                    <li>
                        <div class="home">
                            <span class="icon_database_home"><img src="graphics/icon_home.png" height="15px" width="15px"></span>
                            <span class="home">Home</span>
                        </div>
                    </li>
                </a>
                <a href="logs.php">
                    <li>
                        <div class="logs">
                            <span class="icon_database_home"><img src="graphics/icon_logs.png" height="15px" width="15px"></span>
                            <span class="home">Logs</span>
                        </div>
                    </li>
                </a><br>
                <a href="users.php">
                    <li class="active">
                        <span class="icon_database"><img src="graphics/icon_database.png" height="15px" width="15px"></span>
                        <span class="label">Users</span>
                    </li>
                </a>
                <a href="expenses.php">
                    <li>
                        <span class="icon_database"><img src="graphics/icon_database.png" height="15px" width="15px"></span>
                        <span class="label">Expenses</span>
                    </li>
                </a>
                <a href="dues.php">
                    <li>
                        <span class="icon_database"><img src="graphics/icon_database.png" height="15px" width="15px"></span>
                        <span class="label">Dues</span>
                    </li>
                </a>
                <a href="debts.php">
                    <li>
                        <span class="icon_database"><img src="graphics/icon_database.png" height="15px" width="15px"></span>
                        <span class="label">Debts</span>
                    </li>
                </a>
                <a href="debtPayments.php">
                    <li>
                        <span class="icon_database"><img src="graphics/icon_database.png" height="15px" width="15px"></span>
                        <span class="label">Debt Payments</span>
                    </li>
                </a>
                <a href="savings.php">
                    <li>
                        <span class="icon_database"><img src="graphics/icon_database.png" height="15px" width="15px"></span>
                        <span class="label">Savings</span>
                     </li>
                </a>
                <a href="savingGoals.php">
                    <li>
                        <span class="icon_database"><img src="graphics/icon_database.png" height="15px" width="15px"></span>
                        <span class="label">Saving Goals</span>
                    </li>
                </a>
                <a href="bonus.php">
                        <li>
                            <span class="icon_database"><img src="graphics/icon_database.png" height="15px" width="15px"></span>
                            <span class="label">Bonus</span>
                        </li>
                </a><br>
                <a href="logout.php">
                    <li>
                        <div class="logout">
                            <span class="icon_database_logout"><img src="graphics/icon_logout.png" height="15px" width="15px"></span>
                            <span class="logout">Logout</span>
                        </div>
                    </li>
                </a>
            </ul>
        </div>

        <div class="content_container">
            <?php
            if (isset($_SESSION['status'])) {
            ?>
                <div class="alert show">
                    <span class="alert_icon"><img src="graphics/icon_alert.png" width="15px" height="15px"></span>
                    <span class="msg"><?php echo $_SESSION['status'];?></span>
                    <span class="close-btn">
                        <span class="alert_close"><img src="graphics/icon_exit.png" width="15px" height="15px"></span>
                    </span>
                </div>

                <script>
                    $('.close-btn').click(function(){
                        $('.alert').addClass("hide");
                        $('.alert').removeClass("show");
                    });
                </script>
            <?php
                unset($_SESSION['status']);
            }
            ?>

            <div class="tables_header">
            <h1 class="table_label">Users Table</h1>
            <br><a class="archive_button_active" href="users.php">Archive</a><br>
            </div>
            
            <div class="search_bar">
                <form method="Post" action="users.php">Category:
                <select class ="input_box" name="field">
                    <option value="username">Username</option>
                    <option value="monthly_earnings">Monthly Earnings</option>
                </select>

                <input class="search_box" type="text" name="val" placeholder="Search">
                <button type="submit" name="search" value="Search">Search</button>
                <button type="submit" name="refresh" value="Refresh">Refresh</button>
                </form>
            </div>

            <table class="data_table">
                <tr class="data_tr">
                    <th>ID</th>
                    <th>Username</th>
                    <th>Monthly Earnings</th>
                    <th></th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr class="data_tr">
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['username'];?></td>
                            <td><?php echo $row['monthly_earnings'];?></td>
                            <td>
                                <a href="editUser_confirm.php?id=<?php echo $row['id'];?>"><img src="graphics/icon_edit.png" alt="Edit" width="20" height="20"></a>
                                <a href="deleteUser.php?id=<?php echo $row['id'];?>"><img src="graphics/icon_delete.png" alt="Delete" width="20" height="20"></a>
                            </td>
                        </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</body>
</html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>