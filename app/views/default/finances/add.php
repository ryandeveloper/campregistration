<?php 
View::$title = 'Add Finance';
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

                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">&ndash;</span>
                            <span class="expand-icon">+</span>
                        </a>
                        <a href="#" data-toggle="remove">
                            &times;
                        </a>
                    </div>
                </div>
                <div class="panel-body">

                    <?php echo View::getMessage();  ?>
                    <form class="form-horizontal" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="action" value="addfinance" />

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Transaction Type</label>
                            <div class="col-sm-10">
                                <select name="Type" class="form-control" required="">
                                    <option selected>Select Type</option>
                                    <option value="1">Deposit</option>
                                    <option value="0">Withdrawal</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" >Description</label>

                            <div class="col-sm-10">
                                <input type="text" name="Description" value="<?php echo isset($finance->Description) ? $finance->Description : ''; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" >Amount</label>

                            <div class="col-sm-10">
                                <input type="number" name="Amount" value="<?php echo isset($finance->Amount) ? $finance->Amount : ''; ?>" class="form-control" required="">
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="item form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <a href="<?php echo view::url('finances'); ?>" class="btn btn-warning">Cancel</a>
                                <button id="send" type="submit" class="btn btn-success">Add Finance</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
         </div>
     </div>

</div>
<!-- /Main Container -->
<?php View::footer(); ?>