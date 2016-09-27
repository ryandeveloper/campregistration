<?php 
View::$title = 'Trashed Users';
View::$bodyclass = 'nav-md';
View::header(); 
?>
<?php $userinfo = View::userInfo(); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?php echo View::$title; ?></h2>
                        <?php //View::template('toolboxnav'); ?>
                        <a class="btn btn-warning btn-default pull-right" href="<?php echo View::url('users/emptytrashbin/'); ?>" onclick="return confirm('Are you sure you want to delete trashed users permanently? If you continue you will be able to undo this action!');">Empty Trash Bin</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive bulk_action nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr class="headings">
                                    <!--th class="no-sorting"><input type="checkbox" id="check-all" class="flat"></th-->
                                    <th class="no-sorting">Image</th>
                                    <th>User ID</th>
                                    <th>Email</th>
                                    <th class="sort-this">First name</th>
                                    <th>Last name</th>
                                    <th>Nickname</th>
                                    <th>Gender</th>                                    
                                    <th>Phone</th>
                                    <th>Level</th>
                                    <th>Date</th>
                                    <th class="no-sorting" style="text-align:center; width: 5%;">Action</th>
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
                                    <td><?php echo $user->Email; ?></td>
                                    <td><?php echo $user->FirstName; ?></td>
                                    <td><?php echo $user->LastName; ?></td>
                                    <td><?php echo $user->NickName; ?></td>
                                    <td><?php echo $user->Gender; ?></td>
                                    <td><?php echo $user->Phone; ?></td>
                                    <td><?php echo $user->Name; ?></td>
                                    <td><?php echo $user->DateAdded; ?></td>
                                    <td style="text-align:center;">
                                        <?php if($userinfo->Level == 1) { ?>
                                        <a href="<?php echo View::url('users/restore/'.$user->UserID); ?>" title="Restore" class="mo-icon green"><span class="fa fa-undo"></span></a>
                                        <a href="<?php echo View::url('users/delete/'.$user->UserID); ?>" title="Delete" onclick="return confirm('Are you sure you want to delete user <?php echo $user->FirstName; ?> <?php echo $user->LastName; ?>? If you continue you will be able to undo this action!');" class="mo-icon red"><span class="fa fa-remove"></span></a>
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
</div>
<!-- /page content -->
<?php View::footer(); ?>