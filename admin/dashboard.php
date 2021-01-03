<h1 class='text-primary'> <i class='fa fa-dashboard'></i> Deshboard <small> Satistic Overview </small> </h1>
<ol class="breadcrumb">
    <li class="active"> <i class="fa fa-dashboard"></i> Deshboard</li>
</ol>

<?php

    $all_student = mysqli_query( $link,"SELECT * FROM `student`" );
    $count_student = mysqli_num_rows($all_student);

    $all_user = mysqli_query( $link,"SELECT * FROM `user`" );
    $count_user = mysqli_num_rows($all_user);

?>
<div class='row'>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <i class='fa fa-users fa-5x'></i>
                    </div>
                    <div class="col-md-6">
                        <div class='pull-right' style="font-size:45px;"> <?php  echo $count_student; ?></div>
                        <div class="clearfix"></div>
                        <div class='pull-right'> All Student</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=all-student">
                <div class="panel-footer">
                    <span class='pull-left'> All Student </span>
                    <span class='pull-right'> <i class='fa fa-arrow-circle-o-right'></i> </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <i class='fa fa-users fa-5x'></i>
                    </div>
                    <div class="col-md-6">
                        <div class='pull-right' style="font-size:45px;"> <?php echo $count_user;  ?></div>
                        <div class="clearfix"></div>
                        <div class='pull-right'> All Student</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=all-user">
                <div class="panel-footer">
                    <span class='pull-left'> All User </span>
                    <span class='pull-right'> <i class='fa fa-arrow-circle-o-right'></i> </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<hr>
<h3>All Student</h3>
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
            $sql_all_student = "SELECT * FROM `student` ";
            $db_info = mysqli_query($link, $sql_all_student);

            while ($row = mysqli_fetch_assoc($db_info)) {
            ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo ucwords($row['name']); ?>n</td>
                    <td><?php echo $row['batch']; ?></td>
                    <td><?php echo $row['course']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo  ucwords($row['address']); ?></td>
                    <td><img style="width:80px;" src="student_img/<?php echo $row['picture']; ?>" alt=""></td>
                    <td>
                        <a href="" class="btn btn-xs btn-warning"> <i class='fa fa-pencil'></i> Edit</a>
                        &nbsp; &nbsp;
                        <a href="" class="btn btn-xs btn-danger"> <i class='fa fa-trash'></i> Delete</a>
                    </td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
</div>