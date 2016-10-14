<?php 
View::$title = 'Participants';
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

                    <a class="btn btn-success pull-right" href="javascript:;" onclick="jQuery('#modalCabin').modal('show', {backdrop: 'static'});">Add Cabin</a>
                </div>
                <pre>
                <?php print_r($participants); ?>
                </pre>
                <div class="panel-body">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive bulk_action nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="50" class="no-sorting">Status</th> 
                                <th class="no-sorting">Gender</th>
                                <th class="no-sorting">Name</th>
                                <th class="no-sorting">Age</th>
                                <th class="no-sorting">Type</th>
                                <th class="no-sorting">Church</th>
                                <th class="no-sorting">Cabin</th>
                                <th class="no-sorting">Tent</th>
                                <th class="no-sorting">Due</th>
                                <th class="no-sorting">Paid</th>
                                <th class="no-sorting">Balance</th>
                                <th class="no-sorting">Encoder</th>
                                <th width="150" class="no-sorting text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $cntr = 0;
                            if(count($participants)) {
                            foreach($participants as $participant) { $cntr++;
                            ?>
                                <tr class="<?php echo ($cntr % 2) == 0 ? 'even' : 'odd'; ?> pointer">
                                    <td class="text-center">
                                    <?php if($participant->Cleard == "0"){ ?>
                                        <i class="fa fa-close" style="color: red; font-size: 18px;"></i>
                                    <?php } else { ?>
                                        <i class="fa fa-check" style="color:#8dc63f; font-size: 18px;"></i>
                                    <?php } ?>
                                    </td>
                                    <td><?php if($participant->Gender == "Brother"){echo "Bro";}elseif($participant->Gender == "Sister"){echo "Sis";}elseif ($participant->Gender == "Pastor") { echo "Ptr";} ?></td>
                                    <td><?php echo $participant->FirstName; ?> <?php echo $participant->LastName; ?></td>
                                    <td><?php echo $participant->Age; ?></td>
                                    <td><?php echo $participant->productName; ?></td>
                                    <td><?php echo $participant->churchName; ?></td>
                                    <td><?php echo $participant->cabinName; ?></td>
                                    <td><?php echo $participant->tentName; ?></td>
                                    <td><?php echo $participant->TotalAmount; ?></td>
                                    <td><?php echo $participant->PaidAmount; ?></td>
                                    <td><?php echo $participant->Balance; ?></td>
                                    <td><?php echo $participant->encoderFirstName; ?></td>
                                    <td style="text-align:center;">
                                        <a href="<?php echo View::url('participants/edit/'.$participant->PPID); ?>" title="Edit" class="btn btn-warning btn-sm"><span class="fa fa-pencil-square-o"></span></a>
                                        <?php if($userinfo->Level == 1) { ?>
                                        <a href="<?php echo View::url('participants/delete/'.$participant->PPID); ?>" title="Delete" onclick="return confirm('Are you sure you want to delete <?php echo $participant->FirstName; ?> <?php echo $participant->LastName; ?>?');" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
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
<div class="modal fade" id="modalCabin">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Cabin</h4>
            </div>
 
            <form class="form-horizontal" enctype="multipart/form-data" method="post">

                <div class="modal-body">
                    <input type="hidden" name="action" value="addcabin" />

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Cabin Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="" name="Name" placeholder="" required="">
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" >Notes</label>

                        <div class="col-sm-9">
                            <input type="text" name="Notes" value="" class="form-control">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Cabin</button>
                </div>

            </form>
        </div>
    </div>
</div>