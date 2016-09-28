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

                    <a class="btn btn-success pull-right" href="javascript:;" onclick="jQuery('#modalCabin').modal('show', {backdrop: 'static'});">Add Finance</a>
                </div>
                
                <div class="panel-body">
                    <table id="financeTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="120" class="select-filter">Transaction Type</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th width="200">Action</th>
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
                                    <td><?php echo $finance->Description; ?></td>
                                    <!--<td><?php echo number_format($finance->Amount, 2, ".","," ); ?></td>-->
                                    <td><?php echo number_format($finance->Amount); ?></td>
                                    <td><small><?php echo date('d-M-Y', strtotime($finance->Date)); ?> <br><?php echo date('h:i:a', strtotime($finance->Date)); ?> </small></td>
                                    <td style="text-align:center;">
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
                    <h4 class="modal-title">Modal Content is Responsive</h4>
            </div>
 
            <form class="form-horizontal" enctype="multipart/form-data" method="post">

                <div class="modal-body">
                    <input type="hidden" name="action" value="addfinance" />

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Transaction Type</label>
                        <div class="col-sm-9">
                            <select name="Type" class="form-control" required="">
                                <option selected>Select Type</option>
                                <option value="1">Deposit</option>
                                <option value="0">Withdrawal</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" >Description</label>

                        <div class="col-sm-9">
                            <input type="text" name="Description" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Amount</label>

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