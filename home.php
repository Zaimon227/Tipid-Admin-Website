<?php
session_start();
require "DBConfig.php";

if (isset($_SESSION['username'])) {
    $sql = "SELECT * FROM users WHERE is_archived is NULL";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);
    $_SESSION['number_users'] = $rows;

    $sql = "SELECT * FROM expenses WHERE is_archived is NULL";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);
    $_SESSION['number_expenses'] = $rows;

    $sql = "SELECT * FROM dues WHERE is_archived is NULL";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);
    $_SESSION['number_dues'] = $rows;

    $sql = "SELECT * FROM debts WHERE is_archived is NULL";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);
    $_SESSION['number_debts'] = $rows;
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" type="text/css" href="tipid_style.css">
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="chart.min.js"></script>
    </head>
    <body>
        <div class="main_container">
            <div class="menu_container">
                <img class="menu_logo" src="graphics/tipid_logo.png" height="100px" width="100px">
                <h2 class="menu_app_label">Tipid</h2>
                <h4 class="admin_label">Admin <?php echo $_SESSION['username'];?></h4>
                <ul>
                    <a href="home.php">
                        <li class="active">
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
                        <li>
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
                <table class="report_table">
                    <tr>
                        <td class="report_data">
                            <h1 class="home_label">Users</h1>
                            <img class="info_icon" src="graphics/icon_user.png" width="30px" height="30px">
                            <p class="info_text">Total Users:</p>
                            <p class="info_data"><?php echo $_SESSION['number_users'];?></p><br>
                            <p class="info_graphlabel">Monthly Earnings Bracket</p>
                            <div class="pie_chart">
                                <canvas id="GraphMonthly"></canvas>
                                <script type="text/javascript" src="GraphMonthlyEarnings.js"></script>
                            </div>
                        </td>
                        <td class="report_data">
                            <h1 class="home_label">Expenses</h1>
                            <img class="info_icon" src="graphics/icon_expense.png" width="30px" height="30px">
                            <p class="info_text">Total Expense Records:</p>
                            <p class="info_data"><?php echo $_SESSION['number_expenses'];?></p>
                            <p class="info_graphlabel2">Expense Category Frequency</p>
                            <canvas id="GraphCategory"></canvas>
                            <script type="text/javascript" src="GraphCategoryExpense.js"></script>
                        </td>
                    </tr>
                    <tr>
                        <td class="report_data">
                            <h1 class="home_label">Debts</h1>
                            <img class="info_icon" src="graphics/icon_debt.png" width="30px" height="30px">
                            <p class="info_text">Total Debt Records:</p>
                            <p class="info_data"><?php echo $_SESSION['number_debts'];?></p>
                            <p class="info_graphlabel2">Debts Paid Graph</p>
                            <div class="pie_chart">
                                <canvas id="GraphDebtsProgress"></canvas>
                                <script type="text/javascript" src="GraphDebtsProgress.js"></script>
                            </div>
                        </td>
                        <td class="report_data">
                            <h1 class="home_label">Dues</h1>
                            <img class="info_icon" src="graphics/icon_expense.png" width="30px" height="30px">
                            <p class="info_text">Total Due Records:</p>
                            <p class="info_data"><?php echo $_SESSION['number_dues'];?></p>
                            <p class="info_graphlabel2">Top 5 Due Frequency</p>
                            <canvas id="GraphTopDues"></canvas>
                            <script type="text/javascript" src="GraphTopDues.js"></script>
                        </td>
                    </tr>
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