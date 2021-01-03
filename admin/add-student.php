<?php
require_once('dbconn.php');

if (isset($_POST['addstudent'])) {

    $name = $_POST['name'];
    $batch = $_POST['batch'];
    $course = $_POST['course'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $photo = explode(".", $_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $name . "." . $photo;


    $sql_student = "INSERT INTO `student` SET 
                        `name`='$name',
                        `batch`='$batch',
                        `course`='$course',
                        `phone`='$phone',
                        `address`='$address',
                        `picture`='$photo_name'";
    $student_input = mysqli_query($link,$sql_student);

    if ($student_input) {
        $success = 'Student Insert SuccessFull';
        move_uploaded_file($_FILES['photo']['tmp_name'], 'student_img/' . $photo_name);
    } else {
        $error = 'Student Insert Error';
    }
}

?>
<h1 class='text-primary'> <i class='fa fa-dashboard'></i> Deshboard <small> Satistic Overview </small> </h1>
<ol class="breadcrumb">
    <li> <a href="index.php?page=dashboard">  <i class='fa fa-dashboard'></i> Deshboard</a></li>
    <li class="active"> <i class='fa fa-user-plus'></i> Add Student</li>
</ol>
<?php if (isset($success)) {
    echo '<div class="alert alert-success">' . $success . '</div>';
} ?>
<?php if (isset($error)) {
    echo '<div class="alert alert-warning">' . $error . '</div>';
} ?>
<form action="" method='POST' enctype='multipart/form-data'>
    <div class='form-horizontal'>
        <div class='form-group'>
            <label for="name" class='control-label col-md-2'>Name:</label>
            <div class='col-md-8'>
                <input type="text" id='name' placeholder='Your Full Name' class='form-control' name='name' required>
            </div>
        </div>
        <div class='form-group'>
            <label for="batch" class='control-label col-md-2'>Batch:</label>
            <div class='col-md-8'>
                <input type="text" id='batch' required placeholder='Batch Number' class='form-control' name='batch'  required>
            </div>
        </div>
        <div class='form-group'>
            <label for="course" class='control-label col-md-2'>Course:</label>
            <div class='col-md-8'>
                <select class='form-control' name="course" id="course" required>
                    <option value="0">Select</option>
                    <option value="1">Gaphics</option>
                    <option value="2">App Development</option>
                    <option value="3">Web Development</option>
                    <option value="4">Wordpress Developer</option>
                    <option value="5">GAme Developer</option>
                </select>
            </div>
        </div>
        <div class='form-group'>
            <label for="phone" class='control-label col-md-2'>Phone:</label>
            <div class='col-md-8'>
                <input type="text" id='phone' required placeholder='+8801********' class='form-control' pattern="+8801[7][8][9][6][0-9][8]" name='phone' required>
            </div>
        </div>
        <div class='form-group'>
            <label for="address" class='control-label col-md-2'>Address:</label>
            <div class='col-md-8'>
                <input type="address" required id='address' placeholder='Your Address' class='form-control' name='address' required>
            </div>
        </div>
        <div class='form-group'>
            <label for="photo" class='control-label col-md-2'>Photo:</label>
            <div class='col-md-8'>
                <input required type="file" id='photo' class='form-control' name='photo'>
            </div>
        </div>
        <div class='form-group'>
            <div class='col-md-8 col-md-offset-2'>
                <input type="submit" class='btn btn-primary' Value='Add Student' name='addstudent'>
            </div>
        </div>
    </div>
</form>