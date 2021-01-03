<?php
  session_start();
  require_once('dbconn.php');
  if(isset($_SESSION['email'])){
      header('location:index.php');
    }
  if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['pass'];

    $query = " SELECT * FROM `user` WHERE `email`='$email' ";
    $emailcheck = mysqli_query($link,$query);

    if(mysqli_num_rows($emailcheck) > 0){
      
      $row = mysqli_fetch_assoc($emailcheck);

      if($row['password'] == md5($password)){
        
        if($row['status']== 'active'){

          $_SESSION['email'] = $email;
          $_SESSION['password'] = $password;
          header('location:index.php');

        }else{
          $status_error = " Your Accout Is Inactive "; 
        }

      }else{
        $pass_error = " Password is't Correct "; 
      }

    }else{
        $email_error = "This Email Not Found"; 
    }

  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Soft-all Student Managment System</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class='text-center'>Soft-All Student Managment System</h1><br><br>
                <h2 class='text-center'>Admin login Here</h2>
                <form action="" method='POST'>
                    <div>
                        <input type="email" name='email' required Placeholder='Email Address' class='form-control' value="<?php if(isset($email)){echo $email;}?>">
                    </div>
                    <br>
                    <div>
                       <input type="password" name='pass' required Placeholder='Password' class='form-control' value="<?php if(isset($password)){echo $password;}?>">
                    </div><br>
                    <div>
                       <input type="submit" name='login' value='Login' class='btn btn-info pull-right'>
                    </div>
                    <a href="../index.php" class='btn btn-default'>Back</a>
                </form>
            </div>
        </div><br>
        <?php if(isset($email_error)){ echo '<div class="alert alert-danger col-md-4 col-md-offset-4">'.$email_error.'</div>'; } ?>
        <?php if(isset($pass_error)){ echo '<div class="alert alert-danger col-md-4 col-md-offset-4">'.$pass_error.'</div>'; } ?>
        <?php if(isset($status_error)){ echo '<div class="alert alert-danger col-md-4 col-md-offset-4">'.$status_error.'</div>'; } ?>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>