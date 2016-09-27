<?php 
View::$title = 'Welcome to '.Configuration::sitetitle;
View::$bodyclass = 'page-body';
View::header(); 
?>
<?php $userinfo = View::userInfo(); ?>

<!-- Main Container -->
<div class="main_container">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Users</h3>
                    
                    <a class="btn btn-success pull-right" href="<?php echo View::url('users/add'); ?>">Add User</a>
                </div>
                <div class="panel-body">
                    
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>User ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Mobile</th>
                                <th>Level</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            <?php 
                                $cntr = 0;
                                if(count($users)) {
                                foreach($users as $user) { $cntr++;
                                ?>
                                <tr class="<?php echo ($cntr % 2) == 0 ? 'even' : 'odd'; ?> pointer">
                                    <?php $avatar = View::common()->getUploadedFiles($user->Avatar); ?>
                                    <td><img src="<?php echo View::url('assets/'. ( ($avatar) ? 'files/'.$avatar[0]->FileSlug : 'images/user.png' )); ?>" style="width:40px;" /></td>
                                    <td><?php echo $user->UserID; ?></td>
                                    <td><?php echo $user->FirstName; ?></td>
                                    <td><?php echo $user->LastName; ?></td>
                                    <td><?php echo $user->Mobile; ?></td>
                                    <td><?php echo $user->Name; ?></td>
                                    <td><?php echo $user->DateAdded; ?></td>
                                    <td style="text-align:center;">
                                        <a href="<?php echo View::url('users/edit/'.$user->UserID); ?>" title="Edit" class="btn btn-warning btn-sm"><span class="fa fa-pencil-square-o"></span></a>
                                        <?php if($userinfo->Level == 1) { ?>
                                        <a href="<?php echo View::url('users/trash/'.$user->UserID); ?>" title="Delete" onclick="return confirm('Are you sure you want to put user <?php echo $user->FirstName; ?> <?php echo $user->LastName; ?> to trash bin?');" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } 
                                } else {?>
                                <tr class="<?php echo ($cntr % 2) == 0 ? 'even' : 'odd'; ?> pointer">
                                    <!--td class="a-center"><input type="checkbox" name="table_records" value="<?php //echo $user->UserID; ?>" class="flat"></td-->
                                    <td colspan="99">No Data</td>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
         </div>
     </div>  

</div>
<!-- /Main Container -->
<?php View::footer(); ?>