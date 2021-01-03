<h1 class='text-primary'> <i class='fa fa-dashboard'></i> Deshboard <small> All User </small> </h1>
<ol class="breadcrumb">
    <li> <a href="index.php?page=dashboard">  <i class='fa fa-dashboard'></i> Deshboard</a></li>
    <li class="active"> <i class='fa fa-users'></i> All User</li>
</ol>
<div class="table-responsive">
    <table id='allstudent' class=' table table-bordered table-hover table-striped '>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Address</th>
                <th>Photo</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql_all_student = "SELECT * FROM `user`  ORDER BY id DESC";
            $db_info = mysqli_query($link, $sql_all_student);

            while ($row = mysqli_fetch_assoc($db_info)) {
            ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo  ucwords($row['name']) ; ?>n</td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo ucwords($row['address']); ?></td>
                    <td><img style="width:80px;" src="uppicture/<?php echo $row['photo']; ?>" alt=""></td>
                    <td>
                        <a href="index.php?page=all-user&id=<?php echo $row['id'] ; ?>" class="btn btn-xs btn-warning"> <i class='fa fa-pencil'></i> Raj Baki</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>



<?php
    //$id = $_GET['id'];
    //echo $id;  
?> 