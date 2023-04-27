<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="tipid_style.css">
</head>
<body>
    <div class="background_container">
        <div class="overlay_container">
            <div class="login_form">
                <img class="login_logo" src="graphics/tipid_logo.png" height="150px" width="150px">
                <h1 class="app_name">TIPID</h1>
                <form action="login.php" method="post">
                    <h2 class="login_header">Login</h2>
                    
                    <div class="input_group">
                        <label class="login_label">Username</label><br>
                        <input class="login_input" type="text" name="username"><br>
                    </div>

                    <div class="input_group">
                        <label class="login_label">Password</label><br>
                        <input class="login_input" type="password" name="password"><br>
                    </div>

                    <button class="login_button" type="submit" name="submit" value="login">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>