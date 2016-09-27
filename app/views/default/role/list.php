<?php 
View::$title = 'Roles';
View::$bodyclass = 'page-body';
View::header(); 
?>
<!-- page content -->
<div class="main_container">
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo View::$title; ?></h3>
                    
                    <a class="btn btn-success pull-right" href="<?php echo View::url('role/add'); ?>">Add Product</a>
                    
                </div>
                <div class="panel-body">
                    <?php echo View::getMessage(); ?> 
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="no-sorting text-center" width="200">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $cntr = 0;
                            foreach($roles as $role) { $cntr++;
                            ?>
                            <tr class="<?php echo ($cntr % 2) == 0 ? 'even' : 'odd'; ?> pointer">
                                <td><?php echo $role->UserLevelID; ?></td>
                                <td><?php echo $role->Name; ?></td>
                                <td><?php echo $role->Description; ?></td>
                                <td class="text-center" width="120">
                                    <a href="<?php echo View::url('role/edit/'.$role->UserLevelID); ?>" class="btn btn-warning btn-sm" title="Edit"><span class="fa fa-pencil-square-o"></span></a>
                                    <a href="<?php echo View::url('role/delete/'.$role->UserLevelID); ?>" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete data?');"><span class="fa fa-remove"></span></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
         </div>
     </div>

</div>
<!-- /page content -->
<?php View::footer(); ?>