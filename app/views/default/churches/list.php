<?php 
View::$title = 'Churches';
View::$bodyclass = 'page-body';
View::header(); 
?>
<?php $userinfo = View::userInfo(); ?>

<!-- Main Container -->
<div class="main_container">
<?php echo View::getMessage(); ?>
    
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo View::$title; ?></h3>

                    <a class="btn btn-success pull-right" href="javascript:;" onclick="jQuery('#modalChurches').modal('show', {backdrop: 'static'});">Add Church</a>
                </div>

                <div class="panel-body">
                    <table id="datatable-responsive" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>City</th>
                                <th>Title</th>
                                <th>Pastor</th>
                                <th>Notes</th>
                                <th width="200" class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $cntr = 0;
                            if(count($churches)) {
                            foreach($churches as $church) { $cntr++;
                            ?>
                                <tr class="<?php echo ($cntr % 2) == 0 ? 'even' : 'odd'; ?> pointer">
                                    <td><?php echo ucwords($church->Name); ?></td>
                                    <td><?php echo ucwords($church->City); ?></td>
                                    <td><?php echo ucwords($church->Title); ?></td>
                                    <td>Ptr. <?php echo ucwords($church->Pastor); ?></td>
                                    <td><?php echo ucwords($church->Notes); ?></td>
                                    <td style="text-align:center;">
                                        <a href="<?php echo View::url('churches/view/'.$church->ChurchID); ?>" title="Edit" class="btn btn-info btn-sm"><span class="fa fa-eye"></span></a>
                                        <a href="<?php echo View::url('churches/edit/'.$church->ChurchID); ?>" title="Edit" class="btn btn-warning btn-sm"><span class="fa fa-pencil-square-o"></span></a>
                                        <?php if($userinfo->Level == 1) { ?>
                                        <a href="<?php echo View::url('churches/delete/'.$church->ChurchID); ?>" title="Delete" onclick="return confirm('Are you sure you want to delete <?php echo $church->Name; ?>?');" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
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
<div class="modal fade" id="modalChurches">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Church</h4>
            </div>
            
            
            <form class="form-horizontal" enctype="multipart/form-data" method="post">
                
                <div class="modal-body">
                    <input type="hidden" name="action" value="addchurch" />

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Church Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="" name="Name" placeholder="" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="" name="City" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="" name="Title" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Pastor</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="" name="Pastor" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" >Notes</label>

                        <div class="col-sm-9">
                            <input type="text" name="Notes" value="" class="form-control">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Church</button>
                </div>
                
            </form>
        </div>
    </div>
</div>