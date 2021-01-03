<?php
$user_s = $_SESSION['email'];
$sql_data = " SELECT * FROM `user` WHERE `email`='$user_s' ";
$sql_result = mysqli_query($link, $sql_data);

$row = mysqli_fetch_assoc($sql_result);
?>

<h1 class='text-primary'> <i class='fa fa-user'></i> User Profile <small> Profile</small> </h1>
<ol class="breadcrumb">
    <li> <a href="index.php?page=dashboard"> <i class='fa fa-dashboard'></i> Deshboard</a></li>
    <li class="active"> <i class='fa fa-user'></i> User Profile </li>
</ol>
<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <td>User Id</td>
                <td><?= $row['id']; ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td> <?= ucwords($row['name']); ?></td>
            </tr>
            <tr>
                <td>User Name</td>
                <td><?= $row['username']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $row['email']; ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?= ucwords($row['address']); ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?= ucwords($row['status']); ?></td>
            </tr>
            <tr>
                <td>Signup Date</td>
                <td><?= $row['date_time']; ?></td>
            </tr>

        </table>
        <a href="" class="btn btn-info pull-right">Edit Profile</a>
    </div>
    <?php

    if (isset($_POST['upload'])) {

        $photo = explode(".", $_FILES['profile_pic']['name']);
        $photo = end($photo);
        $photo_name = $user_s . "." . $photo;
        $sql_upload = "UPDATE  `user` SET `photo`='$photo_name' WHERE `email`='$user_s' ";
        $upload = mysqli_query($link,$sql_upload);
        if($upload){
            move_uploaded_file($_FILES['profile_pic']['tmp_name'],'uppicture/'.$photo_name);
        }

    }

    ?>
    <div class="col-md-6">
        <a href="">
            <img src="uppicture/<?= $row['photo']; ?>" style="width:200px;" class='img-thumbnail' alt="">
        </a><br><br>
        <form action="" enctype="multipart/form-data" method="POST">
            <label for="pic">Profile Picture</label>
            <input type="file" name="profile_pic" id="pic" required><br>
            <input type="submit" name="upload" value="Upload" class="btn btn-xm btn-info ">
        </form>
    </div>
</div>