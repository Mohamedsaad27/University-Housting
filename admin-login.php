<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login |User| University Housing</title>
    <link rel="stylesheet" href="Css/login.css">
    <link rel="stylesheet" href="Css/bootstrap.min.css" />
    <link rel="stylesheet" href="Css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="login-box">
            <h1>Welcome Admin</h1>
            <form action="app/requests/adminlogin.php" class="form-style" method="POST">
                <div class="inputs">
                    <input type="email" placeholder="Enter Your E-mail " name="email" value="<?php if(isset($_POST['email'])) {
                                                                                                        echo $_POST['email'];
                                                                                                    } ?>">
                    <?php
                    if (!empty($_SESSION['errors']['email'])) {
                        foreach ($_SESSION['errors']['email'] as $key => $value) {
                            echo "<div class='alert alert-danger'>$value</div>";
                        }
                    }
                    ?>
                    <input type="password" placeholder="Enter Your Password" name="password">
                    <?php
                    if (!empty($_SESSION['errors']['password'])) {
                        foreach ($_SESSION['errors']['password'] as $key => $value) {
                            echo "<div class='alert alert-danger'>$value</div>";
                        }
                    }
                    if(!empty($_SESSION['errors']['dberror'])){
                            echo "<div class='alert alert-danger'>".$_SESSION['errors']['dberror']."</div>";
                    } 
                    ?>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="remeber" id="remeber" name="remember_me">
                    <label for="remeber">Remeber me</label>
                </div>
                <div class="submit">
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>
        <div class="logo">
            <div class="back">
                <a href="welcome-page.php"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <div class="img-admin">
                <img src="./images/login-form-1.jpeg" alt="">
            </div>
        </div>
    </div>
    <script src="Js/bootstrap.bundle.min.js"></script>
    <script src="Js/all.min.js"></script>
</body>
</html>
<?php 
session_unset();
?>