
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login |User| University Housing</title>
    <link rel="stylesheet" href="Css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="login-box">
            <h1>Sign in</h1>
            <form action="app/requests/StudentLogin.php" class="form-style" method="post">
                <div class="inputs">
                    <input type="email" placeholder="Email Address " name="email">
                    <?php
                                        if (!empty($_SESSION['errors']['email'])) {
                                            foreach ($_SESSION['errors']['email'] as $key => $value) {
                                                echo "<div class='alert alert-danger'>$value</div>";
                                            }
                                        }
                                        ?>
                    <input type="password" placeholder="Password" name="password">
                    <?php
                                        if (!empty($_SESSION['errors']['password'])) {
                                            foreach ($_SESSION['errors']['password'] as $key => $value) {
                                                echo "<div class='alert alert-danger'>$value</div>";
                                            }
                                        }
                                        ?>

                </div>
                <div class="checkbox">
                    <input type="checkbox" name="remeber" id="remeber" name="remember_me">
                    <label for="remeber">Remeber me</label>
                </div>
                <div class="submit">
                    <input type="submit" value="Login" name="login">
                </div>
            </form>
        </div>
        <div class="logo">
            <div class="back">
                <a href="welcome-page.php"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <div class="img"></div>
        </div>
    </div>
</body>

</html>

<?php 
unset($_SESSION['errors']);
?>