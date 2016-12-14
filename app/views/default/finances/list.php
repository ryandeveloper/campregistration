<?php 
View::$title = 'Finances';
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

                    <a class="btn btn-success pull-right" href="javascript:;" onclick="jQuery('#modalWithdrawal').modal('show', {backdrop: 'static'});">Withdraw</a>
                    <a class="btn btn-success pull-right" href="javascript:;" onclick="jQuery('#modalDeposit').modal('show', {backdrop: 'static'});" style="margin-right: 10px;">Deposit</a>
                </div>
                
                <div class="panel-body">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="120" class="no-sorting">Transaction Type</th>
                                <th class="no-sorting">Description</th>
                                <th class="no-sorting">Amount</th>
                                <th class="no-sorting">Date</th>
                                <th width="200" class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $cntr = 0;
                            if(count($finances)) {
                            foreach($finances as $finance) { $cntr++;
                            ?>
                                <tr class="<?php echo ($cntr % 2) == 0 ? 'even' : 'odd'; ?> pointer financeID-<?php echo $finance->FinanceID; ?>">
                                    <td>
                                        <?php 
                                        $type = $finance->Type;
                                        switch ($type){
                                            case '1':
                                                echo "Deposit";
                                                break;
                                            case '0':
                                                echo "Withdrawal";
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo ucwords($finance->Description); ?></td>
                                    <!--<td><?php echo number_format($finance->Amount, 2, ".","," ); ?></td>-->
                                    <td><?php echo number_format($finance->Amount); ?></td>
                                    <td><small><?php echo date('d-M-Y', strtotime($finance->Date)); ?> - <?php echo date('h:i:a', strtotime($finance->Date)); ?> </small></td>
                                    <td class="text-center">
                                        <a href="<?php echo View::url('finances/edit/'.$finance->FinanceID); ?>" title="Edit" class="btn btn-warning btn-sm"><span class="fa fa-pencil-square-o"></span></a>
                                        <?php if($userinfo->Level == 1) { ?>
                                        <a href="<?php echo View::url('finances/delete/'.$finance->FinanceID); ?>" title="Delete" onclick="return confirm('Are you sure you want to delete <?php echo $finance->Description; ?>?');" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
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

<!-- Popup Deposit Modal -->
<div class="modal fade" id="modalDeposit">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Deposit</h4>
            </div>
 
            <form class="form-horizontal" enctype="multipart/form-data" method="post">

                <div class="modal-body">
                    <input type="hidden" name="action" value="addfinance" />
                    <input type="hidden" name="Type" value="1">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" >Description</label>

                        <div class="col-sm-9">
                            <input type="text" name="Description" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Deposited Amount</label>

                        <div class="col-sm-9">
                            <input type="number" name="Amount" value="" class="form-control" required="">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Finance</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Popup Withdrawal Modal -->
<div class="modal fade" id="modalWithdrawal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Withdrawal</h4>
            </div>
 
            <form class="form-horizontal" enctype="multipart/form-data" method="post">

                <div class="modal-body">
                    <input type="hidden" name="action" value="addfinance" />
                    <input type="hidden" name="Type" value="0">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" >Description</label>

                        <div class="col-sm-9">
                            <input type="text" name="Description" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Withdrawal Amount</label>

                        <div class="col-sm-9">
                            <input type="number" name="Amount" value="" class="form-control" required="">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Finance</button>
                </div>

            </form>
        </div>
    </div>
</div>