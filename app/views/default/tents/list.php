<?php 
View::$title = 'Tents';
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
                    <h3 class="panel-title"><?php echo View::$title; ?></h3>

                    <a class="btn btn-success pull-right" href="javascript:;" onclick="jQuery('#modalTent').modal('show', {backdrop: 'static'});">Add Tent</a>
                </div>
                
                <div class="panel-body">
                    <table id="datatable-responsive" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="120">Tent ID</th>
                                <th>Name</th>
                                <th>Notes</th>
                                <th width="200">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $cntr = 0;
                            if(count($tents)) {
                            foreach($tents as $tent) { $cntr++;
                            ?>
                                <tr class="<?php echo ($cntr % 2) == 0 ? 'even' : 'odd'; ?> pointer">
                                    <td>TI-<?php echo $tent->TentID; ?></td>
                                    <td><?php echo ucwords($tent->Name); ?></td>
                                    <td><?php echo ucwords($tent->Notes); ?></td>
                                    <td style="text-align:center;">
                                        <a href="<?php echo View::url('tents/edit/'.$tent->TentID); ?>" title="Edit" class="btn btn-warning btn-sm"><span class="fa fa-pencil-square-o"></span></a>
                                        <?php if($userinfo->Level == 1) { ?>
                                        <a href="<?php echo View::url('tents/delete/'.$tent->TentID); ?>" title="Delete" onclick="return confirm('Are you sure you want to delete <?php echo $tent->Name; ?>?');" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php }
                            } else {?>
                            <tr class="">
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                            </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>
            </div>

         </div>
     </div>

</div>
<!-- /Main Container -->
<?php View::footer(); ?>

<!-- Popup Add Form Modal -->
<div class="modal fade" id="modalTent">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Tent</h4>
            </div>

            <form class="form-horizontal" enctype="multipart/form-data" method="post">

                <div class="modal-body">
                    <input type="hidden" name="action" value="addtent" />

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tent Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="" name="Name" placeholder="" required="">
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" >Notes</label>

                        <div class="col-sm-10">
                            <input type="text" name="Notes" value="" class="form-control">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Tent</button>
            </div>

            </form>
        </div>
    </div>
</div>