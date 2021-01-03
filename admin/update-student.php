<?php
require_once('dbconn.php');
    $id =  base64_decode($_GET['id']) ; 
    $sql = "SELECT * FROM `student` WHERE id='$id'";
   $db_data = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($db_data);


    if (isset($_POST['update-student'])) {

        $name = $_POST['name'];
        $batch = $_POST['batch'];
        $course = $_POST['course'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
    
        $sql_update = "UPDATE `student` SET `name`='$name',`batch`='$batch',`course`='$course',`phone`='$phone',`address`='$address'  WHERE id='$id' ";
        $student_update = mysqli_query($link,$sql_update);
        if($student_update){
            header('location:index.php?page=all-student');
        }
    }
?>


<h1 class='text-primary'> <i class='fa fa-dashboard'></i> Deshboard <small> Student Update </small> </h1>
<ol class="breadcrumb">
    <li> <a href="index.php?page=dashboard">  <i class='fa fa-dashboard'></i> Deshboard</a></li>
    <li> <a href="index.php?page=all-student">  <i class='fa fa-users'></i> All Student</a></li>
    <li class="active"> <i class='fa fa-pencil'></i> Update Student</li>
</ol>

<form action="" method='POST' enctype='multipart/form-data'>
    <div class='form-horizontal'>
        <div class='form-group'>
            <label for="name" class='control-label col-md-2'>Name:</label>
            <div class='col-md-8'>
                <input type="text" id='name' placeholder='Your Full Name' class='form-control' name='name' required value="<?php echo $row['name'];?>" >
            </div>
        </div>
        <div class='form-group'>
            <label for="batch" class='control-label col-md-2'>Batch:</label>
            <div class='col-md-8'>
                <input type="text" id='batch' required placeholder='Batch Number' class='form-control' name='batch'  required value="<?php echo $row['batch'];?>" >
            </div>
        </div>
        <div class='form-group'>
            <label for="course" class='control-label col-md-2'>Course:</label>
            <div class='col-md-8'>
                <select class='form-control' name="course" id="course" required  >
                    <option value="0">Select</option>
                    <option <?php echo $row['course']=='1' ? 'selected=""':''; ?> value="1">Grapis</option>
                    <option <?php echo $row['course']=='2' ? 'selected=""':''; ?> value="2">App Development</option>
                    <option <?php echo $row['course']=='3' ? 'selected=""':''; ?> value="3">Web Development</option>
                    <option <?php echo $row['course']=='4' ? 'selected=""':''; ?> value="4">Wordpress Developer</option>
                    <option <?php echo $row['course']=='5' ? 'selected=""':''; ?> value="5">GAme Developer</option>
                </select>
            </div>
        </div>
        <div class='form-group'>
            <label for="phone" class='control-label col-md-2'>Phone:</label>
            <div class='col-md-8'>
                <input type="text" id='phone' required placeholder='+8801********' class='form-control' value="<?php echo $row['phone'];?>" pattern="+8801[7][8][9][6][0-9][8]" name='phone' required>
            </div>
        </div>
        <div class='form-group'>
            <label for="address" class='control-label col-md-2'>Address:</label>
            <div class='col-md-8'>
                <input type="address" required id='address' value="<?php echo $row['address']; ?>" placeholder='Your Address' class='form-control' name='address' required>
            </div>
        </div>
        <div class='form-group'>
            <div class='col-md-8 col-md-offset-2'>
                <input type="submit" class='btn btn-primary' Value='Update' name='update-student'>
            </div>
        </div>
    </div>
</form>