<?php
  session_start();
  require_once('dbconn.php');
  if (isset($_POST['registration'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $photo = explode(".",$_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $username.".".$photo ;

    $input_error = array();

    if(empty($name)){
      $input_error['name']= "The Name Field is required.";
    }
    if(empty($email)){
      $input_error['email']= "The Email Field is required.";
    }
    if(empty($username)){
      $input_error['username']= "The Username Field is required.";
    }
    if(empty($password)){
      $input_error['password']= "The Password Field is required.";
    }
    if(empty($address)){
      $input_error['address']= "The Address Field is required.";
    }
    if(count($input_error)== 0){
      $sql_check = "SELECT * FROM `user` WHERE `email`='$email'";
      $email_check = mysqli_query($link,$sql_check);

      if(mysqli_num_rows($email_check)== 0 ){

        $sql_user = "SELECT * FROM `user` WHERE `username`='$username'";
        $username_check = mysqli_query($link,$sql_user);

        if(mysqli_num_rows($username_check)== 0 ){

          if(strlen($username)> 7){
            if(strlen($password)> 7){
              $password = md5($password);
              $sql_insert = "INSERT INTO `user`(`name`, `email`, `username`, `password`, `address`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$address','$photo_name','inactive')";
              $data_input = mysqli_query($link,$sql_insert);

              if($data_input){
                  move_uploaded_file($_FILES['photo']['tmp_name'],'uppicture/'.$photo_name);
                  header('location:login.php');
              }else{
                $_SESSION['error'] = 'Data Insert Error';
              }

            }else{
              $password_length = "Password More Than 8 Character ";
            }
          }else{
            $username_length = "Username More Than 8 Character ";
          }
        }else{
          $username_error = "This Username is Already Exist";
        }
      }else{
        $email_error = "This Email already Exist";
      }
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
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br><br><h1 class='text-center'>Registration Here</h1><br><br>
                <form action="" method='POST' enctype='multipart/form-data'>
                      <div class='form-horizontal'>
                        <div class='form-group'>
                            <label for="name"  class='control-label col-md-2'>Name:</label>
                            <div class='col-md-8'>
                              <input type="text" id='name'placeholder='Your Full Name' class='form-control' name='name' value="<?php if(isset($name)){echo $name;}?>">
                            </div>
                            <label class='input_error'>
                              <?php 
                                 if(isset($input_error['name'])){echo $input_error['name']; }
                              ?>
                            </label>
                        </div>
                        <div class='form-group'>
                            <label for="email"  class='control-label col-md-2'>Email:</label>
                            <div class='col-md-8'>
                              <input type="email" id='email'placeholder='Your Email' class='form-control' name='email' value="<?php if(isset($email)){echo $email;}?>">
                            </div>
                            <label class='input_error'> <?php  if(isset($input_error['email'])){echo $input_error['email']; }  ?>
                            <label class='input_error'> <?php  if(isset($email_error)){ echo $email_error; }  ?>
                            </label>
                        </div>
                        <div class='form-group'>
                            <label for="username"  class='control-label col-md-2'>Username:</label>
                            <div class='col-md-8'>
                              <input type="text" id='username' placeholder='Your Username' class='form-control' name='username' value="<?php if(isset($username)){echo $username;}?>">
                            </div>
                            <label class='input_error'> <?php  if(isset($input_error['username'])){echo $input_error['username']; }  ?>
                            <label class='input_error'> <?php  if(isset($username_error)){ echo $username_error; }  ?>
                            <label class='input_error'> <?php  if(isset($username_length)){ echo $username_length; }  ?>
                            </label>
                        </div>
                        <div class='form-group'>
                            <label for="password"  class='control-label col-md-2'>Password:</label>
                            <div class='col-md-8'>
                              <input type="password" id='password'placeholder='Your Password' class='form-control' name='password' value="<?php if(isset($password)){echo $password;}?>">
                            </div>
                            <label class='input_error'><?php  if(isset($input_error['password'])){echo $input_error['password']; } ?>
                            <label class='input_error'> <?php  if(isset($password_length)){ echo $password_length; }  ?>
                            </label>
                        </div>
                        <div class='form-group'>
                            <label for="address"  class='control-label col-md-2'>Address:</label>
                            <div class='col-md-8'>
                              <input type="address" id='address'placeholder='Your Address' class='form-control' name='address'value="<?php if(isset($address)){echo $address;}?>">
                            </div>
                            <label class='input_error'> <?php if(isset($input_error['address'])){echo $input_error['address']; }?></label>
                        </div>
                        <div class='form-group'>
                            <label for="photo"  class='control-label col-md-2'>Photo:</label>
                            <div class='col-md-8'>
                              <input type="file" id='photo' class='form-control' name='photo'>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-md-8 col-md-offset-2'>
                              <input type="submit"  class='btn btn-primary' Value='Registration' name='registration'>
                            </div>
                        </div>
                    </div>
                </form>
                <br/><p>If You have a  Account <a href="login.php">Login</a></p>
            </div>
        </div>
    </div>
    <footer>
    <hr/>
      <p>Copyright &copy; 💕 2015 - <?php echo date("Y")?> All Right Resereved</p>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
