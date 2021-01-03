<?php
require_once('admin/dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Soft-all Student information</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class='container'>
        <div class='row'>
            <div class="col-md-6 col-md-offset-3">
                <br><br>
                <a href='admin/login.php' class='btn btn-primary pull-right'>Login</a><br><br>
                <h1 class='text-center'>Soft-all Student Information</h1><br>
                <form action="" method='POST'>
                    <table class='table table-bordered'>
                        <tr>
                            <td colspan='2' class='text-center'><label>Student Information</label></td>
                        </tr>
                        <tr>
                            <td><label for="id">ID Number</label></td>
                            <td><input type="number" class='form-control' name='id' id="id" required placeholder='Type Your ID Number'></td>
                        </tr>
                        <tr>
                            <td><label for="choose">Choose Course Number</label></td>
                            <td>
                                <select class='form-control' name="choose" id="choose" required>
                                    <option value="0">Select</option>
                                    <option value="1">Gaphics</option>
                                    <option value="2">App Development</option>
                                    <option value="3">WEb Development</option>
                                    <option value="4">Wordpress Developer</option>
                                    <option value="5">Game Developer</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="batch">Batch Number</label></td>
                            <td><input type="text" class='form-control' id="batch" name='batch' required placeholder='Type Your Batch Number'></td>
                        </tr>
                        <tr class='text-center'>
                            <td colspan='2'><input type="submit" class='btn' value='Show Info' name='show_info'></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <!--row-->
        <?php
        if (isset($_POST['show_info'])) {
            $id = $_POST['id'];
            $choose = $_POST['choose'];
            $batch = $_POST['batch'];

            $sql_show = "SELECT * FROM `student` WHERE `id`='$id' and `course`='$choose' and `batch`='$batch'";
            $show = mysqli_query($link, $sql_show);

            if (mysqli_num_rows($show) == 1) {
                $row = mysqli_fetch_assoc($show);
        ?>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <td>Id</td>
                            <td><?= $row['id']; ?></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><?= ucwords($row['name']) ; ?></td>
                        </tr>
                        
                        <tr>
                            <td>Batch</td>
                            <td> <?= $row['batch']; ?></td>
                        </tr>
                        <tr>
                            <td>Course</td>
                            <td><?= $row['course']; ?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><?= $row['phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?= ucwords($row['address']); ?></td>
                        </tr>
                        <tr>
                            <td>Admited </td>
                            <td><?= $row['time']; ?></td>
                        </tr>
                        
                    </table>
                </div>
                <div class="col-md-4">
                    <a href="">
                        <img src="admin/student_img/<?= $row['picture']; ?>" style="width:200px;" class='img-thumbnail' alt="">
                    </a>
                </div>
            </div>
        </div>

        <?php
            } else {
        ?>
            <script type="text/javascript">
                alert('Data Not Found! TRY AGAIN');
            </script>
        <?php
            }
        }
        ?>

    </div>
    <!--container-->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>