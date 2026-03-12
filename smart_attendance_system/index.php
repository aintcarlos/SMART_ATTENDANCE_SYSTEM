<?php
if(isset($_GET['error'])){
?>
<div class="error">
Invalid username or password
</div>
<?php
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <!-- LEFT SIDE -->
    <div class="left-panel">
        <div class="logo-area">
            <img src="logo.png" width="80">
            <h2>Smart Attendance</h2>
        </div>
    </div>

    <!-- RIGHT SIDE -->
    <div class="right-panel">

        <div class="login-box">

            <div class="icon">
                📊
            </div>

            <form action="login.php" method="POST">

                <label>Username</label>
                <input type="text" name="username" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <button type="submit">Login</button>

            </form>

        </div>

    </div>

</div>

</body>
</html>