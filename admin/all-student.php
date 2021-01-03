<h1 class='text-primary'> <i class='fa fa-dashboard'></i> Deshboard <small> Satistic Overview </small> </h1>
<ol class="breadcrumb">
    <li> <a href="index.php?page=dashboard">  <i class='fa fa-dashboard'></i> Deshboard</a></li>
    <li class="active"> <i class='fa fa-users'></i> All Student</li>
</ol>
<div class="table-responsive">
    <table id='allstudent' class=' table table-bordered table-hover table-striped '>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Batch</th>
                <th>Couse</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql_all_student = "SELECT * FROM `student`  ORDER BY `id` DESC  ";
            $db_info = mysqli_query($link, $sql_all_student);

            while ($row = mysqli_fetch_assoc($db_info)) {
            ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo  ucwords($row['name']) ; ?>n</td>
                    <td><?php echo $row['batch']; ?></td>
                    <td><?php echo $row['course']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo ucwords($row['address']); ?></td>
                    <td><img style="width:80px;" src="student_img/<?php echo $row['picture']; ?>" alt=""></td>
                    <td>
                        <a href="index.php?page=update-student&id=<?php echo base64_encode($row['id']) ; ?>" class="btn btn-xs btn-warning"> <i class='fa fa-pencil'></i> Edit</a>
                        &nbsp;  &nbsp;
                        <a href="delete_student.php?id=<?php echo base64_encode($row['id']) ; ?>" class="btn btn-xs btn-danger"> <i class='fa fa-trash'></i> Delete</a>
                    </td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
</div>