<?php
session_start();
include_once "app/middleware/UserAuth.php";
if (empty($_SESSION['user-email'])) {
  header('location:user-login.php');
  die;
}
include_once 'app/models/Student.php';
if ($_GET) {
  if (isset($_GET['page'])){
    if ($_GET['page'] !== 'register'){
      header("location:app/Errors/404.php"); die;
    }
  } else {
    header("location:app/Errors/404.php");die;
  }
} else {
  header("location:app/Errors/404.php");die;
}
if ($_POST) {
  $errors = [];
  // Validation On Code Field
  if (empty($_POST['code'])) {
      $errors['required'] = "<div class='alert alert-danger'> Code Is Required </div>";
  } else {
      if (strlen($_POST['code']) != 5 || !is_numeric($_POST['code'])) {
          $errors['digits'] = "<div class='alert alert-danger'> Code Must Be 5 Numeric Digits </div>";
      }
  }

  if (empty($errors)) {
      // Assuming you have a class called Student with the required methods
      $studentObject = new Student();
      $studentObject->setEmail($_SESSION['user-email']);
      $studentObject->setCodeVerified($_POST['code']);
      $CheckResult = $studentObject->CheckCode();
      if ($CheckResult) {
          $studentObject->setStatus('Verified');
          $UpdateStatus = $studentObject->makeUserVerified();
          if ($UpdateStatus) {
              $success = "<div class='alert alert-success'> Your Account Have been Verified </div>";
              unset($_SESSION['user-email']);
              usleep(4000000); 
              header("location:user-login.php");
              die; // Always exit after a header redirect
          } else {
              $errors['something'] = "<div class='alert alert-danger'> Something Went Wrong </div>";
          }
      } else {
          $errors['wrong'] = "<div class='alert alert-danger'> Wrong Code </div>";
      }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verification Code</title>
  <!-- Add Bootstrap CSS link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">Verification Code</h4>
            <p class="card-text text-center">Please enter the code sent to your email.</p>

            <form method="post">
              <div class="form-group">
              <?php
                                        if (!empty($errors)) {
                                            foreach ($errors as  $value) {
                                                echo $value;
                                            }
                                        }
                                        ?>
                                                      <?php
                                        if (isset($success)) {
                                            echo $success;
                                        }
                                        ?>
                <input type="text" class="form-control" name="code" placeholder="Enter Code" />
              </div>
              <button type="submit" class="btn btn-primary btn-block">Verify</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Bootstrap JS and Popper.js script links at the end of the body -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>