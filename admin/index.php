<?php
session_start();
require_once('dbconn.php');
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SOFT_ALL</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">


    <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">SOFT-ALL STUDENT</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php?page=user-profile"> <i class='fa fa-user'></i> Welcome : Mahadi Hasan Ebrahim </a></li>
                    <li><a href="registration.php"> <i class='fa fa-user-plus'></i> Add User </a></li>
                    <li><a href="index.php?page=user-profile"> <i class='fa fa-user'></i> Profile </a></li>
                    <li><a href="logout.php"> <i class='fa fa-power-off'></i> Logout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="index.php?page=dashboard" class="list-group-item active">
                        <i class='fa fa-dashboard'></i> Dashboard
                    </a>
                    <a href="index.php?page=add-student" class="list-group-item"> <i class='fa fa-user-plus'></i> Add Student</a>
                    <a href="index.php?page=all-student" class="list-group-item"> <i class='fa fa-users'></i> All Student</a>
                    <a href="index.php?page=all-user" class="list-group-item"> <i class='fa fa-users'></i> All User </a>
                </div>
            </div>
            <div class="col-md-9">
                <div class='content'>
                    <?php
                    
                        if(isset($_GET['page'])){
                            $pages = $_GET['page'].'.'.'php';
                        }else{
                            $pages = 'dashboard.php';
                        }
                        

                        if(file_exists($pages)){
                            require_once $pages;
                        }else{
                            require_once('404.php');
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>
    <footer class='down'>
        <p>Copy right &copy; 2015 - <?php echo date('Y'); ?> All Right Reserved</p>
    </footer>

</body>

</html>